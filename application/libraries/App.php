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
		$data['providers'] = $this->ci->hybridauthlib->getProviders();
		$data['auth_view'] =  ($this->ci->ion_auth->logged_in() ? "user" : "guest");
		$data['is_user'] = $this->ci->ion_auth->logged_in() ;
		$data['is_password_by_social'] = $this->ci->session->userdata('user')['is_password_by_social'];

		$this->ci->load->vars($data);
	}
}

/* End of file HybridAuthLib.php */
/* Location: ./application/libraries/HybridAuthLib.php */