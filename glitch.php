<?php

// set error to 0
ini_set('display_errors', 0);

/**
* 
*/
class Glitch
{
	
	function __construct()
	{
		if (isset($_GET['src'])) {
			$this->glitch_img();
		}else{
			$this->require_src();
		}
	}

	function glitch_img()
	{	
		$str = $this->get_img_hex();

		if ($this->isset_c()) {
			$cs = $this->get_cs();

			$str = $this->cut_str($str, $cs);
		}

		$str = hex2bin($str);
		$this->output_img($str);
	}

	function output_img($str)
	{
		if (imagecreatefromstring($str)) {
			$img = imagecreatefromstring($str);
		}else{
			$str = file_get_contents($_GET['src']);
			$img = imagecreatefromstring($str);
		}

		if ($this->isset_p()) {
			imagefilter($img, IMG_FILTER_PIXELATE, $this->get_ps(), true);
		}
		
		// output the image
		header('Content-Type: image/jpg');
		imagejpeg($img, NULL, $this->get_quality());
		imagedestroy($img);
	}

	function cut_str($str, $cs)
	{
		for ($i=0; $i < $cs; $i++) { 
			$rand_n = rand(8,strlen($str));
			$remove_n = (8*rand(1,$cs));
			$max_length = (strlen($str)-1000);

			if (is_int($rand_n/8) && $rand_n > 1000 && ($rand_n + $remove_n) < $max_length) {
				
				$string_to_cut = substr($str, $rand_n, $remove_n);
				$str = str_replace($string_to_cut, '', $str);
			}
		}
		return $str;
	}

	function isset_c()
	{
		if (isset($_GET['c']) && $_GET['c'] == 1) {
			$c = true;
		}else{
			$c = false;
		}
		return $c;
	}

	function get_cs()
	{
		if (isset($_GET['cs'])) {
			$cs = ($_GET['cs']*10);
		}else{
			$cs = 30;
		}
		return $cs;
	}

	function isset_p()
	{
		if (isset($_GET['p']) && $_GET['p'] == 1) {
			$p = true;
		}else{
			$p = false;
		}
		return $p;
	}

	function get_ps()
	{
		if (isset($_GET['ps'])) {
			$ps = ($_GET['ps']);
		}else{
			$ps = 5;
		}
		return $ps;
	}


	function get_img_hex()
	{
		$hex_img = file_get_contents($_GET['src']);
		$hex_img = bin2hex($hex_img);
		return $hex_img;
	}

	function get_quality()
	{
		if (isset($_GET['q'])) {
			$q = $_GET['q'];
		}else{
			$q = 80;
		}
		return $q;
	}

	function require_src()
	{
		$img = imagecreatetruecolor(300, 100);
		$bg = imagecolorallocate($img, 0, 0, 0);
		$text = imagecolorallocate($img, 0, 0, 255);
		imagestring($img, 5, 0, 0, 'required src attribute', $text);

		header('Content-Type: image/png');
		imagepng($img);
		imagedestroy($img);
	}

	function ext_not_supported()
	{
		$img = imagecreatetruecolor(300, 100);
		$bg = imagecolorallocate($img, 0, 0, 0);
		$text = imagecolorallocate($img, 0, 0, 255);
		imagestring($img, 5, 0, 0, 'file extension not supported', $text);

		header('Content-Type: image/png');
		imagepng($img);
		imagedestroy($img);
	}
}

$glitch = new Glitch();

?>