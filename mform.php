<?php

	$lang = isset($_COOKIE["lang"]) 
				? $_COOKIE["lang"] 
				: "pt";

	require_once("lang_" .$lang. ".inc.php");

	/**/

	if (isset($_GET["s"]))
		!intval($_GET["s"])
			? exit($l_sform_error)
			: exit($l_sform_success);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>" lang="<?php echo $lang; ?>">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<meta http-equiv="content-language" content="<?php echo $lang; ?>" />

		<title></title>

		<link rel="stylesheet" type="text/css" href="fstylesheet.css" media="screen" />
		<script type="text/javascript" src="javascript.js"></script>
	</head>
	<body>

		<form action="msubmit.php" method="post">
			<table width="680">
				<tr>
					<td colspan="3"><br /></td>
				</tr>
				<tr>
					<td width="20"><br /></td>
					<td width="640">
						<table width="100%">
							<tr>
								<td valign="top"><img alt="" src="imagens/conteudo/logo_ow_azul.jpg" /></td>
								<td class="right"><img alt="" src="imagens/conteudo/logo_dive_padi.jpg" /></td>
							</tr>
						</table>
					</td>
					<td width="20"><br /></td>
				</tr>
				<tr>
					<td colspan="3" height="35"><br /></td>
				</tr>
				<tr>
					<td width="20"><br /></td>
					<td width="640">
						<table width="100%">
							<tr>
								<td width="130"><?php echo $l_name; ?></td>
								<td colspan="3"><input type="text" name="name" id="f_name" class="textf mwidth" /></td>
							</tr>
							<tr>
								<td colspan="4"><br /></td>
							</tr>
							<tr>
								<td width="130"><?php echo $l_address; ?></td>
								<td colspan="3"><input type="text" name="address" class="textf mwidth" /></td>
							</tr>
							<tr>
								<td width="130"><?php echo $l_postcode; ?></td>
								<td width="165"><input type="text" name="postcode" size="15" class="textf" /></td>
								<td width="130"><?php echo $l_city; ?></td>
								<td><input type="text" name="city" class="textf mwidth" /></td>
							</tr>
							<tr>
								<td width="130"><?php echo $l_telephone; ?></td>
								<td width="165"><input type="text" name="telephone" size="15" class="textf" /></td>
								<td width="130"><?php echo $l_email; ?></td>
								<td><input type="text" name="email" class="textf mwidth" /></td>
							</tr>
							<tr>
								<td colspan="4"><br /></td>
							</tr>
							<tr>
								<td width="130"><?php echo $l_birthday; ?></td>
								<td width="165"><input type="text" name="birthday" size="15" class="textf" /></td>
								<td width="130"><?php echo $l_nationality; ?></td>
								<td><input type="text" name="nationality" class="textf mwidth" /></td>
							</tr>
							<tr>
								<td width="130"><?php echo $l_bi; ?></td>
								<td width="165"><input type="text" name="bi" size="15" class="textf" /></td>
								<td width="130"><?php echo $l_issuer; ?></td>
								<td><input type="text" name="issuer" class="textf mwidth" /></td>
							</tr>
							<tr>
								<td width="130"><?php echo $l_issuedate; ?></td>
								<td colspan="3"><input type="text" name="issuedate" size="15" class="textf" /></td>
							</tr>
							<tr>
								<td colspan="4"><br /></td>
							</tr>
							<tr>
								<td colspan="2"><?php echo $l_certlevel; ?></td>
								<td colspan="2"><input type="text" name="certlevel" class="textf mwidth" /></td>
							</tr>
						</table>
					</td>
					<td width="20"><br /></td>
				</tr>
				<tr>
					<td colspan="3"><br /></td>
				</tr>
				<tr>
					<td width="20"><br /></td>
					<td width="640" class="terms">
						<table width="100%">
							<tr>
								<td>
									<input type="checkbox" id="f_terms" />
									<label for="f_terms"><?php echo $l_mterms; ?></label>
								</td>
								<td class="right"><a href=""><?php echo $l_readterms; ?></a></td>
							</tr>
						</table>
					</td>
					<td width="20"><br /></td>
				</tr>
				<tr>
					<td colspan="3" height="35"><br /></td>
				</tr>
				<tr>
					<td width="20"><br /></td>
					<td width="640" class="centre"><input type="image" alt="" src="imagens/estrutura/botoes/enviar.jpg" /></td>
					<td width="20"><br /></td>
				</tr>
				<tr>
					<td colspan="3"><br /></td>
				</tr>
			</table>
		</form>

		<script type="text/javascript">
			var _0x732b=["\x6F\x6E\x63\x68\x61\x6E\x67\x65","\x66\x5F\x6E\x61\x6D\x65","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x70\x61\x72\x65\x6E\x74\x4E\x6F\x64\x65"];var _0x77c1=[_0x732b[0],_0x732b[1],_0x732b[2],_0x732b[3]];document[_0x77c1[2]](_0x77c1[1])[_0x77c1[0]]=function (){f(document[_0x77c1[2]](_0x77c1[1])[_0x77c1[3]]);} ;
		</script>

	</body>
</html>
