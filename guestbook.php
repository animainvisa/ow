<?php

	require_once("config.inc.php");

	mysql_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWD) && mysql_select_db(MYSQL_DB) or exit(mysql_error());

	/**/

	$lang = isset($_COOKIE["lang"]) 
				? $_COOKIE["lang"] 
				: "pt";

	require_once("lang_" .$lang. ".inc.php");

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

			#body
			{ padding: 5px 0; }

			#body, 
			#body *
			{ background-color: #ffffff; }

			#body td
			{
				padding-top: 5px;
				padding-bottom: 5px;
			}

			.title
			{ color: #174b6e; }

			.data
			{
				padding-left: 10px;
				padding-right: 30px;
			}

			hr
			{
				margin: 5px 20px;

				border: 1px solid #ffffff; /* ie6 */
				border-bottom: 1px solid #cccccc;
			}

			.centre
			{ text-align: center; }

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
							<td class="right"><img alt="" src="imagens/estrutura/popups/img_guestbook.gif" /></td>
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

						<?php

							$query = mysql_query("SELECT name, comment, time FROM guestbook WHERE time=ABS(time) ORDER BY time DESC");

							if ($num_rows = mysql_num_rows($query))
							{
								for ($c = 1; list($name, $comment, $_time) = mysql_fetch_row($query); $c++)
								{
									$day	= date("d", $_time);
									$month	= date("n", $_time);
									$year	= date("Y", $_time);

									$_date = $day ."'". strtoupper(substr($l_month[$month-1], 0, 3)) ."'". $year;

									echo "<tr>";
									echo "<td width=\"50\" class=\"title right\">&bull;</td>";
									echo "<td class=\"title data\">", htmlentities($name), ", ", $_date, "</td>";
									echo "</tr>";
									echo "<tr>";
									echo "<td width=\"50\"><br /></td>";
									echo "<td class=\"data\">", nl2br(htmlentities($comment)), "</td>";
									echo "</tr>";

									if ($c != $num_rows)
									{
										echo "<tr>";
										echo "<td colspan=\"2\"><hr /></td>";
										echo "</tr>";
									}
								}
							}
							else
							{
								echo "<tr>";
								echo "<td class=\"centre\">", $l_no_comments, "</td>";
								echo "</tr>";
							}

						?>

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
