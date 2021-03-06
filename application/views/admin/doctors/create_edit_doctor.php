<?php defined('BASEPATH') OR exit('No direct script access allowed');

	$this->load->view('admin/elements/section_header_view');
	echo content_open($page_name,$this);

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

 	echo form_open('admin/doctors/submit/'.$type,array('role'=>'form','class'=>'form-horizontal','method'=>'post','id'=>'main_form_submit'));

	if(isset($item->id)){
		echo form_hidden('id',$item->id);
	}
	//echo form_hidden('refere_url', base_url(uri_string()));

?>
	<div class='box-body'>
		<!-- ./col left -->
		<div class='col-sm-9 border-right-3d'>
			<?php
						echo language_tabs($langs, $current_lang['slug']);
            foreach ($langs as $lang):
              if(isset($item->content[$lang['slug']]->id)){
                echo form_hidden('relation[translation]['.$lang["slug"].'][id]',$item->content[$lang['slug']]->id);
              }
        ?>
						<div class="tab-pane<?=$lang['slug']==$current_lang['slug']?" active":""?>" id="<?=$lang['slug']?>">

						<div class='form-group'>
              <label for="inputEmail3" class="control-label"><?=lang("Name")?></label>
                <!--<input type="input" name='title' class="form-control make_slug" id="title" placeholder="<?=lang("Title")?>">-->
                <?=form_input('relation[translation]['.$lang['slug'].'][content][name]',value(isset($item->content[$lang['slug']]->name)?$item->content[$lang['slug']]->name:""),array('id'=>$lang['slug'].'_name','class'=>'form-control editor cke_editable cke_editable_inline cke_contents_ltr cke_show_borders','placeholder'=>lang("Name")))?>
						</div>

            <div class='form-group'>
              <label for="inputEmail3" class="control-label"><?=lang("Title")?></label>
                <!--<input type="input" name='title' class="form-control make_slug" id="title" placeholder="<?=lang("Title")?>">-->
                <?=form_input('relation[translation]['.$lang['slug'].'][content][title]',value(isset($item->content[$lang['slug']]->title)?$item->content[$lang['slug']]->title:""),array('id'=>$lang['slug'].'_title','class'=>'form-control editor cke_editable cke_editable_inline cke_contents_ltr cke_show_borders','placeholder'=>lang("Title")))?>
						</div>

						<div class='form-group'>
							<label for="inputEmail3" class="control-label"><?=lang("Experience")?></label>
							<div class="">
								<?php echo form_textarea('relation[translation]['.$lang['slug'].'][content][experience]',value(isset($item->content[$lang['slug']]->experience)?$item->content[$lang['slug']]->experience:""),array('class'=>'form-control basic-editor','id'=>$lang['slug'].'_experience','contenteditable'=>true));?>
				            </div>
						</div>

		</div>
		<?php
				endforeach;
				//end foreach languages
		echo language_tabs_close();?>
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

          <div class='form-group'>
  					<label for="inputEmail3" class="control-label"><?=lang("Image Doctor")?></label>

  		     	 	<div class=''>
  		    			<?php //$this->load->view("admin/elements/modules/upload_view",array('file'=>"image",'id'=>"img",'button_name'=>lang("Upload Image"),"field_id"=>"image",'value'=>"",'multiple'=>false,'type_file'=>'articles','basic'=>true));?>
  		    			<?php
  							$this->load->view("admin/elements/modules/upload_image_view",array(
                    'type'=>'image',
                    'field_id'=>'image',
                    'id'=>'image',
                    'value'=>isset($item->image)?$item->image:"",
                    'multiple'=>false,
                    'path'=>'/img',
                    'button_name'=>'Upload Image',
                    'max_width'=>'300px'));
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
