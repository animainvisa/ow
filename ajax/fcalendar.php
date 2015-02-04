<?php

	header("Content-type: text/html; charset=iso-8859-1");

	/**/

	$lang = isset($_COOKIE["lang"]) 
				? $_COOKIE["lang"] 
				: "pt";

	require_once("../lang_" .$lang. ".inc.php");

	/**/

	$cal	= (int) $_GET["c"];
	$_time	= (int) $_GET["tm"];

	$day	= date("j", $_time);
	$month	= date("n", $_time);
	$year	= date("Y", $_time);

?>

<table>
	<tr>
		<td class="navigator" colspan="7">
			<table>
				<tr>
					<td class="previous"><a href="" onclick="fcal('<?php echo mktime(0, 0, 0, $month-1, $day, $year); ?>', '<?php echo !$cal ? "calfrom" : "calto"; ?>'); return false;">&#8249;</a></td>
					<td><h5><?php echo "{$l_month[$month-1]} {$year}"; ?></h5></td>
					<td class="next"><a href="" onclick="fcal('<?php echo mktime(0, 0, 0, $month+1, $day, $year); ?>', '<?php echo !$cal ? "calfrom" : "calto"; ?>'); return false;">&#8250;</a></td>
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
				echo "<a href=\"\" onclick=\"document.getElementById('", !$cal ? "availfrom" : "availto", "').value='", $c-$week_day, "/",
					$month, "/", $year, "'; dnone('", !$cal ? "calfrom" : "calto", "'); return false;\">", $c-$week_day, "</a>";

			echo "</td>";

			if (!($c % WEEK_DAYS))
				echo "</tr>";
		}

	?>

	<tr>
		<td colspan="7"><a href="" onclick="dnone('<?php echo !$cal ? "calfrom" : "calto"; ?>'); return false;"><?php echo $l_close; ?></a></td>
	</tr>
</table>

