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

	mysql_query("DELETE FROM formation WHERE id={$_GET["id"]}");

	header("Location: formation.php");

?>

