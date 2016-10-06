<div class="row">
  <div class="col-sm-4 col-sm-push-2">
    
<div class="panel panel-default">
  <div class="panel-heading">
<h1><?php echo lang('create_group_heading');?></h1>
<p><?php echo lang('create_group_subheading');?></p>
  </div>
  <div class="panel-body">

<div id="infoMessage" class="alert alert-warning <?=($message) ? '': 'hidden'?>"><?php echo $message;?></div>

<?php echo form_open("auth/create_group");?>

  <div class="form-group">
    <label for="group_name"><?php echo lang('create_group_name_label');?></label>
    <input type="text" class="form-control" name="group_name" id="group_name" placeholder="<?php echo lang('create_group_name_label');?>" value="<?=$this->form_validation->set_value('group_name')?>">
  </div>

  <div class="form-group">
    <label for="description"><?php echo lang('create_group_desc_label');?></label>
    <input type="text" class="form-control" name="description" id="description" placeholder="<?php echo lang('create_group_desc_label');?>" value="<?=$this->form_validation->set_value('description')?>">
  </div>

  <button type="submit" class="btn btn-primary"><?=lang('create_group_submit_btn')?></button>

<?php echo form_close();?>
  </div>
</div>
  </div>
</div>