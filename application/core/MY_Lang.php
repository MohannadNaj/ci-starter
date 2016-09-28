<?php

class MY_Lang extends CI_Lang {

    public function __construct() {
        parent::__construct();
    }

	public function load($langfile, $idiom = '', $return = FALSE, $add_suffix = TRUE, $alt_path = '')
	{
		parent::load($langfile, $idiom, $return, $add_suffix, LANGDIR);
	}
}