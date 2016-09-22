        <li>
        	<p class="navbar-text">Hi, <?=$this->session->userdata('identity')?></p>
    	</li>
        <li>
          <a href="<?=base_url("/auth/logout/")?>" class="btn btn-danger">Log out</a>
        </li>
