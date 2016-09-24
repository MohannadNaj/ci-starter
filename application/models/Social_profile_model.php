<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Social_profile_model extends My_Model
{
    public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );
	public $data = array();
	public $fields = [
		'social_provider' => ['type' => 'varchar', 'length' =>	40],
		'identifier' => ['type' => 'varchar', 'length' =>	40],
		'profileURL' => ['type' => 'varchar', 'length' =>	255],
		'webSiteURL' => ['type' => 'varchar', 'length' =>	255],
		'photoURL' => ['type' => 'varchar', 'length' =>	255],
		'displayName' => ['type' => 'varchar', 'length' =>	40],
		'description' => ['type' => 'varchar', 'length' =>	255],
		'firstName' => ['type' => 'varchar', 'length' =>	40],
		'lastName' => ['type' => 'varchar', 'length' =>	40],
		'gender' => ['type' => 'varchar', 'length' =>	15],
		'language' => ['type' => 'varchar', 'length' =>	15],
		'age' => ['type' => 'int', 'length' =>	11],
		'birthDay' => ['type' => 'int', 'length' =>	11],
		'birthMonth' => ['type' => 'int', 'length' =>	11],
		'birthYear' => ['type' => 'int', 'length' =>	11],
		'email' => ['type' => 'varchar', 'length' =>	70],
		'emailVerified' => ['type' => 'varchar', 'length' =>	70],
		'phone' => ['type' => 'varchar', 'length' =>	30],
		'address' => ['type' => 'varchar', 'length' =>	100],
		'country' => ['type' => 'varchar', 'length' =>	35],
		'region' => ['type' => 'varchar', 'length' =>	35],
		'city' => ['type' => 'varchar', 'length' =>	35],
		'zip' => ['type' => 'int', 'length' =>	11],
		'token' => ['type' => 'text', 'length' => null ],
		'secret_token' => ['type' => 'text', 'length' =>	null ]
];
	public function mapHybridAuth($profile) {
		if(empty($profile['identifier'])) 
			return false;

		$fields = array_keys($this->fields);
		foreach ($profile as $key => $value) {
			if(in_array($key, $fields)) {
				$value = $this->getValue($key, $value);
				if($value['success'])
					$this->data[$key] = $value['strict_val'];
				else
					return false;
			}
		}
		return true;
	}

	public function getValue($key, $value) {
		$length = empty($this->fields[$key]['length']) ? strlen($value) : $this->fields[$key]['length'] ;
		$strict_val = (empty($value) ? null : substr($value, 0, $length ));
		$result = true;
		if($this->fields[$key]['type'] == "int") {
			$result = empty($value) ? true : is_int($value);
		}
		return ['success' => $result, 'strict_val' => $strict_val];
	}

	public function isFirstTime()
	{
		$user = $this->get_by(array('identifier'=> $this->data['identifier'], 'social_provider' => $this->data['social_provider']));
		if($user) {
			$this->data['id'] = $user->id;
			return false;
		}
		else
			return true;
	}

	public function save()
	{
		if($this->isFirstTime()) {
			if($this->insert($this->data))
				return true;
		} else {
			if($this->update($this->data['id'], $this->data))
				return true;
		}
		return false;
	}
}