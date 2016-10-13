<?php
return array(
		array(
			'field' => 'old',
			'label'=> $ci->lang->line('change_password_validation_old_password_label'),
			'rules' => 'required'
		),
		$this->with([
			'pass_lang_file'=> 'change_password_validation_new_password_label',
			'pass_match' => 'new_confirm',
			'pass_field' => 'new'
			])->shared('new')
		,
		array(
			'field' => 'new_confirm',
			'label'=> $ci->lang->line('change_password_validation_new_password_confirm_label'),
			'rules' => 'required'
		)
	);