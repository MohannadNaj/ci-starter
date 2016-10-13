<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// TODO: set shared validation rules
class MY_Form_validation extends CI_Form_validation
{
	public $with = array();

	public function __construct($rules = array())
	{
        parent::__construct($rules);
	}

	public function with($vars = array()) {
		$this->with = $vars;
		return $this;
	}

	public function load($path = false)
	{
		$path = $this->__get_path($path);
		if($path) {
			
			$file = $this->__load($path);

			if(is_array($file)) {
				$this->set_rules($file);
			}

			return $this;
		} else {
			show_error('Validation file is not found');
		}
	}

	private function __get_path($path = false) {
		$found = false;

		if( ! $path)
			$path = str_ireplace('/', DIRECTORY_SEPARATOR, APPPATH . 'controllers/validation/' .  $this->CI->router->directory . $this->CI->router->class . '/' . $this->CI->router->method);

		if( ! endsWith($path, '.php') && !contains($path, '.')) {
			$path .= '.php';
		}
		
		if( ! file_exists($path)) {
			$guesses = array( 
				str_ireplace('/', DIRECTORY_SEPARATOR, APPPATH . 'controllers/validation/' . $this->CI->router->directory . $this->CI->router->class . '/' . $path),
				str_ireplace('/', DIRECTORY_SEPARATOR, APPPATH . 'controllers/validation/' . $path),
				);
			foreach ($guesses as $guess_path) {
				if(file_exists($guess_path)) {
					$path = $guess_path;
					$found = true;
					break;
				}
			}
		} else {
			$found = true;
		}

		if($found) 
			return $path;
		else
			return false;
	}

	private function __load($path) {
		$ci = $this->CI;
		
		if( ! empty($this->with)) {
			extract($this->with);
			$this->with = array();
		}

		$file = include $path;

		return $file;
	}
}