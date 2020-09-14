<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Main Content -->
<?php
		$this->load->view('admin/elements/section_header_view');
	?>
<?=content_open($page_name,$this)?>
<?php
	if(!empty($item->id)){
		$type = 'edit';

	}else{
		$type = 'create';
	}

	$checked = "checked";

	if(isset($item->active)){
		if($item->active == 'N'){
			$checked = "";
		}
	}

	$model_type = array('article'=>'Article','page'=>'Pages','service'=>'Service');

?>
<form class="form-horizontal" action="<?=site_url('admin/category/submit/'.$type)?>" method="post" id='main_form_submit'>
	<?php
		if(isset($item)){
			echo form_hidden('id',$item->id);
		}
		//echo form_hidden('refere_url',base_url(uri_string()));
		?>
	<div class='box-body'>
		<div class='col-md-9 border-right-3d'>
			<div class="form-group">
				 <label class="control-label col-sm-2" for="pwd">Name</label>
				 <div class='col-sm-9'>
					<?php
						 echo form_input('name',value(isset($item->name)?$item->name:""),'class="form-control make_slug"');
					?>
				 </div>
            </div>

            <div class='form-group'>
				<label for="inputEmail3" class="control-label  col-sm-2"><?=lang("Slug")?></label>
				<div class="col-sm-9">
	                   <!-- <input type="input" name='slug' class="form-control slug" id="slug" placeholder="<?=lang("Slug")?>">-->
	                    <?=form_input('slug',value(isset($item->slug)?$item->slug:""),array('class'=>'form-control slug','id'=>'slug','placeholder'=>lang("Slug")))?>
	            </div>
			</div>

            <div class='form-group'>
	            <label class="control-label col-sm-2" for="pwd">Description</label>
				 <div class='col-sm-9'>
					<textarea class="form-control editor" id="editor1" name="description" placeholder="<?=__("Type your content here",$this)?>"><?=isset($item->description)?$item->description:""?></textarea>
				 </div>
            </div>

              <div class='form-group'>
	            <label class="control-label col-sm-2" for="pwd">Sort</label>
				 <div class='col-sm-9'>
					<?php
						 echo form_input('sort',value(isset($item->sort)?$item->sort:""),'class="form-control" style="width:10%"');
					?>
				 </div>
            </div>


		</div>
		<div class='col-md-3'>
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
				<label for="inputEmail3" class="control-label"><?=lang("Home Menu")?></label>
	          <div class="checkbox">
	            <label>
	              <?php
		              echo form_hidden('on_menu','N');
					  echo form_checkbox('on_menu','Y',(isset($item->on_menu) && $item->on_menu == 'Y'?true:false),array('class'=>'minimal'));
	              ?>
	            </label>
	          </div>
	        </div>
	        <hr />


            <div class="form-group">
                <label class='control-label'><?=lang('Type')?></label>
	                <select class="form-control select2" name='model' style="width: 100%;">
	                  <?php
		                  foreach($model_type as $k => $v):
		                  ?>
		                   <option value='<?=$k?>' <?=isset($item) && ($model==$k)?"selected":""?>><?=lang($v)?></option>
		              <?php
			              endforeach;
			              ?>
	                </select>
              </div>
              <hr />

              <div class='form-group'>
					<label for="inputEmail3" class="control-label"><?=lang("Image Pages")?></label>

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

	<!--./box-footer -->
	<?php $this->load->view('admin/elements/ui/box_content/box_footer',array('command_tools'=>array('save','cancel')));?>
	</form>
<?=content_close()?>
