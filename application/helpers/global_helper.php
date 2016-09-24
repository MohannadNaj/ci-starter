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
