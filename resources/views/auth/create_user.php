<div class="row">
  <div class="col-sm-4 col-sm-push-2">
    
<div class="panel panel-default">
  <div class="panel-heading">
<h1><?php echo lang('create_user_heading');?></h1>
<p><?php echo lang('create_user_subheading');?></p>
  </div>
  <div class="panel-body">

<div id="infoMessage" class="alert alert-warning <?=($message) ? '': 'hidden'?>"><?php echo $message;?></div>

<?php echo form_open("auth/create_user");?>

  <div class="form-group <?=form_error('first_name') ? 'has-error': '';?>"">
    <label for="first_name"><?php echo lang('create_user_fname_label');?></label>
    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="<?php echo lang('create_user_fname_label');?>" value="<?=$this->form_validation->set_value('first_name')?>">
  </div>

  <div class="form-group <?=form_error('last_name') ? 'has-error': '';?>"">
    <label for="last_name"><?php echo lang('create_user_lname_label');?></label>
    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="<?php echo lang('create_user_lname_label');?>" value="<?=$this->form_validation->set_value('last_name')?>">
  </div>
      
      <?php if($identity_column!=='email'): ?>
  <div class="form-group <?=form_error('identity') ? 'has-error': '';?>"">
    <label for="identity"><?php echo lang('create_user_identity_label');?></label>
    <input type="text" class="form-control" name="identity" id="identity" placeholder="<?php echo lang('create_user_identity_label');?>" value="<?=$this->form_validation->set_value('identity')?>">
  </div>
      <?endif;?>

  <div class="form-group <?=form_error('company') ? 'has-error': '';?>"">
    <label for="company"><?php echo lang('create_user_company_label');?></label>
    <input type="text" class="form-control" name="company" id="company" placeholder="<?php echo lang('create_user_company_label');?>" value="<?=$this->form_validation->set_value('company')?>">
  </div>

  <div class="form-group <?=form_error('email') ? 'has-error': '';?>"">
    <label for="email"><?php echo lang('create_user_email_label');?></label>
    <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo lang('create_user_email_label');?>" value="<?=$this->form_validation->set_value('email')?>">
  </div>

  <div class="form-group <?=form_error('phone') ? 'has-error': '';?>"">
    <label for="phone"><?php echo lang('create_user_phone_label');?></label>
    <input type="text" class="form-control" name="phone" id="phone" placeholder="<?php echo lang('create_user_phone_label');?>" value="<?=$this->form_validation->set_value('phone')?>">
  </div>

  <div class="form-group <?=form_error('password') ? 'has-error': '';?>"">
    <label for="password"><?php echo lang('create_user_password_label');?></label>
    <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo lang('create_user_password_label');?>">
  </div>

  <div class="form-group <?=form_error('password_confirm') ? 'has-error': '';?>"">
    <label for="password_confirm"><?php echo lang('create_user_password_confirm_label');?></label>
    <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="<?php echo lang('create_user_password_confirm_label');?>">
  </div>

        <button type="submit" class="btn btn-primary"><?=lang('create_user_submit_btn')?></button>
<?php echo form_close();?>
  </div>
</div>
  </div>
</div>