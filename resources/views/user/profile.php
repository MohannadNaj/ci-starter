<? // TODO: display according to the profiler ?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
        	<div class="row">
        		<div class="col-sm-12">
        			<h3 class="pull-left"  style="margin-right: 2em;">@<?=$user['username']?></h3>
        			<h2 class="pull-left"><?=$user['first_name']?><?=$user['last_name']?></h2>
        		</div>
        	</div>
            <div class="row">
                <div class="col-sm-3">
                    <img src="<?=$user['photoURL'];?>" class="img-responsive img-responsive" style="max-width: 200px;">
                </div>
                <div class="col-sm-9">
                    
                </div>
            </div>
        </div>
    </div>
</div>
