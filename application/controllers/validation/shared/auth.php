<?php
isset($pass_field) or $pass_field = "password";
isset($pass_lang_file) or $pass_lang_file = "create_user_validation_password_label";

isset($first_name_label) or $first_name_label = "";
isset($last_name_label) or $last_name_label = "";
isset($phone_label) or $phone_label = "";
isset($company_label) or $company_label = "";
isset($bio_label) or $bio_label = "";

$arr = [
        array(
	    	'field' => $pass_field,
	    	'label' => $ci->lang->line($pass_lang_file),
	    	'rules' => 'required|min_length[' . $ci->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $ci->config->item('max_password_length', 'ion_auth') . ']'. (isset($pass_match) ? '|matches[' . $pass_match . ']' : '')
        ),

		array(
			'field' => 'first_name',
			'label' => $first_name_label,
			'rules' => 'required|trim'
			),
		array(
			'field' => 'last_name',
			'label' => $last_name_label,
			'rules' => 'required|trim'
			),
		array(
			'field' => 'phone',
			'label' => $phone_label,
			'rules' => 'required|trim'
			),
		array(
			'field' => 'company',
			'label' => $company_label,
			'rules' => 'required|trim'
			),
		array(
			'field' => 'bio',
			'label' => $bio_label,
			'rules' => 'max_length['. $ci->config->item('bio_max_length','app') .']'
			)
    ];

return $arr;