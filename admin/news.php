<?php

	require_once("header.inc.php");

	/**/

	echo "<div id=\"news\">";

	echo "<h3>", $l_news,"</h3>";

	$query = mysql_query("SELECT id, title, message, image FROM news WHERE lang='{$lang}' ORDER BY id DESC");

	if ($num_rows = mysql_num_rows($query))
	{
		for ($c = 1; list($id, $title, $message, $image) = mysql_fetch_row($query); $c++)
		{
			echo "<div class=\"new\">";
			echo "<img alt=\"\" src=\"../news/tn_", rawurlencode($image), "\" />";
			echo "<h6>", $title, "</h6>";

			if (strlen($message) > MAX_CHARACTERS)
			{
				echo "<p>", nl2br(substr($message, 0, MAX_CHARACTERS)), "...</p>";
				echo "<p class=\"footer\"><a href=\"../news.php?id=", $id, "\">", $l_read_more, "</a> | <a ",
						"href=\"\" onclick=\"rmnew('", $id, "'); return false;\">", $l_remove, "</a></p>";
			}
			else
			{
				echo "<p>", nl2br($message), "</p>";
				echo "<p class=\"footer\"><a href=\"\" onclick=\"rmnew('", $id, "'); return false;\">", $l_remove, "</a></p>";
			}

			echo "</div>";

			if ($c != $num_rows)
				echo "<hr />";
		}
	}
	else
	{
		echo "<div class=\"new\">";
		echo "<p>", $l_no_news, "</p>";
		echo "</div>";
	}

	echo "</div>";

?>

<div id="n_form">
	<form enctype="multipart/form-data" action="addnew.php" method="post">
		<fieldset>
			<input type="hidden" name="lang" value="<?php echo $lang; ?>" />

			<label for="f_title"><?php echo $l_title; ?></label>
				<input type="text" name="title" id="f_title" />
			<label for="f_message"><?php echo $l_message; ?></label>
				<textarea cols="40" rows="5" name="message" id="f_message"></textarea>
			<label for="f_image"><?php echo $l_image; ?></label>
				<input type="file" name="image" id="f_image" />

			<input type="submit" value="<?php echo $l_submit; ?>" />
		</fieldset>
	</form>
</div>

	</body>
</html>

