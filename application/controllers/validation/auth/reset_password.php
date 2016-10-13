<?php
return array(
        $this->with([
            'pass_lang_file'=> 'reset_password_validation_new_password_label',
            'pass_match' => 'new_confirm',
            'pass_field' => 'new'
            ])->shared('new')
        ,
        array(
                'field' => 'new_confirm',
                'label' => $ci->lang->line('reset_password_validation_new_password_confirm_label'),
                'rules' => 'required'
        )
    );