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
                    <?=form_input('name',value(isset($item->name)?$item->name:""),array('id'=>'title','class'=>'form-control make_slug editor cke_editable cke_editable_inline cke_contents_ltr cke_show_borders','placeholder'=>lang("Title")))?>
			</div>
            
            <div class='form-group'>
				<label for="inputEmail3" class="control-label"><?=lang("Slug")?></label>
				<div class="">
	                   <!-- <input type="input" name='slug' class="form-control slug" id="slug" placeholder="<?=lang("Slug")?>">-->
	                    <?=form_input('slug',value(isset($item->slug)?$item->slug:""),array('class'=>'form-control slug','id'=>'slug','placeholder'=>lang("Slug")))?>
	            </div>
			</div>
			
			<div class='form-group'>
				<label for="inputEmail3" class="control-label"><?=lang("Description")?></label>
				<div class="">
					<?php echo form_textarea('description',value(isset($item->description)?$item->description:""),array('class'=>'form-control basic-editor','id'=>'description','contenteditable'=>true));?>
	            </div>
			</div>
            
            <div class='form-group'>
	            <label for="inputEmail3" class="control-label"><?=lang("Content")?></label>
				<?php echo form_textarea('content',value(isset($item->content)?$item->content:""),array('class'=>'form-control article-editor','id'=>'article','contenteditable'=>true,'style'=>'width:100%;border:1px solid #333'));?>
            </div>
            <hr />
            
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
	              <?=form_checkbox('active','Y',(isset($item) && $item->active == 'Y'?true:false),array('class'=>'minimal'))?>
	            </label>
	          </div>
	        </div>
	        <hr />
	        
	        <div class="form-group">
                <label><?=lang("Select an icon")?></label>
                <select name='icon' style='font-family:edua-icons' data-live-search="true" id='select_icon' class="form-control selectpicker" style="width: 100%;">
				<?php 
					$select = "";
					foreach($icons as $k=>$v): 
						if(isset($item->icon) && ($item->icon == $v)){
							$select = "selected";
						}
				?>
				<option <?=$select?> value="<?=$v?>" data-icon="<?=$v?>"><?=$v?></option> 
					
                  <?php
	                  $select=""; 
	                  endforeach; ?>
                </select>
              </div>
              <div>
	              <i id='preview_icon' style='font-size:100px;' class='<?=isset($item->icon)?$item->icon:""?>'></i>
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
					<label for="inputEmail3" class="control-label"><?=lang("Image Solution")?></label>
		     	 	
		     	 	<div class=''>
		    			<?php //$this->load->view("admin/elements/modules/upload_view",array('file'=>"image",'id'=>"img",'button_name'=>lang("Upload Image"),"field_id"=>"image",'value'=>"",'multiple'=>false,'type_file'=>'articles','basic'=>true));?>
		    			<?php
							$this->load->view("admin/elements/modules/upload_image_view",array('type'=>'image','field_id'=>'image','id'=>'image','value'=>isset($item->image)?$item->image:"",'multiple'=>false,'path'=>'/img','button_name'=>'Upload Image','max_width'=>'300px'));
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


<script>$.fn.selectpicker.Constructor.DEFAULTS.iconBase='fa';</script>
<script>
	$(document).ready(function(){
		$('#select_icon').change(function(){
			value = $(this).val();
			$('#preview_icon').attr('class',value);
			$('#form_icon').val(value);
		});
	});
	</script>