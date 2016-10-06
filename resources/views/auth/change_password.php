<div class="row">
  <div class="col-sm-4 col-sm-push-2">
    
<div class="panel panel-default">
  <div class="panel-heading">
<h1><?php echo lang('change_password_heading');?></h1>
  </div>
  <div class="panel-body">

<div id="infoMessage" class="alert alert-info <?=($message) ? '': 'hidden'?>"><?php echo $message;?></div>

<?php echo form_open("auth/change_password");?>
      
      <div class="form-group">
            <label for="old_password"><?=lang('change_password_old_password_label')?></label>
            <input type="password" class="form-control" id="old" name="old" placeholder="<?=lang('change_password_old_password_label')?>">
      </div>

      <div class="form-group">
            <label for="new"><?=sprintf(lang('change_password_new_password_label'), $min_password_length);?></label>
            <input type="password" class="form-control" id="new" name="new" placeholder="<?=sprintf(lang('change_password_new_password_label'), $min_password_length);?>">
      </div>

      <div class="form-group">
            <label for="new_confirm"><?=lang('change_password_new_password_confirm_label');?></label>
            <input type="password" class="form-control" id="new_confirm" name="new_confirm" placeholder="<?=lang('change_password_new_password_confirm_label')?>" pattern="^.{<?=$min_password_length?>}.*$">
      </div>
      <input type="hidden" name="user_id" value="<?=$this->session->userdata('user_id');?>" id="user_id">
      <button type="submit" class="btn btn-primary"><?=lang('change_password_submit_btn')?></button>
<?php echo form_close();?>
  </div>
</div>
  </div>
</div>
