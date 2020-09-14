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
		
		<form class="form-horizontal" action="<?=site_url('admin/modules/brochuce')?>" method="post" id='main_form_submit'>
			<?php
				if(!empty($item)):	
			?>
			<div class='form-group'>
	            <label class="control-label col-sm-2" for="pwd">Brochuce File</label>
				 <div class='col-sm-9'>
					<p style="padding-bottom:10px;"><a href="<?=base_url()?>assets/upload/file/<?=$item->file?>"><?=$item->file?></a></p>
		     	 </div>
            </div>
            <?php
	        	endif;
	        ?>
			 <div class='form-group'>
	            <label class="control-label col-sm-2" for="pwd">Upload Brochuce:</label>
				 <div class='col-sm-9'>
					<p style="padding-bottom:10px;"></p>
		     	 	<?php
		    			$this->load->view('admin/elements/fileupload_view.php',array('file'=>'file','id'=>'file','value'=>'','multiple'=>false,'acceptFileType'=>"/(\.|\/)(pdf)$/i",'type_file'=>'file'));
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