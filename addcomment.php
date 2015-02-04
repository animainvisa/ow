<?php

	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

	/**/

	require_once("config.inc.php");

	mysql_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWD) && mysql_select_db(MYSQL_DB) or exit(mysql_error());

	/**/

	$query = sprintf("INSERT INTO guestbook (name, email, comment, time) VALUES ('%s', '%s', '%s', %d)", 
				mysql_real_escape_string($_POST["name"]), 
				mysql_real_escape_string($_POST["email"]), 
				mysql_real_escape_string($_POST["comment"]), 
				-time());

	!isset($_POST["spamfree"]) || !mysql_query($query)
		? header("Location: gform.php?s=0")
		: header("Location: gform.php?s=1");

?>

