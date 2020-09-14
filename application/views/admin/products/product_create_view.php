<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	//Flash Message View
	$this->load->view('admin/elements/flash_message_view');
	
	$this->load->view('admin/elements/section_header_view');
	
?>

	<!-- Main Content -->
	<?=content_open($page_name,$this)?>
	
	<form class="form-horizontal" role="form" action="<?=site_url('admin/products/submit')?>" method="post" id='main_form_submit'>
<div class='box-body'>
		<div class='form-group'>
	            <label class='control-label col-sm-2' for='active'><?=__('Active',$this)?></label>
	            <div class='col-sm-9'>

	            <?php 
		            echo "<input name='active'  id='active' type='hidden'  value='N'/>";
		     	 		echo form_checkbox('active','Y','checked');
		     	 		echo form_hidden('has_many','image');

	            ?>
	            </div>
            </div>
            
            <div class='form-group'>
	            <label class="control-label col-sm-2" for="pwd"><?=__('Image',$this)?></label>
				 <div class='col-sm-9'>
					<p style="padding-bottom:10px;" id='product'><img src='' /></p>
		     	 	<?php	
		    			$this->load->view('admin/elements/fileupload_view.php',array('file'=>'product_image','id'=>'product_image','value'=>'','type_file'=>'product','multiple'=>true,'current_lang'=>$current_lang['slug']));
		    		?>
		    		
		    		
				 </div>
            </div> 
            
            <div class="form-group">
				 <label class="control-label col-sm-2" for="pwd"><?=__('Name',$this)?></label>
				 <div class='col-sm-9'>
					<?php
						 echo form_input('name',set_value('name'),'class="form-control make_slug"');
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
            
            <div class="form-group">
				 <label class="control-label col-sm-2" for="pwd"><?=__('Price',$this)?></label>
				 <div class='col-sm-9'>
					<?php
						 echo form_input('price',set_value('price'),'class="form-control"');
					?>
				 </div>
            </div>
            
            <div class='form-group'>
	            <label class="control-label col-sm-2" for="pwd"><?=__('Description',$this)?></label>
				 <div class='col-sm-9 col-md-9'>
					<textarea class="form-control product-editor" id="editor1" name="description"></textarea>
				 </div>
            </div>
            
            <div class="form-group">
				 <label class="control-label col-sm-2" for="pwd"><?=__('Province',$this)?></label>
				 <div class='col-sm-9'>
					<?php
						 echo form_dropdown('province_id',$list_province,'','class="form-control"');
					?>
				 </div>
            </div>
            
            <div class="form-group">
				 <label class="control-label col-sm-2" for="pwd"><?=__('District',$this)?></label>
				 <div class='col-sm-9'>
					<?php
						 echo form_dropdown('district_id',$list_district,'','class="form-control"');
					?>
				 </div>
            </div>
            
             <div class="form-group">
				 <label class="control-label col-sm-2" for="pwd"><?=__('Ward',$this)?></label>
				 <div class='col-sm-9'>
					<?php
						 echo form_dropdown('ward_id',$list_ward,'','class="form-control"');
					?>
				 </div>
            </div>
            
	          <div class='form-group'>
	            <label class="control-label col-sm-2" for="pwd">Sort</label>
				 <div class='col-sm-9'>
					<?php
						 echo form_input('sort','10','class="form-control" style="width:10%"');
						// echo form_hidden('position','main_top_banner');
					?>
				 </div>
            </div>
            
            <div class="form-group">
					 <label class="control-label col-sm-2" for="pwd"><?=__("Page title",$this)?></label>
					 <div class='col-sm-9'>
						<textarea class="form-control" id="page_title" name="page_title"></textarea>
					 </div>
	            </div>
	        <div class="form-group">
					 <label class="control-label col-sm-2" for="pwd"><?=__("Page Description",$this)?></label>
					 <div class='col-sm-9'>
						<textarea class="form-control" id="page_title" name="page_description"></textarea>
					 </div>
	            </div>
            
	</div>
	<?php
	/*
		./end-box
		*/
	$this->load->view('admin/elements/ui/box_content/box_footer',array('command_tools'=>array('save','cancel')));
?>

		</form>
	<?=content_close()?>