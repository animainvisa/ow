<?php

	require_once("header.inc.php");

	/**/

	$_time 	= isset($_GET["tm"]) 
				? (int) $_GET["tm"] 
				: time();

	$day	= date("j", $_time);
	$month 	= date("n", $_time);
	$year 	= date("Y", $_time);

?>

<div id="e_calendar">
	<h3><?php echo $l_ecalendar; ?></h3>

	<div id="calendar">
		<table>
			<tr>
				<td class="navigator" colspan="7">
					<table>
						<tr>
							<td class="previous"><a href="" onclick="ecal('<?php echo mktime(0, 0, 0, $month-1, $day, $year); ?>'); return false;">&#8249;</a></td>
							<td><h5><?php echo "{$l_month[$month-1]} {$year}"; ?></h5></td>
							<td class="next"><a href="" onclick="ecal('<?php echo mktime(0, 0, 0, $month+1, $day, $year); ?>'); return false;">&#8250;</a></td>
						</tr>
					</table>
				</td>
			</tr>

			<tr>
				<th><?php echo $l_mo; ?></th>
				<th><?php echo $l_tu; ?></th>
				<th><?php echo $l_we; ?></th>
				<th><?php echo $l_th; ?></th>
				<th><?php echo $l_fr; ?></th>
				<th><?php echo $l_sa; ?></th>
				<th><?php echo $l_su; ?></th>
			</tr>

			<?php

				define("WEEK_DAYS", 7);

				$week_day = date("N", mktime(0, 0, 0, $month, 1, $year));

				$num_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

				// $week_day will hold 0 (Mon) through 6 (Sun) after decrement
				$num_weeks = (--$week_day + $num_days) / WEEK_DAYS;

				if ($num_weeks > intval($num_weeks))
					$num_weeks = intval($num_weeks) + 1;

				$num_cells = $num_weeks * WEEK_DAYS;


				for ($c = 1; $c <= $num_cells; $c++)
				{
					if (!(($c-1) % WEEK_DAYS))
						echo "<tr>";

					echo (($c-$week_day) != $day) 
							? "<td>" 
							: "<td id=\"selected\">";

					if ($c > $week_day && $c <= ($week_day + $num_days))
						echo "<a href=\"\" onclick=\"ecal('", mktime(0, 0, 0, $month, $c-$week_day, $year), 
								"'); return false;\">", $c-$week_day, "</a>";

					echo "</td>";

					if (!($c % WEEK_DAYS))
						echo "</tr>";
				}

			?>

		</table>
	</div>

	<div id="events">
		<div id="e_header">
			<a class="previous" href="" onclick="ecal('<?php echo mktime(0, 0, 0, $month, $day-1, $year); ?>'); return false;">&#8249;</a>

			<a class="next" href="" onclick="ecal('<?php echo mktime(0, 0, 0, $month, $day+1, $year); ?>'); return false;">&#8250;</a>

			<h5><?php echo "{$day} {$l_month[$month-1]} {$year}"; ?></h5>
		</div>

		<div id="e_body">

			<?php

				// midnight time
				$mntime = mktime(0, 0, 0, $month, $day, $year);

				$query = mysql_query("SELECT id, title, message FROM ecalendar WHERE mntime={$mntime} AND lang='{$lang}' ORDER BY id DESC");

				if ($num_rows = mysql_num_rows($query))
				{
					for ($c = 1; list($id, $title, $message) = mysql_fetch_row($query); $c++)
					{
						echo "<div class=\"event\">";
						echo "<h6>", $title, "</h6>";
						echo "<p>", nl2br($message), "</p>";
						echo "<p class=\"footer\"><a href=\"\" onclick=\"rmevent('", $id, "'); return false;\">", $l_remove, "</a></p>";
						echo "</div>";

						if ($c != $num_rows)
							echo "<hr />";
					}
				}
				else
				{
					echo "<div class=\"event\">";
					echo "<p class=\"empty\">", $l_no_events, "</p>";
					echo "</div>";
				}

			?>

		</div>
	</div>

	<div id="e_form">
		<form action="addevent.php" method="post">
			<fieldset>
				<input type="hidden" name="mntime" value="<?php echo $mntime; ?>" />
				<input type="hidden" name="lang" value="<?php echo $lang; ?>" />

				<label for="f_title"><?php echo $l_title; ?></label>
					<input type="text" name="title" id="f_title" />
				<label for="f_message"><?php echo $l_message; ?></label>
					<textarea cols="40" rows="5" name="message" id="f_message"></textarea>

				<input type="submit" value="<?php echo $l_submit; ?>" />
			</fieldset>
		</form>
	</div>
</div>

	</body>
</html>

