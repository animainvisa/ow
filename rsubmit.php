<?php

	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

	/**/

	require_once("config.inc.php");

	mysql_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWD) && mysql_select_db(MYSQL_DB) or exit(mysql_error());

	/**/

	$columns = $data = null;

	$unprocessed_fields = array("equipreq", "x", "y", "spamfree");

	foreach ($_POST as $name => $value)
	{
		if (in_array($name, $unprocessed_fields))
			continue;

		if (is_array($value))
			$value = serialize($value);

		$columns .= mysql_real_escape_string($name) . ", ";
		$data .= "'" .mysql_real_escape_string($value). "', ";
	}

	$columns = substr($columns, 0, -2);
	$data = substr($data, 0, -2);

	$query = "INSERT INTO reservations (" .$columns. ") VALUES (" .$data. ")";

	!isset($_POST["spamfree"]) || !mysql_query($query)
		? header("Location: rform.php?s=0")
		: header("Location: rform.php?s=1");

?>

