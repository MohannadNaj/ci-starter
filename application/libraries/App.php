<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App
{
	public $ci;
	public $jsVars = array();

	function __construct($config = array())
	{
		$this->ci =& get_instance();
		$this->ci->load->config('app', TRUE);
		$this->init();
	}

	public function init()
	{
		$data['providers'] = $this->ci->hybridauthlib->getProviders();
		$data['auth_view'] =  ($this->ci->ion_auth->logged_in() ? "user" : "guest");
		$data['is_user'] = $this->ci->ion_auth->logged_in() ;
		$data['is_password_by_social'] = $this->ci->session->userdata('user')['is_password_by_social'];
		$data['auth_route'] = $this->ci->config->item('ionauth_login_route_prefix', 'app');
		$this->jsVars['base_url'] = base_url();
		$this->ci->load->vars($data);
	}

	public function setJs($key, $val) {
		$this->jsVars[$key] = $val;
	}

	public function getJsVars() {
		return $this->jsVars;
	}

	public function updateUserSession() {
		$id = $this->ci->session->userdata('user_id');
		if(!$id)
			return false;
		$this->ci->load->model('user_model');
		$user = $this->ci->user_model->getUser($id);
		if($user)
			$this->ci->session->set_userdata(array('user' => $user));
		else
			return false;
	}
}

/* End of file HybridAuthLib.php */
/* Location: ./application/libraries/HybridAuthLib.php */