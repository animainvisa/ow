<?php

	session_start();

	/**/

	require_once("functions.inc.php");

	if (!is_loggedin()) { header("Location: login.php"); exit; }

	/**/

	require_once("config.inc.php");

	mysql_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWD) && mysql_select_db(MYSQL_DB) or exit(mysql_error());

	/**/

	$lang = isset($_COOKIE["lang"]) 
				? $_COOKIE["lang"] 
				: "pt";

	require_once("lang_" .$lang. ".inc.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>" lang="<?php echo $lang; ?>">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<meta http-equiv="content-language" content="<?php echo $lang; ?>" />

		<title></title>

		<link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen" />
		<script type="text/javascript">

			//<![CDATA[

				var request;

				function ajax_request()
				{
					if (window.XMLHttpRequest)
						{ return new XMLHttpRequest(); }

					if (window.ActiveXObject)
						{ return new ActiveXObject("Microsoft.XMLHTTP"); }

					return false;
				}

				function ecal(mntime)
				{
					if (request = ajax_request())
					{
						var url = "ajax/ecalendar.php?tm=" + mntime;

						request.open("GET", url, true);

						request.onreadystatechange = function()
						{
							if (request.readyState == 4 && request.status == 200)
								{ document.getElementById("e_calendar").innerHTML = request.responseText; }
						}

						request.send(null);
					}
				}

				function ucal(mntime, update)
				{
					if (request = ajax_request())
					{
						var url = "ajax/ucalendar.php?tm=" + mntime;

						if (update)
							{ url += "&update"; }

						request.open("GET", url, true);

						request.onreadystatechange = function()
						{
							if (request.readyState == 4 && request.status == 200)
								{ document.getElementById("unavailability").innerHTML = request.responseText; }
						}

						request.send(null);
					}
				}

				function setlanguage(value)
				{
					var date = new Date();

					// setting one year after
					date.setTime(date.getTime() + 31536000000);

					window.document.cookie = "lang=" +value+ ";expires=" +date.toUTCString()+ ";path=/";

					window.location.reload();
				}

				function rmevent(id)
				{
					if (confirm("<?php echo $l_removal_message; ?>"))
						{ window.location = "rmevent.php?id=" + id; }
				}

				function rmnew(id)
				{
					if (confirm("<?php echo $l_removal_message; ?>"))
						{ window.location = "rmnew.php?id=" + id; }
				}

				function editcomment(id, action)
				{
					if (action == "accept")
						{ window.location = "editcomment.php?id=" + id + "&accept"; }
					else if (action == "remove" && confirm("<?php echo $l_removal_message; ?>"))
						{ window.location = "editcomment.php?id=" + id + "&remove"; }
				}

				function rmfrequest(id)
				{
					if (confirm("<?php echo $l_removal_message; ?>"))
						{ window.location = "rmfrequest.php?id=" + id; }
				}

				function rmmember(id)
				{
					if (confirm("<?php echo $l_removal_message; ?>"))
						{ window.location = "rmmember.php?id=" + id; }
				}

				function rmsubscriber(id)
				{
					if (confirm("<?php echo $l_removal_message; ?>"))
						{ window.location = "rmsubscriber.php?id=" + id; }
				}

				function rmreservation(id)
				{
					if (confirm("<?php echo $l_removal_message; ?>"))
						{ window.location = "rmreservation.php?id=" + id; }
				}

			//]]>

		</script>
	</head>
	<body>

		<div id="logo">
			<img alt="logo" src="images/logo.gif" />
		</div>

		<div id="languages">
			<ul>
				<li><a href="" onclick="setlanguage('pt'); return false;"><img alt="pt" src="images/flag_pt.png" ></a></li>
				<li><a href="" onclick="setlanguage('en'); return false;"><img alt="en" src="images/flag_en.png" /></a></li>
				<li><a href="" onclick="setlanguage('es'); return false;"><img alt="es" src="images/flag_es.png" /></a></li>
				<li><a href="" onclick="setlanguage('de'); return false;"><img alt="de" src="images/flag_de.png" /></a></li>
			</ul>
		</div>

		<div id="menu">
			<ul>
				<li><a href="index.php"><?php echo $l_home; ?></a></li>
				<li><a href="news.php"><?php echo $l_news; ?></a></li>
				<li><a href="ecalendar.php"><?php echo $l_ecalendar; ?></a></li>
				<li><a href="ucalendar.php"><?php echo $l_ucalendar; ?></a></li>
				<li><a href="formation.php"><?php echo $l_formation; ?></a></li>
				<li><a href="guestbook.php"><?php echo $l_guestbook; ?></a></li>
				<li><a href="members.php"><?php echo $l_members; ?></a></li>
				<li><a href="newsletter.php"><?php echo $l_newsletter; ?></a></li>
				<li><a href="reservations.php"><?php echo $l_reservations; ?></a></li>
				<li><a href="logout.php"><?php echo $l_logout; ?></a></li>
			</ul>
		</div>

