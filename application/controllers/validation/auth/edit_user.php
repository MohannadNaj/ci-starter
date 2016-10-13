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
		$this->required_field('password_confirm', $ci->lang->line('edit_user_validation_password_confirm_label'))
	));
}

return array(
		$this->with(
			[
			'first_name_label' => $ci->lang->line('edit_user_validation_fname_label'),
			'last_name_label' => $ci->lang->line('edit_user_validation_lname_label'),
			'phone_label' => $ci->lang->line('edit_user_validation_phone_label'),
			'company_label' => $ci->lang->line('edit_user_validation_company_label'),
			'bio_label' => $ci->lang->line('edit_user_validation_bio_label'),
			])->shared(
			'first_name', 'last_name', 'phone', 'company', 'bio', 0
			)
	);