<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends My_Model
{
    public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );
	public $data = array();
	public $has_many = array('social_profile');

}