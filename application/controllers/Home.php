<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends My_Controller {
	protected $layout = "layout";

	function __construct()
	{
		parent::__construct();
		$this->data['providers'] = $this->hybridauthlib->getProviders();
	}
	public function index()
	{
		$this->data['main_content'] = "home";
	}

	public function test()
	{
		$this->view = FALSE;
		print_r($this->session->userdata());
	}
}
