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

	public function shared($field, $path = false) {
		static $_loaded ;

		if(empty($field)) {
			show_error("Shared validation field is not defined");
		}

		if(count(func_get_args()) > 2) {
			$args = func_get_args();
			$path = end($args);
			array_pop($args);
			$field = $args;
		}

		$found = $real_path = false;

		if(isset($_loaded[$path])) {
			$found = true;
			$real_path = $_loaded[$path]['__my_form_validation_real_path'];
		}
		
		if( ! $found) {
			if ($path) {
				$real_path = $this->__get_path('shared/' . $path );
			} else {
				$real_path = $this->__get_path('shared/' . $this->CI->router->class );
			}

			if($real_path)
				$found = true;
			else
				show_error('Shared validation file is not found');
		}

		$shared_file = $_loaded[$path] = $this->__load($real_path);
		$_loaded[$path]['__my_form_validation_real_path'] = $real_path;

		if(is_array($field)) {
			$result = array();
			foreach ($field as $key ) {

				if(empty($key)) 
					continue;

			 	$result[] = $this->__get_field_or_fail($key, $shared_file, $real_path);
			 }

			 return $result;
		}

		return $this->__get_field_or_fail($field, $shared_file, $real_path);
	}

	public function set_rules($field, $label = '', $rules = array(), $errors = array())
	{
		if (is_array($field))
		{
			foreach ($field as $row)
			{
				// Houston, we have a problem...
				if ( ! isset($row['field'], $row['rules']))
				{
					if(is_array($row)) {
						foreach ($row as $second_depth_field => $second_depth_row) {
							if ( ! isset($second_depth_row['field'], $second_depth_row['rules']))
							{
								continue;
							} else {
								$this->__prepare_set_rules($second_depth_row);
							}
						}
					} else {
						continue;					
					}
				} else {
					$this->__prepare_set_rules($row);
				}
			}
			return $this;
		}
		return parent::set_rules($field, $label, $rules, $errors);
	}

	public function required_field($field, $label) {
		return 	array(
			'field' => $field,
			'label' => $label,
			'rules' => 'required'
			);
	}
	private function __prepare_set_rules($row) {
		// If the field label wasn't passed we use the field name
		$label = isset($row['label']) ? $row['label'] : $row['field'];

		// Add the custom error message array
		$errors = (isset($row['errors']) && is_array($row['errors'])) ? $row['errors'] : array();

		// Here we go!
		$this->set_rules($row['field'], $label, $row['rules'], $errors);
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

	private function __get_field_or_fail($key, $shared_file, $real_path) {

		$field_index = array_search($key, array_column($shared_file, 'field'));

		if($field_index === FALSE || ! isset($shared_file[$field_index])) {
			show_error("Shared validation field [$key] is not set in the file: $real_path");
		}

		return $shared_file[$field_index];
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