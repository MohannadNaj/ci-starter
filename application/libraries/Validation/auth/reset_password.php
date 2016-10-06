<?php
return array(
        array(
                'field' => 'new',
                'label' => $ci->lang->line('reset_password_validation_new_password_label'),
                'rules' => 'required|min_length[' . $ci->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $ci->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]'
        ),
        array(
                'field' => 'new_confirm',
                'label' => $ci->lang->line('reset_password_validation_new_password_confirm_label'),
                'rules' => 'required'
        )
    );