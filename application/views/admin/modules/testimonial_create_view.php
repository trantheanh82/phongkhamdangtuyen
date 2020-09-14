<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
	<div class="col-sm-3 col-md-3">
		<?php $this->load->view('admin/elements/left_menu_view');?>
	</div>
	<div class="col-right col-sm-9 col-md-9">
		<h3 class="text-capitalize"><?php echo $page_name ?></h3>
		<!-- Languages Selection -->
		<?php
			$this->load->view('admin/elements/language_selection_view');
		?>
		<!-- End Language Selection -->
		
		<form class="form-horizontal" action="<?=site_url('admin/modules/testimonials/create')?>" method="post" id='main_form_submit'>
			<div class='form-group'>
	            <label class='control-label col-sm-2' for='active'>Active</label>
	            <div class='col-sm-9'>

	            <?php 
		            echo "<input name='active'  id='active' type='hidden'  value='N'/>";
		     	 		echo form_checkbox('active','Y','checked');

	            ?>
	            </div>
            </div>
            
			 <div class="form-group">
				 <label class="control-label col-sm-2" for="pwd">Customer name	</label>
				 <div class='col-sm-9'>
					<?php
						 echo form_input('name',set_value('name'),'class="form-control"');
					?>
				 </div>
            </div>
            
            <div class='form-group'>
	            <label class="control-label col-sm-2" for="pwd">Description</label>
				 <div class='col-sm-9'>
					<textarea class="form-control" id="description" name="description"></textarea>
				 </div>
            </div>
            
              <div class='form-group'>
	            <label class="control-label col-sm-2" for="pwd">Sort</label>
				 <div class='col-sm-9'>
					<?php
						 echo form_input('sort','5','class="form-control" style="width:10%"');
					?>
				 </div>
            </div>
            
            <div class="form-group">
	            <label class="control-label col-sm-2" for="pwd"></label>        
		      <div class="col-sm-9">
		        <button type="submit" class="btn btn-primary cmd-save">Save</button>
		      </div>
	    	</div>
		</form>
	</div>
</div>