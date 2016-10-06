<div class="row">
  <div class="col-sm-4 col-sm-push-2">
    
<div class="panel panel-default">
  <div class="panel-heading">
<h1><?php echo lang('forgot_password_heading');?></h1>
<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
  </div>
  <div class="panel-body">

<div id="infoMessage" class="alert alert-info <?=($message) ? '': 'hidden'?>"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <div class="form-group">
      	<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label>
            <input type="text" class="form-control" id="identity" name="identity">
      </div>

      <button type="submit" class="btn btn-primary"><?=lang('forgot_password_submit_btn')?></button>
<?php echo form_close();?>
  </div>
</div>
  </div>
</div>
