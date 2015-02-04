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

		<title>OPEN WATERS</title>

		<link href="estilos.css" rel="stylesheet" type="text/css" />
		<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
		<script type="text/javascript" src="javascript.js"></script>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

		<style type="text/css">

			.style1
			{ color: #ffffff; }

			.style2
			{ color: #4baddf; }

/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

#e_calendar
{
	margin: 15px 0;
}

#e_calendar *
{
	border: 0;

	margin: 0;
	padding: 0;
}

#e_calendar img,
#unavailability img
{
	width: 10px;
	height: 10px;
}

#e_calendar #calendar table *,
#unavailability #calendar table *
{
	text-align: center;

	font-size: 9px;
}

#e_calendar #calendar .navigator,
#unavailability #calendar .navigator
{
	color: #ffffff;
	background-color: #004367;

	padding: 2px 3px;
}

#e_calendar #calendar .navigator table,
#unavailability #calendar .navigator table
{
	width: 100%;
}

#e_calendar #calendar .navigator table *,
#unavailability #calendar .navigator table *
{
	color: #ffffff;
	background-color: #004367;

	padding: 0;
}

#e_calendar #calendar .navigator .previous,
#unavailability #calendar .navigator .previous
{
	text-align: left;
}

#e_calendar #calendar .navigator .next,
#unavailability #calendar .navigator .next
{
	text-align: right;
}

#e_calendar #calendar .navigator a,
#unavailability #calendar .navigator a
{
	text-decoration: none;
}

#e_calendar #calendar .navigator a:hover,
#unavailability #calendar .navigator a:hover
{
	text-decoration: none;
}

#e_calendar #calendar .navigator h5,
#unavailability #calendar .navigator h5
{
	font-weight: normal;

	font-size: 11px;
}

#e_calendar #calendar th,
#unavailability #calendar th
{
	padding: 3px;

	color: #ffffff;
	background-color: #0098ff;

	font-weight: normal;
}

#e_calendar #calendar td,
#unavailability #calendar td
{
	padding: 3px;

	background-color: #eaeaea;
}

#e_calendar #calendar #selected
{
	background-color: #cccccc !important;
}

#unavailability #calendar td span
{
	color: #eaeaea;
}

#e_calendar #calendar td a,
#unavailability #calendar td a
{
	color: #606c7d;

	text-decoration: none;
}

#e_calendar #calendar td a:hover,
#unavailability #calendar td a:hover
{
	text-decoration: overline;
}


#e_calendar #events
{
	margin: 20px 0;
}

#e_calendar #events *
{
	font-size: 10px;
}

#e_calendar #events table
{
	width: 100%;
}

#e_calendar #events .navigator 
{
	color: #ffffff;
	background-color: #004367;

	padding: 2px 3px;
}

#e_calendar #events .navigator * 
{
	color: #ffffff;
	background-color: #004367;

	padding: 0;
}

#e_calendar #events .navigator table
{
	width: 100%;
}

#e_calendar #events .navigator .previous
{
	text-align: left;
}

#e_calendar #events .navigator .next
{
	text-align: right;
}

#e_calendar #events .navigator a
{
	text-decoration: none;
}

#e_calendar #events .navigator a:hover
{
	text-decoration: none;
}

#e_calendar #events .navigator h5
{
	font-weight: normal;

	font-size: 11px;

	text-align: center;
}

#e_calendar #events td
{
	padding: 0 10px;

	color: #373e48;
	background-color: #eaeaea;

	text-align: left;
}

#e_calendar #events a
{
	color: #3771c8;
	text-decoration: none;
}

#e_calendar #events a:hover
{
	text-decoration: underline;
}

#e_calendar #events hr
{
	border-top: 1px solid #eaeaea; /* ie6 */
	border-bottom: 1px solid #ffffff;
}

#e_calendar #events .event
{
	padding: 10px 0;
}

#e_calendar #events .event h6
{
	padding: 2px 0;
}

#e_calendar #events .event p
{
	padding: 5px 0;
}

#e_calendar #events .event .empty
{
	text-align: center;
}



.new
{
	padding: 10px 0;
}

.new *
{
	margin: 0;
	padding: 0;

	border: 0;
}

.new img
{
	float: left;

	margin: 0 10px 10px 0;
	padding: 1px;

	border: 1px solid #174b6e;

	display: inline; /* ie6 */
}

.new h6
{
	padding: 2px 0;

	font-size: 14px;

	font-weight: normal;

	color: #174b6e;
}

.new p
{
	padding: 5px 0;
}

.new a
{
	color: #174b6e;

	text-decoration: none;
}

.new a:hover
{
	text-decoration: underline;
}

.new .footer
{
	clear: left;

	text-align: right;
}

hr.separator
{
	clear: left;

	margin: 0 10px;

	border: 1px solid #ffffff; /* ie6 */
	border-bottom: 1px solid #cccccc !important;
}

/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

		</style>
	</head>

	<body>

		<div align="center">
			<table width="920" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td width="920" height="160" valign="top">
						<table width="100%" border="0" cellpadding="0" cellspacing="0" class="bg_mergulhador">
							<tr>
								<td width="120" height="160">&nbsp;</td>
								<td width="800" valign="top">
									<table width="100%" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td width="246" height="160" valign="bottom">
												<img alt="" src="imagens/estrutura/logo.gif" width="246" height="39" />
												<br /><br />
											</td>
											<td width="389">&nbsp;</td>
											<td width="145" valign="top">
												<table width="100%" border="0" cellpadding="0" cellspacing="0">
													<tr>
														<td width="145" height="137">&nbsp;</td>
													</tr>
													<tr>
														<td height="13" valign="top">
															<table width="100%" border="0" cellpadding="0" cellspacing="0">
																<tr>
																	<td width="145" height="13" valign="top">
																		<img alt="" src="imagens/estrutura/procurar.png" width="145" height="13" />
																	</td>
																</tr>
															</table>
														</td>
													</tr>
													<tr>
														<td height="10"></td>
													</tr>
												</table>
											</td>
											<td width="20">&nbsp;</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td height="10" valign="top">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="120" height="10" valign="top">
									<table width="100%" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td width="120" height="18" valign="top">
												<script type="text/javascript">

													AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','122','height','320','title','menu','src','imagens/estrutura/menu/menu','quality','high','wmode','transparent','allowfullscreen','false','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','imagens/estrutura/menu/menu' ); //end AC code 
//end AC code
												</script>
												<noscript>
													<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="122" height="320" title="menu">
														<param name="movie" value="imagens/estrutura/menu/menu.swf" />
														<param name="wmode" value="transparent" />
														<param name="quality" value="high" />
														<param name="allowFullScreen" value="false" />
														<embed src="imagens/estrutura/menu/menu.swf" quality="high" wmode="transparent" width="122" height="320" allowFullScreen="false" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash"></embed>
													</object>
												</noscript>
											</td>
										</tr>
									</table>
								</td>
								<td width="798" valign="top">
									<table width="100%" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td width="798" valign="top">
												<img alt="" src="imagens/estrutura/bg/bg_branco_top.png" width="798" height="10" />
											</td>
										</tr>
										<tr>
											<td valign="top">
												<table width="100%" border="0" cellpadding="0" cellspacing="0" class="bg_branco">
													<tr>
														<td width="25" height="10">&nbsp;</td>
														<td width="490" valign="top">
															<table width="100%" border="0" cellpadding="0" cellspacing="0">
																<tr>
																	<td width="490" height="10" align="left" valign="top">
																		<div class="titulo"><p>nota de boas vindas</p></div>
																		<p> Somos uma empresa dedicada à prática do mergulho subaquático na costa algarvia desde 2005. Dispomos de uma equipa de mergulhadores experientes nas áreas de mergulho recreativo e técnico.</p>
																		<p>Promovemos a prática do mergulho na região revelando a riqueza subaquática segundo as normas da boa prática para esta actividade, garantindo a segurança dos praticantes e o respeito pelo património submerso.</p>
																		<p>Aceite o nosso convite e mergulhe connosco. Venha conhecer o maior tesouro submerso que a natureza reserva para aqueles que o procuram.</p>
																		<p>Bons Mergulhos.</p>
																		<p>&nbsp;</p>
																		<div class="titulo"><p>actualidades</p></div>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<?php

	$query = mysql_query("SELECT id, title, message, image FROM news WHERE lang='{$lang}' ORDER BY id DESC");

	if ($num_rows = mysql_num_rows($query))
	{
		for ($c = 1; list($id, $title, $message, $image) = mysql_fetch_row($query); $c++)
		{
			echo "<div class=\"new\">";
			echo "<img alt=\"\" src=\"news/tn_", rawurlencode($image), "\" />";
			echo "<h6>", $title, "</h6>";

			if (strlen($message) > MAX_CHARACTERS)
			{
				echo "<p>", nl2br(substr($message, 0, MAX_CHARACTERS)), "...</p>";
				echo "<p class=\"footer\"><a href=\"news.php?id=", $id, "\">", $l_read_more, "</a></p>";
			}
			else
				echo "<p>", nl2br($message), "</p>";

			echo "</div>";

			if ($c != $num_rows)
				echo "<hr class=\"separator\" />";
		}
	}
	else
	{
		echo "<div class=\"new\">";
		echo "<p>", $l_no_news, "</p>";
		echo "</div>";
	}

?>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

																	</td>
																</tr>
																<tr>
																	<td height="80">&nbsp;</td>
																</tr>
															</table>
														</td>
														<td width="23">&nbsp;</td>
														<td width="240" valign="top" align="center">

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<?php

	$_time	= time();

	$day	= date("j", $_time);
	$month	= date("n", $_time);
	$year	= date("Y", $_time);

?>

<div id="e_calendar">
	<div id="calendar">
		<table>
			<tr>
				<td class="navigator" colspan="7">
					<table cellspacing="0">
						<tr>
							<td class="previous">
								<a href="" onclick="ecal('<?php echo mktime(0, 0, 0, $month-1, $day, $year); ?>'); return false;">
									<img alt="left-arrow" src="imagens/estrutura/icons/left-arrow.png" />
								</a>
							</td>

							<td><h5><?php echo "{$l_month[$month-1]} {$year}"; ?></h5></td>

							<td class="next">
								<a href="" onclick="ecal('<?php echo mktime(0, 0, 0, $month+1, $day, $year); ?>'); return false;">
									<img alt="right-arrow" src="imagens/estrutura/icons/right-arrow.png" />
								</a>
							</td>
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

					echo (($c-$week_day) != $day) 
							? "<td>" 
							: "<td id=\"selected\">";

					if ($c > $week_day && $c <= ($week_day + $num_days))
						echo "<a href=\"\" onclick=\"ecal('", mktime(0, 0, 0, $month, $c-$week_day, $year), 
								"'); return false;\">", $c-$week_day, "</a>";

					echo "</td>";

					if (!($c % WEEK_DAYS))
						echo "</tr>";
				}

			?>

		</table>
	</div>

	<div id="events">
		<table>
			<tr>
				<td class="navigator">
					<table cellspacing="0">
						<tr>
							<td class="previous">
								<a href="" onclick="ecal('<?php echo mktime(0, 0, 0, $month, $day-1, $year); ?>'); return false;">
									<img alt="left-arrow" src="imagens/estrutura/icons/left-arrow.png" />
								</a>
							</td>

							<td><h5><?php echo "{$day} {$l_month[$month-1]} {$year}"; ?></h5></td>

							<td class="next">
								<a href="" onclick="ecal('<?php echo mktime(0, 0, 0, $month, $day+1, $year); ?>'); return false;">
									<img alt="right-arrow" src="imagens/estrutura/icons/right-arrow.png" />
								</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>

					<?php

						// midnight time
						$mntime = mktime(0, 0, 0, $month, $day, $year);

						$query = mysql_query("SELECT title, message FROM ecalendar WHERE mntime={$mntime} AND lang='{$lang}' ORDER BY id DESC");

						if ($num_rows = mysql_num_rows($query))
						{
							for ($c = 1; list($title, $message) = mysql_fetch_row($query); $c++)
							{
								echo "<div class=\"event\">";
								echo "<h6>", $title, "</h6>";
								echo "<p>", nl2br($message), "</p>";
								echo "</div>";

								if ($c != $num_rows)
									echo "<hr />";
							}
						}
						else
						{
							echo "<div class=\"event\">";
							echo "<p class=\"empty\">", $l_no_events, "</p>";
							echo "</div>";
						}

					?>

				</td>
			</tr>
		</table>
	</div>
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

														</td>
														<td width="20">&nbsp;</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td valign="top">
												<img alt="" src="imagens/estrutura/bg/bg_branco_base.png" width="798" height="10" />
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td height="15"></td>
				</tr>
				<tr>
					<td height="146" valign="top">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="122" height="146">&nbsp;</td>
								<td width="798" valign="top">
									<table width="100%" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td width="798" height="10" valign="top">
												<img alt="" src="imagens/estrutura/bg/bg_preto_top.png" width="798" height="10" />
											</td>
										</tr>
										<tr>
											<td height="135" valign="top">
												<table width="100%" border="0" cellpadding="0" cellspacing="0" class="bg_preto">
													<tr>
														<td width="798" height="11"></td>
													</tr>
													<tr>
														<td height="103" valign="top">
															<table width="100%" border="0" cellpadding="0" cellspacing="0">
																<tr>
																	<td width="25" height="103">&nbsp;</td>
																	<td width="185" valign="top">
																		<table width="100%" border="0" cellpadding="0" cellspacing="0">
																			<tr>
																				<td width="185" height="13"></td>
																			</tr>
																			<tr>
																				<td height="90" valign="top">
																					<table width="100%" border="0" cellpadding="0" cellspacing="0">
																						<tr>
																							<td width="25" height="90" valign="top">
																								<img alt="" src="imagens/estrutura/icons/icon_foto.jpg" width="25" height="23" />
																							</td>
																							<td width="10">&nbsp;</td>
																							<td width="150" valign="top">
																								<table width="100%" border="0" cellpadding="0" cellspacing="0">
																									<tr>
																										<td width="150" height="40" valign="top">
																											<table width="100%" border="0" cellpadding="0" cellspacing="0">
																												<tr>
																													<td width="40" height="40" valign="top">
																														<img alt="" src="imagens/conteudo/img4.jpg" width="40" height="40" />
																													</td>
																													<td width="15">&nbsp;</td>
																													<td width="40" valign="top">
																														<img alt="" src="imagens/conteudo/img2.jpg" width="40" height="40" />
																													</td>
																													<td width="15">&nbsp;</td>
																													<td width="40" valign="top">
																														<img alt="" src="imagens/conteudo/img1.jpg" width="40" height="40" />
																													</td>
																												</tr>
																											</table>
																										</td>
																									</tr>
																									<tr>
																										<td height="10"></td>
																									</tr>
																									<tr>
																										<td height="40" valign="top">
																											<table width="100%" border="0" cellpadding="0" cellspacing="0">
																												<tr>
																													<td width="40" height="40" valign="top">
																														<img alt="" src="imagens/conteudo/img1.jpg" width="40" height="40" />
																													</td>
																													<td width="15">&nbsp;</td>
																													<td width="40" valign="top">
																														<img alt="" src="imagens/conteudo/img3.jpg" width="40" height="40" />
																													</td>
																													<td width="15">&nbsp;</td>
																													<td width="40" valign="top">
																														<img alt="" src="imagens/conteudo/img1.jpg" width="40" height="40" />
																													</td>
																												</tr>
																											</table>
																										</td>
																									</tr>
																								</table>
																							</td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																	</td>
																	<td width="118">&nbsp;</td>
																	<td width="185" valign="top">
																		<table width="100%" border="0" cellpadding="0" cellspacing="0">
																			<tr>
																				<td width="185" height="17" align="left" valign="top" class="txt_footer conteudo">
																					<p class="txt_footer">
																						<strong>os nossos blogs favoritos</strong><br />
																						forumdemergulho.blogspot.com<br />
																						forumdemergulho.blogspot.com<br />
																						forumdemergulho.blogspot.com
																					</p>
																					<p>
																						<span class="txt_footer">
																							<strong>Acompanhe</strong>
																						</span>
																						<br />
																						<img alt="" src="imagens/estrutura/icons/icon_hi5.png" width="24" height="24" /><img alt="" src="imagens/estrutura/icons/icon_facebook.png" width="24" height="24" /><img alt="" src="imagens/estrutura/icons/icon_twitter.png" width="24" height="24" /><img alt="" src="imagens/estrutura/icons/icon_blog.png" width="24" height="24" /><img alt="" src="imagens/estrutura/icons/icon_meteo.png" width="24" height="24" />
																					</p>
																				</td>
																			</tr>
																		</table>
																	</td>
																	<td width="85"></td>
																	<td width="140" valign="top">
																		<table width="100%" border="0" cellpadding="0" cellspacing="0">
																			<tr>
																				<td width="64" height="10" valign="top">
																					<table width="100%" border="0" cellpadding="0" cellspacing="0">
																						<tr>
																							<td width="64" height="10" valign="top">
																								<img alt="" src="imagens/conteudo/logo_project_aweare.jpg" width="70" height="45" />
																							</td>
																						</tr>
																						<tr>
																							<td height="5"></td>
																						</tr>
																						<tr>
																							<td height="10" valign="top">
																								<img alt="" src="imagens/conteudo/logo_project_mar.jpg" width="70" height="46" />
																							</td>
																						</tr>
																					</table>
																				</td>
																				<td width="16">&nbsp;</td>
																				<td width="60" valign="top">
																					<img alt="" src="imagens/conteudo/logo_padi.jpg" width="60" height="100" />
																				</td>
																			</tr>
																			<tr>
																				<td height="3"></td>
																				<td></td>
																				<td></td>
																			</tr>
																		</table>
																	</td>
																	<td width="60"></td>
																</tr>
															</table>
														</td>
													</tr>
													<tr>
														<td height="8"></td>
													</tr>
													<tr>
														<td height="13" align="center" valign="top" class="txt_footer">
															Open waters | centro de mergulho | diving center | todos os direitos reservados | quarteira.vilamoura.2009 | webdesign bloco d | webmaster Tiago Tristão
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td height="10" valign="top">
												<img alt="" src="imagens/estrutura/bg/bg_preto_base.png" width="798" height="10" />
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td height="40">&nbsp;</td>
				</tr>
			</table>
		</div>
	</body>
</html>
