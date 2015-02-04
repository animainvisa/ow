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

	if (	(list($i_width, $i_height, $i_type) = getimagesize($_FILES["image"]["tmp_name"])) 
			&& ($i_type == IMAGETYPE_JPEG || $i_type == IMAGETYPE_PNG) 
			&& move_uploaded_file($_FILES["image"]["tmp_name"], "../news/" . basename($_FILES["image"]["name"]))	)
	{
		$image = basename($_FILES["image"]["name"]);

		$o_image = ($i_type == IMAGETYPE_JPEG) 
					? imagecreatefromjpeg("../news/{$image}") 
					: imagecreatefrompng("../news/{$image}");

		if ($i_width <= MAX_THUMBNAIL_XY && $i_height <= MAX_THUMBNAIL_XY) 
			{ $thumb_x = $i_width; $thumb_y = $i_height; }
		elseif ($i_width > $i_height)
			{ $thumb_x = MAX_THUMBNAIL_XY; $thumb_y = $i_height * MAX_THUMBNAIL_XY / $i_width; }
		else
			{ $thumb_x = $i_width * MAX_THUMBNAIL_XY / $i_height; $thumb_y = MAX_THUMBNAIL_XY; }

		$n_image = imagecreatetruecolor($thumb_x, $thumb_y);

		imagecopyresampled($n_image, $o_image, 0, 0, 0, 0, $thumb_x, $thumb_y, $i_width, $i_height);

		($i_type == IMAGETYPE_JPEG) 
			? imagejpeg($n_image, "../news/tn_{$image}", 100) 
			: imagepng($n_image, "../news/tn_{$image}", 0);

		imagedestroy($o_image); 
		imagedestroy($n_image);

		/**/

		$query = sprintf("INSERT INTO news (lang, title, message, image) VALUES ('%s', '%s', '%s', '%s')", 
					mysql_real_escape_string($_POST["lang"]), 
					mysql_real_escape_string($_POST["title"]), 
					mysql_real_escape_string($_POST["message"]), 
					mysql_real_escape_string($image));

		mysql_query($query);
	}

	header("Location: news.php");

?>

