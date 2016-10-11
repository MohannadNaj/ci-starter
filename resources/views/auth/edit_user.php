<div class="row">
  <div class="col-sm-4 col-sm-push-2">
    
<div class="panel panel-default">
  <div class="panel-heading">
<h1><?php echo lang('edit_user_heading');?></h1>
<p><?php echo lang('edit_user_subheading');?></p>
  </div>
  <div class="panel-body">

<div id="infoMessage" class="alert alert-warning <?=($message) ? '': 'hidden'?>"><?php echo $message;?></div>

<?php echo form_open(uri_string());?>

  <div class="form-group">
    <label for="first_name"><?php echo lang('edit_user_fname_label');?></label>
    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="<?php echo lang('edit_user_fname_label');?>" value="<?=$this->form_validation->set_value('first_name', $user->first_name)?>">
  </div>

  <div class="form-group">
    <label for="last_name"><?php echo lang('edit_user_lname_label');?></label>
    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="<?php echo lang('edit_user_lname_label');?>" value="<?=$this->form_validation->set_value('last_name', $user->last_name)?>">
  </div>

  <div class="form-group">
    <label for="bio"><?php echo lang('create_user_bio_label');?></label>
    <textarea maxlength="250" class="form-control" rows="5" id="bio" name="bio"><?=$this->form_validation->set_value('bio', $user->bio)?></textarea>
    <h6 class="pull-right count_message"><?=$this->config->item('bio_max_length', 'app')?> <span class="counter"></span> remaining</h6>
  </div>

  <div class="form-group">
    <label for="company"><?php echo lang('edit_user_company_label');?></label>
    <input type="text" class="form-control" name="company" id="company" placeholder="<?php echo lang('edit_user_company_label');?>" value="<?=$this->form_validation->set_value('company', $user->company)?>">
  </div>

  <div class="form-group">
    <label for="phone"><?php echo lang('edit_user_phone_label');?></label>
    <input type="text" class="form-control" name="phone" id="phone" placeholder="<?php echo lang('edit_user_phone_label');?>" value="<?=$this->form_validation->set_value('phone', $user->phone)?>">
  </div>


  <div class="form-group">
    <label for="password"><?php echo lang('edit_user_password_label');?></label>
    <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo lang('edit_user_password_label');?>">
  </div>

  <div class="form-group">
    <label for="password_confirm"><?php echo lang('edit_user_password_confirm_label');?></label>
    <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="<?php echo lang('edit_user_password_confirm_label');?>">
  </div>

      <?php if ($this->ion_auth->is_admin()): ?>

          <h3><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
  <div class="checkbox">
              <label>
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
                <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
  </div>
          <?php endforeach?>

      <?php endif ?>

      <input type="hidden" name="id" value="<?=$user->id;?>" id="id">

      <button type="submit" class="btn btn-primary"><?=lang('edit_user_submit_btn')?></button>
<?php echo form_close();?>
  </div>
</div>
  </div>
</div>