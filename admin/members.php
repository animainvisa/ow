<?php

	require_once("header.inc.php");

	/**/

	echo "<div id=\"members\">";

	echo "<h3>", $l_members, "</h3>";

	$query = mysql_query("SELECT * FROM members ORDER BY id DESC");

	if ($num_rows = mysql_num_rows($query))
	{
		for ($c = 1; $result = mysql_fetch_assoc($query); $c++)
		{
			echo "<div class=\"member\">";
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

			echo "</dl>";

			echo "<p class=\"footer\"><a href=\"\" onclick=\"rmmember('", $result["id"], "'); return false;\">", $l_remove, "</a></p>";

			echo "</div>";

			if ($c != $num_rows)
				echo "<hr />";
		}
	}
	else
	{
		echo "<div class=\"member\">";
		echo "<p>", $l_no_members, "</p>";
		echo "</div>";
	}

	echo "</div>";

?>

	</body>
</html>

