<div class="row">
  <div class="col-sm-4 col-sm-push-2">
<div class="panel panel-default">
  <div class="panel-heading">
<h1><?php echo lang('deactivate_heading');?></h1>
<p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>
  </div>
  <div class="panel-body">


<?php echo form_open("auth/deactivate/".$user->id);?>

	<div class="form-group">
	    <div class="radio">
	    	<label>
	    		<input class="" type="radio" name="confirm" value="yes" checked="checked" />
	    		<?=lang('deactivate_confirm_y_label');?>
	    	</label>
	    </div>
	    <div class="radio">
	    	<label>
	    		<input class="" type="radio" name="confirm" value="no" />
	    		<?=lang('deactivate_confirm_n_label');?>
	    	</label>
	    </div>
	</div>

      <input type="hidden" name="id" value="<?=$user->id;?>" id="id">
      <button type="submit" class="btn btn-primary"><?=lang('deactivate_submit_btn')?></button>
	<?php echo form_close();?>
  </div>
</div>
  </div>
</div>
