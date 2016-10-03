<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	protected $layout = "layout";

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function profile($identity)
	{
		$this->data['user'] = $this->user_model->getUserByUserName($identity);
	}

}