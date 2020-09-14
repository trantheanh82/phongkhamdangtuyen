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
		
		<form class="form-horizontal" action="<?=site_url('admin/services/edit/'.$item->id)?>" method="post" id='main_form_submit'>
			<div class='form-group'>
	            <label class='control-label col-sm-2' for='active'>Active</label>
	            <div class='col-sm-9'>

	            <?php 
		            echo "<input name='active'  id='active' type='hidden'  value='N'/>";
	     	 		echo form_checkbox('active',$item->active,'checked');
	     	 		echo form_hidden('id',set_value('id',$item->id));
	            ?>
	            </div>
            </div>
            
			<div class="form-group">
				 <label class="control-label col-sm-2" for="pwd">Name</label>
				 <div class='col-sm-9'>
					<?php
						 echo form_input('name',set_value('name',$item->translations[0]->name),'class="form-control"');
					?>
				 </div>
            </div>
            
            
            <div class='form-group'>
	            <label class="control-label col-sm-2" for="pwd">Images</label>
				 <div class='col-sm-9'>
					<?php
						 if(isset($item->image)):
						 ?>
						 <p style="padding-bottom:10px;">
							 <img src="<?=base_url()?>assets/upload/img/thumbnail/<?=$item->image?>" width="100" />
						 </p>
					<?php
							endif;
						?>
		     	 	<?php	
		    			$this->load->view('admin/elements/fileupload_view.php',array('file'=>'image','id'=>'Service_image','value'=>$item->image,'multiple'=>false));
		    		?>
				 </div>
            </div> 
            <?php
	            
	            ?>
            <div class='form-group'>
	            <label class="control-label col-sm-2" for="pwd">Content Images</label>
				 <div class='col-sm-9'>
					<?php
						 if(isset($item->translations[0]->content_image)):
						 ?>
						 <p style="padding-bottom:10px;">
							 <img src="<?=base_url()?>assets/upload/img/thumbnail/<?=$item->translations[0]->content_image?>" width="100" />
						 </p>
					<?php
							endif;
						?>
		     	 	<?php	
		    			$this->load->view('admin/elements/fileupload_view.php',array('file'=>'content_image','id'=>'Service_content_image','value'=>$item->translations[0]->content_image,'multiple'=>false));
		    		?>
				 </div>
            </div> 
            
            <div class='form-group'>
	            <label class="control-label col-sm-2" for="pwd">Content</label>
				 <div class='col-sm-9'>
					<textarea class="form-control editor" id="content" name="content"><?=$item->translations[0]->content?></textarea>
				 </div>
            </div>
            
            <div class='form-group'>
	            <label class="control-label col-sm-2" for="pwd">Sort</label>
				 <div class='col-sm-9'>
					<?php
						 echo form_input('sort',$item->sort,'class="form-control" style="width:10%"');
						 //echo form_hidden('position','main_top_banner');
					?>
				 </div>
            </div>
            
             <div class="form-group">
					 <label class="control-label col-sm-2" for="pwd">Page title:</label>
					 <div class='col-sm-9'>
						<textarea class="form-control" id="page_title" name="page_title"><?php echo $item->translations ? set_value('page_keywords',$item->translations[0]->page_title):""?>
						</textarea>
					 </div>
	            </div>

	            
	            <div class="form-group">
					 <label class="control-label col-sm-2" for="pwd">Page keywords:</label>
					 <div class='col-sm-9'>
						<textarea class="form-control" id="page_keywords" name="page_keywords"><?php echo $item->translations ? set_value('page_keywords',$item->translations[0]->page_keywords):""?>
						</textarea>
					 </div>
	            </div>
	            
	            <div class="form-group">
					 <label class="control-label col-sm-2" for="pwd">Page description:</label>
					 <div class='col-sm-9'>
						<textarea class="form-control" id="page_description" name="page_description"><?php echo $item->translations ? set_value('page_description',$item->translations[0]->page_description):""?>
						</textarea>
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