<?php defined('BASEPATH') OR exit('No direct script access allowed');

	$this->load->view('admin/elements/section_header_view');
?>
<?=content_open($page_name,$this)?>
<form class="form-horizontal" role="form" action="<?=site_url('admin/'.$page_name.'/submit')?>" method="post" id='main_form_submit'>
<?php
	if(isset($item->id)){
		echo form_hidden('id',$item->id);
	}
?>
	<div class='box-body'>
		<!-- ./col left -->
		<div class='col-sm-9 border-right-3d'>
			<div class='form-group'>
                    <!--<input type="input" name='title' class="form-control make_slug" id="title" placeholder="<?=lang("Title")?>">-->
                    <?=form_input('name',value(isset($item->name)?$item->name:""),array('id'=>'title','class'=>'form-control make_slug','placeholder'=>lang("Manufacture")))?>
			</div>
            
            <div class='form-group'>
				<label for="inputEmail3" class="control-label"><?=lang("Slug")?></label>
				<div class="">
	                   <!-- <input type="input" name='slug' class="form-control slug" id="slug" placeholder="<?=lang("Slug")?>">-->
	                    <?=form_input('slug',value(isset($item->slug)?$item->slug:""),array('class'=>'form-control slug','id'=>'slug','placeholder'=>lang("Slug")))?>
	            </div>
			</div>
			            
            <!-- Meta tags -->
            <div class="">
            	<h3><?=lang('Meta Tags')?></h3>
            </div>
            
            <div class='form-group'>
				<label for="input" class="control-label"><?=lang("Meta title")?></label>
				<div class="">
	                   <!-- <input type="input" name='slug' class="form-control slug" id="slug" placeholder="<?=lang("Slug")?>">-->
	                    <?=form_input('meta_title',value(isset($item->meta_title)?$item->meta_title:""),array('class'=>'form-control','id'=>'meta_title','placeholder'=>lang("meta title")))?>
	            </div>
			</div>
			
			<div class='form-group'>
				<label for="inputEmail3" class="control-label"><?=lang("Meta description")?></label>
				<div class="">
					<?php echo form_textarea('meta_description',value(isset($item->meta_description)?$item->meta_description:""),array('class'=>'form-control','id'=>'meta_description'));?>
	            </div>
			</div>
			<!-- Meta tags -->
            
		</div>
		<!-- ./col right -->
		<div class='col-sm-3'>
			
			<div class="form-group">
				<label for="inputEmail3" class="control-label"><?=lang("Status")?></label>
	          <div class="checkbox">
	            <label>
	              <?=form_hidden('active','N')?>
	              <?=form_checkbox('active','Y',(isset($item) && $item->active == 'Y'?true:true),array('class'=>'minimal'))?>
	            </label>
	          </div>
	        </div>
	        <hr />
	        
	        <div class="form-group">
			<label for="sort" class="control-label"><?=lang("Order")?></label>
	          <div class="checkbox">
	            <?=form_input('sort',value(isset($item->sort)?$item->sort:"10"),array('class'=>'form-control','width'=>'50'))?>
	          </div>
	        </div>
	        <hr />
	        
				<div class='form-group'>
					<label for="inputEmail3" class="control-label"><?=lang("Image Service")?></label>
		     	 	
		     	 	<div class=''>
		    			<?php //$this->load->view("admin/elements/modules/upload_view",array('file'=>"image",'id'=>"img",'button_name'=>lang("Upload Image"),"field_id"=>"image",'value'=>"",'multiple'=>false,'type_file'=>'articles','basic'=>true));?>
		    			<?php
							$this->load->view("admin/elements/modules/upload_image_view",array('type'=>'image','field_id'=>'upload_image','id'=>'image','value'=>isset($item->image)?$item->image:"",'multiple'=>false,'path'=>'/img','button_name'=>'Upload Image','max_width'=>'300px'));
					?>
		     	 	</div>
				</div>
				<hr />
		</div>
		
	</div>
<?php
	/*./end-box
		*/
	$this->load->view('admin/elements/ui/box_content/box_footer',array('command_tools'=>array('save','cancel')));
?>
</form>
	
<?=content_close()?>