<?php

return array(
		        array(
		                'field' => 'identity',
		                'label' => str_replace(':', '', $ci->lang->line('login_identity_label')),
		                'rules' => 'required'
		        ),
		        array(
		                'field' => 'password',
		                'label' => str_replace(':', '', $ci->lang->line('login_password_label')),
		                'rules' => 'required',
		        )
		);