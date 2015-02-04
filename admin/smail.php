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

	$attachment_exists = is_uploaded_file($_FILES["file"]["tmp_name"]) ? true : false;

	$headers = "From: Open Waters <" .OW_EMAIL. ">\r\n";
	$headers .= "Subject: =?iso-8859-1?b?" .base64_encode($_POST["subject"]). "?=\r\n";
	$headers .= "MIME-Version: 1.0\r\n";

	if ($attachment_exists)
	{
		$uid = md5(uniqid(mt_rand(), true));

		$headers .= "Content-Type: multipart/mixed; boundary=\"" .$uid. "\"\r\n\r\n";

		$headers .= "--" .$uid. "\r\n";
	}

	$headers .= "Content-Type: text/plain; charset=iso-8859-1\r\n";
	$headers .= "Content-Transfer-Encoding: base64\r\n\r\n";

	$headers .= chunk_split(base64_encode($_POST["message"]));
	
	if ($attachment_exists)
	{
		$headers .= "\r\n--" .$uid. "\r\n";
		$headers .= "Content-Type: application/octet-stream\r\n";
		$headers .= "Content-Transfer-Encoding: base64\r\n";
		$headers .= "Content-Disposition: attachment; filename=\"" .basename($_FILES["file"]["name"]). "\"\r\n\r\n";

		$headers .= chunk_split(base64_encode(file_get_contents($_FILES["file"]["tmp_name"])));
		$headers .= "\r\n--" .$uid. "--";
	}

	$query = mysql_query("SELECT email FROM newsletter");

	for ($to = OW_EMAIL; list($email) = mysql_fetch_row($query);)
		$to .= ", " . $email;

	!mail($to, "", "", $headers)
		? header("Location: newsletter.php?s=0")
		: header("Location: newsletter.php?s=1");

?>

