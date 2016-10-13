<?php
isset($pass_field) or $pass_field = "password";
isset($pass_lang_file) or $pass_lang_file = "create_user_validation_password_label";

$arr = [
        array(
	    	'field' => $pass_field,
	    	'label' => $ci->lang->line($pass_lang_file),
	    	'rules' => 'required|min_length[' . $ci->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $ci->config->item('max_password_length', 'ion_auth') . ']'. (isset($pass_match) ? '|matches[' . $pass_match . ']' : '')
        )
    ];

return $arr;