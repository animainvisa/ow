<?php

	session_start();

	/**/

	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

	/**/

	require_once("functions.inc.php");

	if (!is_loggedin()) { header("Location: login.php"); exit; }

	/**/

	require_once("config.inc.php");

	mysql_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWD) && mysql_select_db(MYSQL_DB) or exit(mysql_error());

	/**/

	$query = sprintf("INSERT INTO ecalendar (mntime, lang, title, message) VALUES (%u, '%s', '%s', '%s')", 
				mysql_real_escape_string($_POST["mntime"]), 
				mysql_real_escape_string($_POST["lang"]), 
				mysql_real_escape_string($_POST["title"]), 
				mysql_real_escape_string($_POST["message"]));

	mysql_query($query);

	header("Location: ecalendar.php?tm={$_POST["mntime"]}");

?>

