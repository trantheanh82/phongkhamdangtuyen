<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admin/elements/section_header_view');
?>
<?=content_open($page_name,$this)?>
<?=form_open('',array('class'=>'form-horizontal'));?>
	<div class="box-body">
		<div class="col-xs-12 col-sm-6 col-md-6 col-md-6">
		      <div class='form-group'>
					<label for='first_name'><?=__("First name",$this)?></label>
					<?php echo form_error('first_name');?>
			        <input name="first_name" value="<?=isset($data->first_name)?$data->name:""?>" type="text" class="form-control" id="first_name" placeholder="<?=__("First name",$this)?>">
			        
			  </div>
			  
			  <div class='form-group'>
					<label for='last_name'><?=__("Last name",$this)?></label>
					<?php echo form_error('last_name');?>
			        <input name="last_name" value="<?=isset($data->last_name)?$data->name:""?>" type="text" class="form-control" id="last_name" placeholder="<?=__("Last name",$this)?>">
			        
			  </div>
			  
			  <div class='form-group'>
					<label for='phone'><?=__("Phone",$this)?></label>
					<?php echo form_error('phone');?>
			        <input name="phone" value="<?=isset($data->phone)?$data->phone:""?>" type="text" class="form-control" id="phone" placeholder="<?=__("Phone",$this)?>">
			  </div>
			  <div class='form-group'>
					<label for='username'><?=__("Username",$this)?></label>
					<?php echo form_error('username');?>
			        <input name="username" value="<?=isset($data->username)?$data->username:""?>" type="text" class="form-control" id="username" placeholder="<?=__("Username",$this)?>">
			  </div>
		     
			  <div class='form-group'>
					<label for='email'><?=__("Email",$this)?></label>
					<?php echo form_error('email');?>
			        <input name="email" value="<?=isset($data->email)?$data->email:""?>" type="text" class="form-control" id="email" placeholder="<?=__("Email",$this)?>">
			  </div>
			  
			  <div class='form-group'>
					<label for='password'><?=__("Password",$this)?></label>
					<?php echo form_error('password');?>
			        <input type="password" name="password" value="" type="text" class="form-control" id="password">
			  </div>
			  
			  <div class='form-group'>
					<label for='password_confirm'><?=__("Confirm assword",$this)?></label>
					<?php echo form_error('password_confirm');?>
			        <input type="password" name="password_confirm" value="" type="text" class="form-control" id="password_confirm">
			  </div>
		      <!-- checkbox -->
              <div class="form-group">
                <label><?=__('Location',$this)?></label>
                <select class="form-control select2" id='location'>
	                <option value=""><?=__('Choose a location',$this)?></option>
                 	<option value="hcm" <?php if($data->location == 'hcm') echo 'selected';?>>Hồ Chí Minh</option>
                 	<option value="hn" <?php if($data->location == 'hn') echo 'selected';?>>Hà Nội</option>
                </select>
              </div>
		      <div class="form-group">
		        <?php
		        if(isset($groups))
		        {
		          echo form_label('Groups','groups[]');
		          foreach($groups as $group)
		          {
		            echo '<div class="checkbox">';
		            echo '<label>';
		            echo form_checkbox('groups[]', $group->id, set_checkbox('groups[]', $group->id));
		            echo ' '.$group->name;
		            echo '</label>';
		            echo '</div>';
		          }
		        }
		        ?>
		      </div>
			  <?php echo form_submit('submit', 'Create user', 'class="btn btn-primary btn-lg btn-block"');?>
				     
		</div>
	</div>
  <?=form_close();?>
<?=content_close()?>