<?php

	session_start();

	/**/

	require_once("../functions.inc.php");

	if (!is_loggedin()) { header("Location: ../login.php"); exit; }

	/**/

	header("Content-type: text/html; charset=iso-8859-1");

	/**/

	require_once("../config.inc.php");

	mysql_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWD) && mysql_select_db(MYSQL_DB) or exit(mysql_error());

	/**/

	$lang = isset($_COOKIE["lang"]) 
				? $_COOKIE["lang"] 
				: "pt";

	require_once("../lang_" .$lang. ".inc.php");

	/**/

	$_time 	= (int) $_GET["tm"];

	$day	= date("j", $_time);
	$month 	= date("n", $_time);
	$year 	= date("Y", $_time);

	/**/

	if (isset($_GET["update"]))
	{
		$mntime = mktime(0, 0, 0, $month, $day, $year);

		$query = mysql_query("SELECT * FROM unavailability WHERE mntime={$mntime}");

		mysql_num_rows($query) 
			? mysql_query("DELETE FROM unavailability WHERE mntime={$mntime}") 
			: mysql_query("INSERT INTO unavailability VALUES ({$mntime})");
	}

?>

<h3><?php echo $l_ucalendar; ?></h3>

<div id="calendar">
	<table>
		<tr>
			<td class="navigator" colspan="7">
				<table>
					<tr>
						<td class="previous"><a href="" onclick="ucal('<?php echo mktime(0, 0, 0, $month-1, $day, $year); ?>', 0); return false;">&#8249;</a></td>
						<td><h5><?php echo "{$l_month[$month-1]} {$year}"; ?></h5></td>
						<td class="next"><a href="" onclick="ucal('<?php echo mktime(0, 0, 0, $month+1, $day, $year); ?>', 0); return false;">&#8250;</a></td>
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

				echo "<td>";

				if ($c > $week_day && $c <= ($week_day + $num_days))
				{
					$mntime = mktime(0, 0, 0, $month, $c-$week_day, $year);

					echo "<a href=\"\" onclick=\"ucal('", $mntime, "', 1); return false;\">";

					$query = mysql_query("SELECT * FROM unavailability WHERE mntime={$mntime}");

					if (mysql_num_rows($query))
						echo "<span>", $c-$week_day, "</span>";
					else
						echo $c-$week_day;

					echo "</a>";
				}

				echo "</td>";

				if (!($c % WEEK_DAYS))
					echo "</tr>";
			}

		?>

	</table>
</div>

