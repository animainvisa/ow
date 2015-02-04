<?php

	require_once("config.inc.php");

	mysql_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWD) && mysql_select_db(MYSQL_DB) or exit(mysql_error());

	/**/

	$lang = isset($_COOKIE["lang"]) 
				? $_COOKIE["lang"] 
				: "pt";

	require_once("lang_" .$lang. ".inc.php");

	/**/

	$id = (int) $_GET["id"];

	$query = mysql_query("SELECT title, message, image FROM news WHERE lang='{$lang}' AND id={$id}");

	if (!mysql_num_rows($query)) { exit; }

	/**/

	list($title, $message, $image) = mysql_fetch_row($query);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>" lang="<?php echo $lang; ?>">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<meta http-equiv="content-language" content="<?php echo $lang; ?>" />

		<title></title>

		<style type="text/css">

			*
			{
				margin: 0;
				padding: 0;

				border: 0;

				text-align: justify;

				font-family: Verdana, Arial, Helvetica, sans-serif;
				font-size: 11px;

				background-color: #184b6f;
			}

			table
			{ border-collapse: collapse; }

			.right
			{ text-align: right; }

			#header
			{
				background-image: url(imagens/estrutura/bg/bg_branco_top.png);
				background-position: bottom center;
				background-repeat: no-repeat;
			}

			#body *
			{ background-color: #ffffff; }

			#body td
			{
				padding-top: 10px;
				padding-bottom: 10px;
			}

			#body img
			{
				border: 1px solid #184b6f;

				padding: 1px;
			}

			#body a
			{
				color: #184b6f;

				text-decoration: none;
			}

			#body a:hover
			{ text-decoration: underline; }

			.centre
			{ text-align: center; }

			.title
			{
				color: #174b6e;

				font-size: 15px;
			}

			.data
			{
				padding-left: 5px;
				padding-right: 20px;
			}

			#footer
			{
				background-image: url(imagens/estrutura/bg/bg_branco_base.png);
				background-position: top center;
				background-repeat: no-repeat;
			}

		</style>
	</head>

	<body>

		<table width="470">
			<tr>
				<td colspan="3"><br /></td>
			</tr>
			<tr>
				<td width="20"><br /></td>
				<td width="430">
					<table width="100%">
						<tr>
							<td><img alt="" src="imagens/estrutura/popups/logo_bg_azul.gif" /></td>
							<td class="right"><img alt="" src="imagens/estrutura/popups/img_actualidades.gif" /></td>
						</tr>
					</table>
				</td>
				<td width="20"><br /></td>
			</tr>
			<tr>
				<td colspan="3" height="45"><br /></td>
			</tr>
			<tr>
				<td width="20"><br /></td>
				<td id="header" width="430"><br /></td>
				<td width="20"><br /></td>
			</tr>
			<tr>
				<td width="20"><br /></td>
				<td id="body" width="430">
					<table width="100%">
						<tr>
							<td rowspan="2" valign="top" width="150" class="centre"><img alt="" src="news/tn_<?php echo rawurlencode($image); ?>" /></td>
							<td valign="top" height="15" class="title data"><?php echo $title; ?></td>
						</tr>
						<tr>
							<td valign="top" class="data"><?php echo nl2br($message); ?></td>
						</tr>
					</table>
				</td>
				<td width="20"><br /></td>
			</tr>
			<tr>
				<td width="20"><br /></td>
				<td id="footer" width="430"><br /></td>
				<td width="20"><br /></td>
			</tr>
			<tr>
				<td colspan="3"><br /></td>
			</tr>
		</table>

	</body>
</html>
