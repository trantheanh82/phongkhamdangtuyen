<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	$this->load->view('admin/elements/section_header_view');
?>
	<!-- Main Content -->
	<?=content_open($page_name,$this)?>

	<form class="form-horizontal" role="form" action="<?=site_url('admin/stores/create')?>" method="post" id='main_form_submit'>
	<div class='box-body'>
		            <div class='form-group'>
			            <label class='control-label col-sm-2' for='active'><?=__('Active',$this)?></label>
			            <div class='col-sm-9'>
		
			            <?php 
				            echo "<input name='active'  id='active' type='hidden'  value='N'/>";
				     	 		echo form_checkbox('active','Y','checked');
		
			            ?>
			            </div>
		            </div>
		            
		            <div class="form-group">
						 <label class="control-label col-sm-2" for="name"><?=__('Name',$this)?></label>
						 <div class='col-sm-9'>
							<?php
								 echo form_input('name',set_value('name'),'class="form-control make_slug"');
								 echo form_error('name');
								 
							?>
						 </div>
		            </div>
		            
		            <div class="form-group">
						 <label class="control-label col-sm-2" for="pwd"><?=__('Slug',$this)?></label>
						 <div class='col-sm-9'>
							<?php
								 echo form_input('slug',set_value('slug'),'class="form-control" id="slug"');
							?>
						 </div>
		            </div>
		            
		            <div class='form-group'>
			            <label class="control-label col-sm-2" for="pwd"><?=__('Address',$this)?></label>
						 <div class='col-sm-9 col-md-10'>
							<textarea class="form-control" id="address" name="address"></textarea>
						 </div>
		            </div>
		            
		            <div class="form-group">
						 <label class="control-label col-sm-2" for="pwd"><?=__('Phone',$this)?></label>
						 <div class='col-sm-9'>
							<?php
								 echo form_input('phone',set_value('phone'),'class="form-control"');
								 echo form_error('phone');

							?>
						 </div>
		            </div>
		
	</div><!-- ./end box-body -->
	<?php
	/*
		./end-box
		*/
	$this->load->view('admin/elements/ui/box_content/box_footer',array('command_tools'=>array('save','cancel')));
?>	
	</form>
	<?=content_close()?>