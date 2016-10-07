<?php
return array(
        array(
                'field' => 'confirm',
                'label' => $ci->lang->line('deactivate_validation_confirm_label'),
                'rules' => 'required'
        ),
        array(
                'field' => 'id',
                'label' => $ci->lang->line('deactivate_validation_user_id_label'),
                'rules' => 'required|alpha_numeric'
        )
    );