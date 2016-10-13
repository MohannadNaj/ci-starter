<?php

$ci->load->library('app');
$ci->app->setJs('bio_max_length', $ci->config->item('bio_max_length','app'));

if ($ci->input->post('password'))
{
	$ci->form_validation->set_rules(array(
		$this->with([
			'pass_lang_file'=> 'edit_user_validation_password_label',
			'pass_match' => 'password_confirm',
			'pass_field' => 'password'
			])->shared('password')
		,
		array(
			'field' => 'password_confirm',
			'label' => $ci->lang->line('edit_user_validation_password_confirm_label'),
			'rules' => 'required'
			)
	));
}

return array(
		array(
			'field' => 'first_name',
			'label' => $ci->lang->line('edit_user_validation_fname_label'),
			'rules' => 'required'
			),
		array(
			'field' => 'last_name',
			'label' => $ci->lang->line('edit_user_validation_lname_label'),
			'rules' => 'required'
			),
		array(
			'field' => 'phone',
			'label' => $ci->lang->line('edit_user_validation_phone_label'),
			'rules' => 'required'
			),
		array(
			'field' => 'company',
			'label' => $ci->lang->line('edit_user_validation_company_label'),
			'rules' => 'required'
			),
		array(
			'field' => 'bio',
			'label' => 'Bio',
			'rules' => 'max_length['. $ci->config->item('bio_max_length','app') .']'
			)
	);