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

	/**/

	require_once("config.inc.php");

	mysql_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWD) && mysql_select_db(MYSQL_DB) or exit(mysql_error());

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

		<form action="rsubmit.php" method="post">
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
							<tr>
								<td colspan="2"><?php echo $l_sos; ?></td>
								<td colspan="2"><input type="text" name="sos" class="textf mwidth" /></td>
							</tr>
							<tr>
								<td colspan="2"><?php echo $l_bloodtype; ?></td>
								<td colspan="2"><input type="text" name="bloodtype" class="textf mwidth" /></td>
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
					<td width="640">
						<table width="100%">
							<tr>
								<td colspan="2"><strong><?php echo $l_reservations; ?></strong></td>
							</tr>
							<tr>
								<td width="50%" id="reservations">
									<div>
										<table width="100%">
											<tr>
												<td colspan="2"><br /></td>
											</tr>
											<tr>
												<td width="40"><?php echo $l_date; ?></td>
												<td>
													<input type="text" name="date[0]" size="15" id="date_0" readonly="readonly" class="textf fix" />
													<img alt="" src="imagens/estrutura/botoes/calendario.jpg" onclick="dblock('unavailability_0');" class="fix pointer" />

													<?php

														$_time	= time();

														$day	= date("j", $_time);
														$month	= date("n", $_time);
														$year	= date("Y", $_time);

													?>

													<div id="unavailability_0" class="calendar">
														<table>
															<tr>
																<td class="navigator" colspan="7">
																	<table>
																		<tr>
																			<td class="previous"><a href="" onclick="rcal('<?php echo mktime(0, 0, 0, $month-1, $day, $year); ?>', 'unavailability_0'); return false;">&#8249;</a></td>
																			<td><h5><?php echo "{$l_month[$month-1]} {$year}"; ?></h5></td>
																			<td class="next"><a href="" onclick="rcal('<?php echo mktime(0, 0, 0, $month+1, $day, $year); ?>', 'unavailability_0'); return false;">&#8250;</a></td>
																		</tr>
																	</table>
																</td>
															</tr>

															<tr>
																<th><?php echo $l_mo; ?></th>
																<th><?php echo $l_tu; ?></th>
																<th><?php echo $l_we; ?></th>
																<th><?php echo $l_th; ?></th>
																<th><?php echo $l_fr; ?></th>
																<th><?php echo $l_sa; ?></th>
																<th><?php echo $l_su; ?></th>
															</tr>

															<?php

																define("WEEK_DAYS", 7);

																$week_day = date("N", mktime(0, 0, 0, $month, 1, $year));

																$num_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

																// $week_day will hold 0 (Mon) through 6 (Sun) after decrement
																$num_weeks = (--$week_day + $num_days) / WEEK_DAYS;

																if ($num_weeks > intval($num_weeks))
																	$num_weeks = intval($num_weeks) + 1;

																$num_cells = $num_weeks * WEEK_DAYS;


																for ($c = 1; $c <= $num_cells; $c++)
																{
																	if (!(($c-1) % WEEK_DAYS))
																		echo "<tr>";

																	echo "<td>";

																	if ($c > $week_day && $c <= ($week_day + $num_days))
																	{
																		$mntime = mktime(0, 0, 0, $month, $c-$week_day, $year);

																		$query = mysql_query("SELECT * FROM unavailability WHERE mntime={$mntime}");

																		if (mysql_num_rows($query))
																			echo "<span>", $c-$week_day, "</span>";
																		else
																			echo "<a href=\"\" onclick=\"document.getElementById('date_0').value='", $c-$week_day, "/",
																				$month, "/", $year, "'; dnone('unavailability_0'); return false;\">", $c-$week_day, "</a>";
																	}

																	echo "</td>";

																	if (!($c % WEEK_DAYS))
																		echo "</tr>";
																}

															?>

															<tr>
																<td colspan="7"><a href="" onclick="dnone('unavailability_0'); return false;"><?php echo $l_close; ?></a></td>
															</tr>
														</table>
													</div>
												</td>
											</tr>
											<tr>
												<td colspan="2"><br /></td>
											</tr>
											<tr>
												<td colspan="2">
													<table width="100%">
														<tr>
															<td width="125">
																<input type="radio" name="timeperiod[0]" value="<?php echo $l_morning; ?>" />
																<label><?php echo $l_morning; ?></label>
															</td>
															<td>
																<input type="radio" name="timeperiod[0]" value="<?php echo $l_afternoon; ?>" />
																<label><?php echo $l_afternoon; ?></label>
															</td>
														</tr>
														<tr>
															<td width="125">
																<input type="radio" name="numdives[0]" value="<?php echo $l_onedive; ?>" />
																<label><?php echo $l_onedive; ?></label>
															</td>
															<td>
																<input type="radio" name="numdives[0]" value="<?php echo $l_twodives; ?>" />
																<label><?php echo $l_twodives; ?></label>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</div>
								</td>
								<td valign="bottom" class="padbottom"><a href="" onclick="bookmoredives(); return false;"><?php echo $l_bookmoredives; ?></a></td>
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
					<td width="640">
						<table width="100%">
							<tr>
								<td width="250"><?php echo $l_equipreq; ?></td>
								<td>
									<input type="radio" name="equipreq" id="f_equipreqy" />
									<label for="f_equipreqy"><?php echo $l_yes; ?></label>
									<input type="radio" name="equipreq" id="f_equipreqn" />
									<label for="f_equipreqn"><?php echo $l_no; ?></label>
								</td>
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
					<td width="640" id="equipment">
						<table width="100%">
							<tr>
								<td><strong><?php echo $l_ifequipreq; ?></strong></td>
							</tr>
							<tr>
								<td><br /></td>
							</tr>
							<tr>
								<td>
									<table width="100%">
										<tr>
											<td width="40"><?php echo $l_weight; ?></td>
											<td width="80"><input type="text" name="weight" size="5" class="textf" /></td>
											<td width="55"><?php echo $l_height; ?></td>
											<td width="80"><input type="text" name="height" size="5" class="textf" /></td>
											<td width="105"><?php echo $l_footsize; ?></td>
											<td><input type="text" name="footsize" size="5" class="textf" /></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<table width="100%">
										<tr>
											<td colspan="3"><br /></td>
											<td width="20" class="centre">2</td>
											<td width="20" class="centre">3</td>
											<td width="20" class="centre">4</td>
											<td width="20" class="centre">5</td>
										</tr>
										<tr>
											<td width="220">
												<input type="checkbox" name="equipment[]" value="<?php echo $l_fullequipment; ?>" id="f_equipmentfe" />
												<label for="f_equipmentfe"><?php echo $l_fullequipment; ?></label>
											</td>
											<td width="200">
												<input type="checkbox" name="equipment[]" value="<?php echo $l_mask; ?>" id="f_equipmentm" />
												<label for="f_equipmentm"><?php echo $l_mask; ?></label>
											</td>
											<td><?php echo $l_jacket; ?></td>
											<td width="20" class="centre"><input type="radio" name="jacket" value="2" /></td>
											<td width="20" class="centre"><input type="radio" name="jacket" value="3" /></td>
											<td width="20" class="centre"><input type="radio" name="jacket" value="4" /></td>
											<td width="20" class="centre"><input type="radio" name="jacket" value="5" /></td>
										</tr>
										<tr>
											<td width="220">
												<input type="checkbox" name="equipment[]" value="<?php echo $l_tank; ?>" id="f_equipmentt" />
												<label for="f_equipmentt"><?php echo $l_tank; ?></label>
											</td>
											<td width="200">
												<input type="checkbox" name="equipment[]" value="<?php echo $l_snorkel; ?>" id="f_equipments" />
												<label for="f_equipments"><?php echo $l_snorkel; ?></label>
											</td>
											<td><?php echo $l_farmerjohn; ?></td>
											<td width="20" class="centre"><input type="radio" name="farmerjohn" value="2" /></td>
											<td width="20" class="centre"><input type="radio" name="farmerjohn" value="3" /></td>
											<td width="20" class="centre"><input type="radio" name="farmerjohn" value="4" /></td>
											<td width="20" class="centre"><input type="radio" name="farmerjohn" value="5" /></td>
										</tr>
										<tr>
											<td width="220">
												<input type="checkbox" name="equipment[]" value="<?php echo $l_regulator; ?>" id="f_equipmentr" />
												<label for="f_equipmentr"><?php echo $l_regulator; ?></label>
											</td>
											<td width="200">
												<input type="checkbox" name="equipment[]" value="<?php echo $l_fins; ?>" id="f_equipmentf" />
												<label for="f_equipmentf"><?php echo $l_fins; ?></label>
											</td>
											<td><?php echo $l_divesuit; ?></td>
											<td width="20" class="centre"><input type="radio" name="divesuit" value="2" /></td>
											<td width="20" class="centre"><input type="radio" name="divesuit" value="3" /></td>
											<td width="20" class="centre"><input type="radio" name="divesuit" value="4" /></td>
											<td width="20" class="centre"><input type="radio" name="divesuit" value="5" /></td>
										</tr>
										<tr>
											<td width="220">
												<input type="checkbox" name="equipment[]" value="<?php echo $l_weight; ?>" id="f_equipmentw" />
												<label for="f_equipmentw"><?php echo $l_weight; ?></label>
											</td>
											<td width="200">
												<input type="checkbox" name="equipment[]" value="<?php echo $l_boots; ?>" id="f_equipmentb" />
												<label for="f_equipmentb"><?php echo $l_boots; ?></label>
											</td>
											<td colspan="2"><br /></td>
											<td width="20" class="centre">S</td>
											<td width="20" class="centre">M</td>
											<td width="20" class="centre">L</td>
										</tr>
										<tr>
											<td width="220">
												<input type="checkbox" name="equipment[]" value="<?php echo $l_weightbelt; ?>" id="f_equipmentwb" />
												<label for="f_equipmentwb"><?php echo $l_weightbelt; ?></label>
											</td>
											<td width="200">
												<input type="checkbox" name="equipment[]" value="<?php echo $l_gloves; ?>" id="f_equipmentg" />
												<label for="f_equipmentg"><?php echo $l_gloves; ?></label>
											</td>
											<td colspan="2"><?php echo $l_bcd; ?></td>
											<td width="20" class="centre"><input type="radio" name="bcd" value="S" /></td>
											<td width="20" class="centre"><input type="radio" name="bcd" value="M" /></td>
											<td width="20" class="centre"><input type="radio" name="bcd" value="L" /></td>
										</tr>
									</table>
								</td>
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
					<td width="640">
						<table width="100%">
							<tr>
								<td><?php echo $l_hasinsurance; ?></td>
								<td>
									<input type="radio" name="insurance" value="<?php echo $l_yes; ?>" id="f_insurancey" />
									<label for="f_insurancey"><?php echo $l_yes; ?></label>
									<input type="radio" name="insurance" value="<?php echo $l_no; ?>" id="f_insurancen" />
									<label for="f_insurancen"><?php echo $l_no; ?></label>
								</td>
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
						<strong><?php echo $l_tac; ?></strong>
						<?php echo nl2br($l_ntac); ?>
					</td>
					<td width="20"><br /></td>
				</tr>
				<tr>
					<td colspan="3"><br /></td>
				</tr>
				<tr>
					<td width="20"><br /></td>
					<td width="640" class="terms">
						<input type="checkbox" id="f_terms" />
						<label for="f_terms"><?php echo $l_aterms; ?></label>
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
