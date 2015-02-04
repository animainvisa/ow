<?php

	require_once("header.inc.php");

	/**/

	echo "<div id=\"guestbook\">";

	echo "<h3>", $l_guestbook, "</h3>";

	$query = mysql_query("SELECT * FROM guestbook ORDER BY ABS(time) DESC");

	if ($num_rows = mysql_num_rows($query))
	{
		for ($c = 1; list($id, $name, $email, $comment, $_time) = mysql_fetch_row($query); $c++)
		{
			echo "<div class=\"comment\">";
			echo "<h6>", htmlentities($name), "</h6>";
			echo "<p>", nl2br(htmlentities($comment)), "</p>";

			if ($_time != abs($_time))
				echo "<p class=\"footer\"><a href=\"\" onclick=\"editcomment('", $id, "', 'accept'); return false;\">", $l_accept, 
					"</a> | <a href=\"\" onclick=\"editcomment('", $id, "', 'remove'); return false;\">", $l_remove, "</a></p>";
			else
				echo "<p class=\"footer\"><a href=\"\" onclick=\"editcomment('", $id, "', 'remove'); return false;\">", $l_remove, "</a></p>";

			echo "</div>";

			if ($c != $num_rows)
				echo "<hr />";
		}
	}
	else
	{
		echo "<div class=\"comment\">";
		echo "<p>", $l_no_comments, "</p>";
		echo "</div>";
	}

	echo "</div>";

?>

	</body>
</html>

