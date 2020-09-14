<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
$this->load->view('admin/elements/section_header_view');
?>
<?=content_open($page_name,$this)?>
	<?php 
		echo form_open();
		echo form_hidden('user_id',$user->id);
	?>
	<div class='box-body'>
		  <div class="row">
		    <div class="col-lg-4">
		      <?php echo form_open('',array('class'=>'form-horizontal'));?>
		        <div class="form-group">
		          <?php
		          echo form_label('First name','first_name');
		          echo form_error('first_name');
		          echo form_input('first_name',set_value('first_name',$user->first_name),'class="form-control"');
		          ?>
		        </div>
		        <div class="form-group">
		          <?php
		          echo form_label('Last name','last_name');
		          echo form_error('last_name');
		          echo form_input('last_name',set_value('last_name',$user->last_name),'class="form-control"');
		          ?>
		        </div>
		        <div class="form-group">
		          <?php
		          echo form_label('Company','company');
		          echo form_error('company');
		          echo form_input('company',set_value('company',$user->company),'class="form-control"');
		          ?>
		        </div>
		        <div class="form-group">
		          <?php
		          echo form_label('Phone','phone');
		          echo form_error('phone');
		          echo form_input('phone',set_value('phone',$user->phone),'class="form-control"');
		          ?>
		        </div>
		        <div class="form-group">
		          <?php
		          echo form_label('Username','username');
		          echo form_error('username');
		          echo form_input('username',set_value('username',$user->username),'class="form-control"');
		          ?>
		        </div>
		        <div class="form-group">
		          <?php
		          echo form_label('Email','email');
		          echo form_error('email');
		          echo form_input('email',set_value('email',$user->email),'class="form-control"');
		          ?>
		        </div>
		        <div class="form-group">
		          <?php
		          echo form_label('Change password','password');
		          echo form_error('password');
		          echo form_password('password','','class="form-control"');
		          ?>
		        </div>
		        <div class="form-group">
		          <?php
		          echo form_label('Confirm changed password','password_confirm');
		          echo form_error('password_confirm');
		          echo form_password('password_confirm','','class="form-control"');
		          ?>
		        </div>
		    </div>
			<div class="col-lg-4">
		        <div class="form-group">
		          <?php
		          if(isset($groups))
		          {
		            echo form_label('Groups','groups[]');
		            foreach($groups as $group)
		            {
		              echo '<div class="checkbox">';
		              echo '<label>';
		              echo form_checkbox('groups[]', $group->id, set_checkbox('groups[]', $group->id, in_array($group->id,$usergroups)));
		              echo ' '.$group->name;
		              echo '</label>';
		              echo '</div>';
		            }
		          }
		          ?>
		        </div>
		        <?php echo form_hidden('user_id',$user->id);?>
		        <?php echo form_submit('submit', 'Edit user', 'class="btn btn-primary btn-lg btn-block"');?>
		      <?php echo form_close();?>
		    </div>
		</div>
	</div>
	<?php echo form_close();?>
<?=content_close()?>