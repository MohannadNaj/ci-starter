<?php

$ci->load->library('app');
$ci->app->setJs('bio_max_length', $ci->config->item('bio_max_length','app'));

    if($identity_column!=='email')
    {
    	$ci->form_validation->set_rules(array(
            array(
            	'field' => 'identity',
            	'label' => $ci->lang->line('create_user_validation_identity_label'),
            	'rules' => 'required|is_unique['.$tables['users'].'.'.$identity_column.']'
            	),
            array(
            	'field' => 'email',
            	'label' => $ci->lang->line('create_user_validation_email_label'),
            	'rules' => 'required|valid_email'
            	)
        ));
    }
    else
    {
    	$ci->form_validation->set_rules(array(
            array(
            	'field' => 'email',
            	'label' => $ci->lang->line('create_user_validation_email_label'),
            	'rules' => 'required|valid_email|is_unique[' . $tables['users'] . '.email]'
            	)
        ));
    }

return array(
	    array(
	    	'field' => 'first_name',
	    	'label' => $ci->lang->line('create_user_validation_fname_label'),
	    	'rules' => 'required'
	    	),

	    array(
	    	'field' => 'last_name',
	    	'label' => $ci->lang->line('create_user_validation_lname_label'),
	    	'rules' => 'required'
	    	),
	            array(
	    	'field' => 'phone',
	    	'label' => $ci->lang->line('create_user_validation_phone_label'),
	    	'rules' => 'trim'
	    	),
				 
	    array(
	    	'field' => 'company',
	    	'label' => $ci->lang->line('create_user_validation_company_label'),
	    	'rules' => 'trim'
	    	),
		$this->with(
			array('pass_lang_file' => 'create_user_validation_password_label',
				'pass_match' => 'password_confirm',
				'pass_field' => 'password'
				)
			)->shared('password'),
	    array(
	    	'field' => 'password_confirm',
	    	'label' => $ci->lang->line('create_user_validation_password_confirm_label'),
	    	'rules' => 'required'
	    	),

		array(
			'field' => 'bio',
			'label' => 'Bio',
			'rules' => 'max_length['. $ci->config->item('bio_max_length','app') .']'
			)

	);