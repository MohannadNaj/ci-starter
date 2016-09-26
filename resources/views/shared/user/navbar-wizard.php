        <li>
        	<p class="navbar-text">Hi, <?=$this->session->userdata('identity')?></p>
    	</li>
        <li>
          <a href="<?=base_url("/auth/logout/")?>" class="btn btn-danger btn-sm"><i class="fa fa-sign-out"></i></a>
        </li>
