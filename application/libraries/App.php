<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App
{
	public $ci;
	function __construct($config = array())
	{
		$this->ci =& get_instance();
		$this->init();
	}

	public function init()
	{
	}
}

/* End of file HybridAuthLib.php */
/* Location: ./application/libraries/HybridAuthLib.php */