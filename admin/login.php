<?php

	session_start();

	/**/

	require_once("functions.inc.php");

	if (is_loggedin()) { header("Location: index.php"); exit; }

	/**/

	if (isset($_POST["passwd"]))
	{
		require_once("config.inc.php");

		$fp = fopen("sleep", "r");
		$sleep = fgets($fp);
		fclose($fp);

		if ($sleep < time() && md5($_POST["passwd"]) == ADMIN_PASSWD)
		{
			session_regenerate_id();

			$_SESSION["fingerprint"] = md5(generate_fingerprint());

			header("Location: index.php");
			exit;
		}

		$fp = fopen("sleep", "w");
		fwrite($fp, time() + DELAY);
		fclose($fp);
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<meta http-equiv="content-language" content="en" />

		<title></title>

		<link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen" />
	</head>
	<body>

		<div id="logo">
			<img alt="logo" src="images/logo.gif" />
		</div>

		<div id="l_form">
			<form action="login.php" method="post">
				<fieldset>
					<label for="f_username">Username</label>
						<input type="text" name="username" id="f_username" />
					<label for="f_passwd">Password</label>
						<input type="password" name="passwd" id="f_passwd" />

					<input type="submit" value="Login" />
				</fieldset>
			</form>
		</div>

	</body>
</html>

