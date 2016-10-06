<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{
	public function __construct($rules = array())
	{
        parent::__construct($rules);
	}

	public function load($path = false)
	{
		if(! $path)
			$path = str_ireplace('/', DIRECTORY_SEPARATOR, __DIR__ . '/Validation/' . $this->CI->router->directory . $this->CI->router->class . '/' . $this->CI->router->method);

		if(!endsWith($path, '.php') && !contains($path, '.')) {
			$path .= '.php';
		}
		

		if(! file_exists($path)) {
			$guesses = array( 
				str_ireplace('/', DIRECTORY_SEPARATOR, __DIR__ . '/Validation/' . $this->CI->router->directory . $this->CI->router->class . '/' . $path),
				str_ireplace('/', DIRECTORY_SEPARATOR, __DIR__ . '/Validation/' . $path),
				str_ireplace('/', DIRECTORY_SEPARATOR, __DIR__ . '/' . $path)
				);
			foreach ($guesses as $guess_path) {
				if(file_exists($guess_path)) {
					$this->__load($guess_path);
					return ;
				}
			}
		} else {
			$this->__load($path);
			return ;
		}

		show_error('Validation file is not found');
	}

	private function __load($path) {
		$ci = $this->CI;
		
		$file = include $path;

		if(is_array($file)) {
			$this->set_rules($file);
		}
	}
}