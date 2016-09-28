<?php

class MY_Loader extends CI_Loader {

    public function __construct() {
        $this->_ci_view_paths = array(
            VIEWSDIR => TRUE
        );
        parent::__construct();
    }

}