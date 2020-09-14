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
		
		<form class="form-horizontal" action="<?=site_url('admin/modules/videos/create')?>" method="post" id='main_form_submit'>
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
					 <label class="control-label col-sm-2" for="pwd">Name	</label>
					 <div class='col-sm-9'>
						<?php
							echo form_input('name','','class="form-control"');
						?>
					 </div>
	        </div>
	        
	        <div class='form-group'>
	            <label class="control-label col-sm-2">Thumbnail (1280x720)</label>
				 <div class='col-sm-9'>
					 <?php
						 	if(!empty($item->thumbnail)):
						 ?>
						 <p style="padding-bottom:10px;">
						 <img src='<?=base_url()?>assets/upload/video/thumbnail/<?=$item->thumbnail?>' />
						</p>
					<?php
							endif;
						?>
		     	 	<?php	
		    			$this->load->view('admin/elements/fileupload_view.php',array('file'=>'thumbnail','id'=>'Video_thumbnail','value'=>'','type_file'=>'images','multiple'=>false,'acceptFileType'=>"/(\.|\/)(gif|jpe?g|png)$/i"));
		    		?>
				 </div>
	        </div>
    
			<?php
				if(!empty($item)):	
			?>
			
			<div class='form-group'>
	            <label class="control-label col-sm-2">Video File</label>
				 <div class='col-sm-9'></div>
            </div>
            <?php
	        	endif;
	        ?>
			 <div class='form-group'>
	            <label class="control-label col-sm-2" for="pwd">Upload Video:</label>
				 <div class='col-sm-9'>
					<p style="padding-bottom:10px;"></p>
		     	 	<?php
		    			$this->load->view('admin/elements/fileupload_view.php',array('file'=>'file','id'=>'Video_file','value'=>'','multiple'=>false,'acceptFileType'=>"/(\.|\/)(mp4)$/i",'type_file'=>'video'));
		    		?>
				 </div>
            </div>
            
            <div class='form-group'>
		            <label class="control-label col-sm-2" for="sort">Sort</label>
					<div class='col-sm-9'>
						<?php
							 echo form_input('sort',set_value('sort',5),'class="form-control" style="width:10%"');
						?>
					</div>
	            </div>
	            
	        <div class='form-group'>
		            <label class="control-label col-sm-2" for="description">Title</label>
					 <div class='col-sm-9'>
						<textarea class="form-control" id="description" name="description"></textarea>
					 </div>
	            </div>
	        
	        <div class='form-group'>
		            <label class="control-label col-sm-2" for="description">Description</label>
					 <div class='col-sm-9'>
						<textarea class="form-control" id="description" name="description"></textarea>
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