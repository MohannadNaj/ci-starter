<? $photoURL = $this->session->userdata('user')['photoURL'];
?>
        <li class="dropdown">
        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="<?=$photoURL ? $photoURL : base_url('uploads/default.png')?>" class="thumb-img img-circle img-responsive">
              <span class="hidden-xs"><?=substr($this->session->userdata('identity'), 0, 15)?><?=(strlen($this->session->userdata('identity')) > 15) ? '...': ''?></span>
            </a>
            <ul class="profile-dropdown dropdown-menu full-width" >
            <?if($this->ion_auth->is_admin()):?>
            	<li>
		          	<a href="<?=base_url("/admin/")?>" class="btn btn-default btn-md">
	            		<i class="fa fa-tachometer"></i>
						Dashboard
	          		</a>
            	</li>
        	<?endif?>
            	<li>
		          	<a href="<?=base_url("/u/" . $this->session->userdata('identity'))?>" class="btn btn-default btn-md">
	            		<i class="glyphicon glyphicon-user"></i>
						Profile
	          		</a>
            	</li>
            	<li>
		          	<a href="<?=base_url("/settings/")?>" class="btn btn-default btn-md">
	            		<i class="glyphicon glyphicon-cog"></i>
						Settings
	          		</a>
            	</li>
            	<li>
		          	<a href="<?=base_url("/auth/logout/")?>" class="btn btn-danger btn-md">
		          		<i class="fa fa-sign-out"></i>
						Log out
	          		</a>
	        	</li>
            </ul>
    	</li>
