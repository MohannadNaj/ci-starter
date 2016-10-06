<div class="row">
  <div class="col-sm-4 col-sm-push-2">
    
<div class="panel panel-default">
  <div class="panel-heading">
  <h1><?php echo lang('login_heading');?></h1>
  <p><?php echo lang('login_subheading');?></p>
  </div>
  <div class="panel-body">

<div id="infoMessage" class="alert alert-warning <?=($message) ? '': 'hidden'?>"><?php echo $message;?></div>

<?php echo form_open("auth/login");?>

  <div class="form-group">
    <label for="identity"><?php echo lang('login_identity_label');?></label>
    <input type="text" class="form-control" name="identity" id="identity" placeholder="<?php echo lang('login_identity_label');?>" value="<?=$this->form_validation->set_value('identity')?>">
  </div>

    <div class="form-group">
    <label for="password"><?php echo lang('login_password_label');?></label>
    <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo lang('login_password_label');?>">
  </div>
  
  <div class="form-group">
    <label for="remember"><?php echo lang('login_remember_label');?></label>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="remember" value="1" id="remember" checked="checked">
        <?=lang('login_remember_label')?>
      </label>
    </div>
  </div>

<button type="submit" class="btn btn-primary"><?=lang('login_submit_btn')?></button>

<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
  </div>
</div>
  </div>
</div>