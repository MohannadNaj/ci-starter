<?php
return array(
		array(
		'field' => 'identity',
		'label' => $ci->lang->line( $ci->config->item('identity', 'ion_auth') != 'email' ? 'forgot_password_identity_label' : 'forgot_password_validation_email_label' ),
		'rules' => $ci->config->item('identity', 'ion_auth') != 'email' ? 'required' : 'required|valid_email',
		)
	);