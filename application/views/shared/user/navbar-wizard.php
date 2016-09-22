        <li>
        	<p class="navbar-text">Hi, <?=$this->session->userdata('logged_in')?></p>
    	</li>
        <li>
          <a href="<?=url("/auth/logout/")?>" class="btn btn-danger">Log out</a>
        </li>
