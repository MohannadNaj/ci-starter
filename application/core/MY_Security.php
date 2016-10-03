<?php
class MY_Security extends CI_Security{

	public function csrf_verify()
	{
		$headers = getallheaders();
		if(isset($headers[$this->_csrf_token_name])) {
			$_POST[$this->_csrf_token_name] = $headers[$this->_csrf_token_name];
		}
		parent::csrf_verify();
	}
}