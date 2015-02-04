<?php

	require_once("header.inc.php");

	/**/

	echo "<div id=\"reservations\">";

	echo "<h3>", $l_reservations, "</h3>";

	$query = mysql_query("SELECT * FROM reservations ORDER BY id DESC");

	if ($num_rows = mysql_num_rows($query))
	{
		for ($c = 1; $result = mysql_fetch_assoc($query); $c++)
		{
			echo "<div class=\"reservation\">";
			echo "<dl>";

			echo "<dt>", $l_name, "</dt>";
			echo "<dd>", htmlentities($result["name"]), "<br /></dd>";

			echo "<dt>", $l_address, "</dt>";
			echo "<dd>", htmlentities($result["address"]), "<br /></dd>";

			echo "<dt>", $l_postcode, "</dt>";
			echo "<dd>", htmlentities($result["postcode"]), "<br /></dd>";

			echo "<dt>", $l_city, "</dt>";
			echo "<dd>", htmlentities($result["city"]), "<br /></dd>";

			echo "<dt>", $l_telephone, "</dt>";
			echo "<dd>", htmlentities($result["telephone"]), "<br /></dd>";

			echo "<dt>", $l_email, "</dt>";
			echo "<dd>", htmlentities($result["email"]), "<br /></dd>";

			echo "<dt>", $l_birthday, "</dt>";
			echo "<dd>", htmlentities($result["birthday"]), "<br /></dd>";

			echo "<dt>", $l_nationality, "</dt>";
			echo "<dd>", htmlentities($result["nationality"]), "<br /></dd>";

			echo "<dt>", $l_bi, "</dt>";
			echo "<dd>", htmlentities($result["bi"]), "<br /></dd>";

			echo "<dt>", $l_issuer, "</dt>";
			echo "<dd>", htmlentities($result["issuer"]), "<br /></dd>";

			echo "<dt>", $l_issuedate, "</dt>";
			echo "<dd>", htmlentities($result["issuedate"]), "<br /></dd>";

			echo "<dt>", $l_certlevel, "</dt>";
			echo "<dd>", htmlentities($result["certlevel"]), "<br /></dd>";

			echo "<dt>", $l_sos, "</dt>";
			echo "<dd>", htmlentities($result["sos"]), "<br /></dd>";

			echo "<dt>", $l_bloodtype, "</dt>";
			echo "<dd>", htmlentities($result["bloodtype"]), "<br /></dd>";

			echo "<dt>", $l_reservations, "</dt>";
			echo "<dd>";

			$_date = unserialize($result["date"]);
			$timeperiod = unserialize($result["timeperiod"]);
			$numdives = unserialize($result["numdives"]);

			for ($i = 0; $i < count($_date); $i++)
				echo "<p>", htmlentities($_date[$i]), " ~ ", htmlentities($timeperiod[$i]), " ~ ", htmlentities($numdives[$i]), "</p>";

			echo "</dd>";

			if (!empty($result["weight"]))
			{
				echo "<dt>", $l_weight, "</dt>";
				echo "<dd>", htmlentities($result["weight"]), "<br /></dd>";
			}

			if (!empty($result["height"]))
			{
				echo "<dt>", $l_height, "</dt>";
				echo "<dd>", htmlentities($result["height"]), "<br /></dd>";
			}

			if (!empty($result["footsize"]))
			{
				echo "<dt>", $l_footsize, "</dt>";
				echo "<dd>", htmlentities($result["footsize"]), "<br /></dd>";
			}

			if (!empty($result["equipment"]))
			{
				echo "<dt>", $l_equipment, "</dt>";
				echo "<dd>";

				$equipment = unserialize($result["equipment"]);

				foreach ($equipment as $value)
					echo "<p>", htmlentities($value), "</p>";

				echo "</dd>";
			}

			if (!empty($result["jacket"]))
			{
				echo "<dt>", $l_jacket, "</dt>";
				echo "<dd>", htmlentities($result["jacket"]), "<br /></dd>";
			}

			if (!empty($result["farmerjohn"]))
			{
				echo "<dt>", $l_farmerjohn, "</dt>";
				echo "<dd>", htmlentities($result["farmerjohn"]), "<br /></dd>";
			}

			if (!empty($result["divesuit"]))
			{
				echo "<dt>", $l_divesuit, "</dt>";
				echo "<dd>", htmlentities($result["divesuit"]), "<br /></dd>";
			}

			if (!empty($result["bcd"]))
			{
				echo "<dt>", $l_bcd, "</dt>";
				echo "<dd>", htmlentities($result["bcd"]), "<br /></dd>";
			}

			echo "<dt>", $l_insurance, "</dt>";
			echo "<dd>", htmlentities($result["insurance"]), "<br /></dd>";

			echo "</dl>";

			echo "<p class=\"footer\"><a href=\"\" onclick=\"rmreservation('", $result["id"], "'); return false;\">", $l_remove, "</a></p>";

			echo "</div>";

			if ($c != $num_rows)
				echo "<hr />";
		}
	}
	else
	{
		echo "<div class=\"reservation\">";
		echo "<p>", $l_no_reservations, "</p>";
		echo "</div>";
	}

	echo "</div>";

?>

	</body>
</html>

