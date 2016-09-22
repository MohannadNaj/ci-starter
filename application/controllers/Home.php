<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends My_Controller {
	protected $layout = "layout";

	public function index()
	{
		$this->data['auth_view'] =  ($this->ion_auth->logged_in() ? "user" : "guest");
		$this->data['main_content'] = "home";
	}

	public function test()
	{
		$this->view = FALSE;
		print_r($this->session->userdata());
	}
}
