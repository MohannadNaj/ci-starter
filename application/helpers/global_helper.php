<?php
if(!function_exists('p'))
	{
		function p($str) {
			echo $str;
		}
	}

if(!function_exists('dd'))
	{
		function dd($var, $die = true) {
			echo "\n\r";
			print_r($var);
			echo "\n\r";
			if($die)
				die();
		}
}

if(!function_exists('pre'))
	{
		function pre($var, $die = true) {
			echo "<pre>\n\r";
			print_r($var);
			echo "</pre>\n\r";
			if($die)
				die();
		}
}

if(!function_exists('imgurl_to_thumb'))
	{
		function imgurl_to_thumb($remote, $id) {
			$ci =& get_instance();
			$target = UPLOADSDIR . $id;

			if(@copy($remote, $target)) {
				$config['image_library'] = 'gd2';
				$config['source_image'] = $target;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width']         = 75;
				$config['height']       = 50;

				$ci->load->library('image_lib', $config);
				$ci->image_lib->resize();
				unlink($target);
			}
		}
}