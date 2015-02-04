<?php

	require_once("header.inc.php");

	/**/

	echo "<div id=\"newsletter\">";

	echo "<h3>", $l_newsletter, "</h3>";

	$query = mysql_query("SELECT * FROM newsletter ORDER BY id DESC");

	if (mysql_num_rows($query))
	{
		if (isset($_GET["s"]))
			echo !intval($_GET["s"])
				? "<p class=\"status\">{$l_newsletter_error}</p>"
				: "<p class=\"status\">{$l_newsletter_success}</p>";

?>

		<div id="m_form">
			<form enctype="multipart/form-data" action="smail.php" method="post">
				<fieldset>
					<label for="f_subject"><?php echo $l_subject; ?></label>
						<input type="text" name="subject" id="f_subject" />
					<label for="f_message"><?php echo $l_message; ?></label>
						<textarea cols="40" rows="5" name="message" id="f_message"></textarea>
					<label for="f_file"><?php echo $l_file; ?></label>
						<input type="file" name="file" id="f_file" />

					<input type="submit" value="<?php echo $l_submit; ?>" />
				</fieldset>
			</form>
		</div>

<?php

		while ($result = mysql_fetch_assoc($query))
		{
			echo "<hr />";

			echo "<div class=\"subscriber\">";
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

			echo "<p class=\"footer\"><a href=\"\" onclick=\"rmsubscriber('", $result["id"], "'); return false;\">", $l_remove, "</a></p>";

			echo "</div>";
		}
	}
	else
	{
		echo "<div class=\"subscriber\">";
		echo "<p>", $l_no_subscribers, "</p>";
		echo "</div>";
	}

	echo "</div>";

?>

	</body>
</html>

