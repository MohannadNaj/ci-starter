<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends My_Model
{
    public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );
	public $data = array();
	public $has_many = array('social_profile');
	public $fields = ['id', 'username', 'is_password_by_social', 'email', 'created_on', 'last_login', 'active', 'first_name', 'last_name', 'company', 'phone', 'photoURL'];

	public function getUser($id = null) {
		if(empty($id)) return false;
		
		$result = (array) $this->with('social_profile')->get($id);
		return empty($result) ? false : $result;
	}

	public function getUserByUserName($username = null) {
		if(empty($username)) return false;
		
		$result = (array) $this->with('social_profile')->get_by('username', $username);

		return empty($result) ? false : $result;
	}
}