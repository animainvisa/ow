<?php

	function generate_fingerprint()
	{
		$string = null;

		$fragments = @preg_split("/(\.|;)/", $_SERVER["HTTP_USER_AGENT"]);

		for ($i = 0; $i < count($fragments); $i++)
			$string .= substr(strrev(md5($fragments[$i])), 0xa, 0x2);

		return md5($string);
	}

	function is_loggedin()
	{
		if (isset($_SESSION["fingerprint"]))
			if ($_SESSION["fingerprint"] == md5(generate_fingerprint()))
				return true;

		return false;
	}

?>

