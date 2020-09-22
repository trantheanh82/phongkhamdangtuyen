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

 	echo form_open('admin/sliders/submit/'.$type,array('role'=>'form','class'=>'form-horizontal','method'=>'post','id'=>'main_form_submit'));

	if(isset($item->id)){
		echo form_hidden('id',$item->id);
	}

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
              <label for="inputEmail3" class="control-label"><?=lang("Headline")?></label>
                <!--<input type="input" name='title' class="form-control make_slug" id="title" placeholder="<?=lang("Title")?>">-->
                <?=form_textarea('relation[translation]['.$lang['slug'].'][content][headline]',value(isset($item->content[$lang['slug']]->headline)?$item->content[$lang['slug']]->headline:""),
								array('id'=>$lang['slug'].'_header','class'=>'form-control basic-editor','placeholder'=>lang("Title")))?>
						</div>

            <div class='form-group'>
  						<label for="inputEmail3" class="control-label"><?=lang("Image Pages")?></label>

  			     	 	<div class=''>
  			    			<?php //$this->load->view("admin/elements/modules/upload_view",array('file'=>"image",'id'=>"img",'button_name'=>lang("Upload Image"),"field_id"=>"image",'value'=>"",'multiple'=>false,'type_file'=>'articles','basic'=>true));?>
  			    			<?php
  								$this->load->view("admin/elements/modules/upload_image_view",array('type'=>'image','field_id'=>'relation[translation]['.$lang['slug'].'][content][image]','id'=>$lang['slug'].'_image','value'=>isset($item->content[$lang['slug']]->image)?$item->content[$lang['slug']]->image:"",'multiple'=>false,'path'=>'/img','button_name'=>'Upload Image','max_width'=>'100%'));
  						?>
  			     	 	</div>
  					</div>


						<div class='form-group'>
							<label for="inputEmail3" class="control-label"><?=lang("Description")?></label>
							<div class="">
								<?php echo form_textarea('relation[translation]['.$lang['slug'].'][content][description]',value(isset($item->content[$lang['slug']]->description)?$item->content[$lang['slug']]->description:""),
								array('class'=>'form-control basic-editor','id'=>$lang['slug'].'_description','contenteditable'=>true));?>
				            </div>
						</div>

						<div class='form-group'>
              <label for="" class="control-label"><?=lang("Button text")?></label>
                <!--<input type="input" name='title' class="form-control make_slug" id="title" placeholder="<?=lang("Title")?>">-->
                <?=form_input('relation[translation]['.$lang['slug'].'][content][button_text]',value(isset($item->content[$lang['slug']]->button_text)?$item->content[$lang['slug']]->button_text:""),
								array('id'=>$lang['slug'].'_slug','class'=>'form-control','placeholder'=>lang("link")))?>
						</div>

            <div class='form-group'>
              <label for="inputEmail3" class="control-label"><?=lang("Button link")?></label>
                <!--<input type="input" name='title' class="form-control make_slug" id="title" placeholder="<?=lang("Title")?>">-->
                <?=form_input('relation[translation]['.$lang['slug'].'][content][button_link]',value(isset($item->content[$lang['slug']]->button_link)?$item->content[$lang['slug']]->button_link:""),
								array('id'=>$lang['slug'].'_slug','class'=>'form-control','placeholder'=>lang("link")))?>
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
					<!-- Radio Text align -->
		<div class="form-group">
			<label for="inputEmail3" class="control-label"><?=lang("Text align")?></label>
			<div class='radio_box'>
				<label style='margin-right:20px'>
          <input type="radio" name="text_align" class="minimal"  value="left" <?=isset($item->text_align)?($item->text_align=="left"?"checked":""):"checked"?>>
					<?=lang("Left")?>
        </label>
				<label>
	        <input type="radio" name="text_align" class="minimal" value="right"  <?=isset($item->text_align)?($item->text_align=="right"?"checked":""):""?>>
					<?=lang("Right")?>

	      </label>
			</div>

		</div>

		<hr />

					<!-- sort -->
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

<script>
	$(document).ready(function(){
		$('#select_icon').change(function(){
			value = $(this).val();
			$('#preview_icon').attr('class',"fa "+value);
			$('#form_icon').val(value);
		});
	});
	</script>
