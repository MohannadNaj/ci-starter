<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App
{
	public $ci;
	function __construct($config = array())
	{
		$this->ci =& get_instance();
		$data['providers'] = $this->ci->hybridauthlib->getProviders();
		$data['auth_view'] =  ($this->ci->ion_auth->logged_in() ? "user" : "guest");
		$this->ci->load->vars($data);
		$this->init();
	}

	public function init()
	{
	}
}

/* End of file HybridAuthLib.php */
/* Location: ./application/libraries/HybridAuthLib.php */