<?php defined('BASEPATH') OR exit('No direct script access allowed');

	$this->load->view('admin/elements/section_header_view');

	if (!empty($item->id)) {
			$type = 'edit';
	} else {
			$type = 'create';
	}

	$checked = "checked";

	if (isset($item->active)) {
			if ($item->active == 'N') {
					$checked = "";
			}
	}

 	echo form_open('admin/ourclients/submit/'.$type,array('role'=>'form','class'=>'form-horizontal','method'=>'post','id'=>'main_form_submit'));

	if(isset($item->id)){
		echo form_hidden('id',$item->id);
	}
	//echo form_hidden('refere_url', base_url(uri_string()));

?>
<?=content_open($page_name,$this)?>
<!-- Main Content -->
	<div class='box-body'>
		<!-- ./col left -->
		<div class='col-sm-9 border-right-3d'>
						<div class='form-group'>
              <label for="inputEmail3" class="control-label"><?=lang("Name")?></label>
                <!--<input type="input" name='title' class="form-control make_slug" id="title" placeholder="<?=lang("Title")?>">-->
                <?=form_input('name',value(isset($item->name)?$item->name:""),array('id'=>$lang['slug'].'_name','class'=>'form-control editor cke_editable cke_editable_inline cke_contents_ltr cke_show_borders','placeholder'=>lang("Name")))?>
						</div>
            <div class='form-group'>
    					<label for="inputEmail3" class="control-label"><?=lang("Image Client")?></label>
    		     	 	<div class=''>
    		    			<?php
    							$this->load->view("admin/elements/modules/upload_image_view",array('type'=>'image','field_id'=>'logo','id'=>'image','value'=>isset($item->logo)?$item->logo:"",'multiple'=>false,'path'=>'/img','button_name'=>'Upload Image','max_width'=>'200','max-height'=>'250'));
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
  	              <?=form_checkbox('active','Y',(isset($item->active)?($item->active=='N'?false:true):true),array('class'=>'minimal'))?>
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
