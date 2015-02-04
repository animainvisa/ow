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

	$query = mysql_query("SELECT image FROM news WHERE id={$_GET["id"]}");

	mysql_query("DELETE FROM news WHERE id={$_GET["id"]}");

	unlink("../news/" . mysql_result($query, 0));
	unlink("../news/tn_" . mysql_result($query, 0));

	header("Location: news.php");

?>

