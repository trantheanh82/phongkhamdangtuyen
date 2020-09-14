<?php defined('BASEPATH') OR exit('No direct script access allowed');

	$this->load->view('admin/elements/section_header_view');
?>
<?=content_open($page_name,$this)?>
<form class="form-horizontal" role="form" action="<?=site_url('admin/sliders/submit')?>" method="post" id='main_form_submit'>
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
                    <?=form_input('name',value(isset($item->name)?$item->name:""),array('id'=>'name','class'=>'form-control','placeholder'=>lang("Name")))?>
			</div>
			
			<div class='form-group'>
                    <label for="inputEmail3" class="control-label"><?=lang("Head Line")?></label>

                    <?=form_input('tag_line',value(isset($item->tag_line)?$item->tag_line:""),array('id'=>'tag_line','class'=>'form-control editor ','placeholder'=>lang("Head Line")))?>
			</div>

            
            <div class='form-group'>
				<label for="inputEmail3" class="control-label"><?=lang("Description")?></label>
				<div class="">
	                    <?=form_input('description',value(isset($item->description)?$item->description:""),array('class'=>'form-control','id'=>'description','placeholder'=>lang("Description")))?>
	            </div>
			</div>
			<div class='row'>
				<div class='col-md-6'>
					<div class='form-group'>
                    <label for="button" class="control-label"><?=lang("Button 1 text")?></label>

                    <?=form_input('button_1',value(isset($item->button_1)?$item->button_1:""),array('id'=>'button_1','class'=>'form-control','placeholder'=>lang("Button text")))?>
					</div>
				</div>
				<div class='col-md-6'>
					<div class='form-group'>
                    <label for="button" class="control-label"><?=lang("Button 1 link")?></label>

                    <?=form_input('button_1_link',value(isset($item->button_1_link)?$item->button_1_link:""),array('id'=>'button_link_1','class'=>'form-control','placeholder'=>lang("Button text")))?>
					</div>
				</div>
			</div>
			<div class='row'>
				<div class='col-md-6'>
					<div class='form-group'>
                    	<label for="button" class="control-label"><?=lang("Button 2 text")?></label>

                    <?=form_input('button_2',value(isset($item->button_2)?$item->button_2:""),array('id'=>'button_1','class'=>'form-control','placeholder'=>lang("Button text")))?>
					</div>
				</div>
				<div class='col-md-6'>
					<div class='form-group'>
	                    <label for="button" class="control-label"><?=lang("Button 2 link")?></label>
	
	                    <?=form_input('button_2_link',value(isset($item->button_2_link)?$item->button_2_link:""),array('id'=>'button_link_2','class'=>'form-control','placeholder'=>lang("Button text")))?>
					</div>
				</div>
			</div>
			<div class='form-group'>
					<label for="inputEmail3" class="control-label"><?=lang("Image Slider")?></label>
		     	 	<div class=''>
		    			<?php //$this->load->view("admin/elements/modules/upload_view",array('file'=>"image",'id'=>"img",'button_name'=>lang("Upload Image"),"field_id"=>"image",'value'=>"",'multiple'=>false,'type_file'=>'articles','basic'=>true));?>
		    			<?php
							$this->load->view("admin/elements/modules/upload_image_view",array('type'=>'image','field_id'=>'upload_image','id'=>'image','value'=>isset($item->image)?$item->image:"",'multiple'=>false,'path'=>'/img/sliders','button_name'=>'Upload Image','max_width'=>'100%'));
					?>
		     	 	</div>
				</div>
			
			            
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
			<label for="sort" class="control-label"><?=lang("Order")?></label>
	          <div class="checkbox">
	            <?=form_input('sort',value(isset($item->sort)?$item->sort:"10"),array('class'=>'form-control','width'=>'50'))?>
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