<style>
div span#iconselected:before{
  font-size:5rem;
}
</style>
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

 	echo form_open('admin/specialists/submit/'.$type,array('role'=>'form','class'=>'form-horizontal','method'=>'post','id'=>'main_form_submit'));

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

              if(isset($item->slug[$lang['slug']]->id)){
                echo form_hidden('relation[slug]['.$lang["slug"].'][id]',$item->slug[$lang['slug']]->id);
              }
        ?>
						<div class="tab-pane<?=$lang['slug']==$current_lang['slug']?" active":""?>" id="<?=$lang['slug']?>">

						<div class='form-group'>
              <label for="inputEmail3" class="control-label"><?=lang("Specialist Name")?></label>
                <!--<input type="input" name='title' class="form-control make_slug" id="title" placeholder="<?=lang("Title")?>">-->
                <?=form_input('relation[translation]['.$lang['slug'].'][content][name]',value(isset($item->content[$lang['slug']]->name)?$item->content[$lang['slug']]->name:""),array('id'=>$lang['slug'].'_slug','class'=>'form-control make_slug','placeholder'=>lang("Name")))?>
						</div>

            <div class='form-group'>
							<label for="inputEmail3" class="control-label"><?=lang("Slug")?></label>
							<div class="">
               <!-- <input type="input" name='slug' class="form-control slug" id="slug" placeholder="<?=lang("Slug")?>">-->
                <?=form_input('relation[slug]['.$lang['slug'].'][slug]',value(isset($item->slug[$lang['slug']]->slug)?$item->slug[$lang['slug']]->slug:""),array('class'=>'form-control '.$lang['slug'].'_slug','id'=>'slug','placeholder'=>lang("Slug")))?>
	            </div>
						</div>
            <div class='form-group'>
							<label for="inputEmail3" class="control-label"><?=lang("Description")?></label>
							<div class="inline-content-editor">
								<?php echo form_textarea('relation[translation]['.$lang['slug'].'][content][description]',value(isset($item->content[$lang['slug']]->description)?$item->content[$lang['slug']]->description:""),array('class'=>'form-control basic-editor','id'=>$lang['slug'].'_description','contenteditable'=>true));?>
				            </div>
						</div>

						<div class='form-group'>
							<label for="inputEmail3" class="control-label"><?=lang("Content")?></label>
							<div class="inline-content-editor">
								<?php echo form_textarea('relation[translation]['.$lang['slug'].'][content][content]',value(isset($item->content[$lang['slug']]->content)?$item->content[$lang['slug']]->content:""),array('rows'=>30,'class'=>'form-control article-editor','id'=>$lang['slug'].'_content','contenteditable'=>true));?>
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
				                    <?=form_input('relation[translation]['.$lang['slug'].'][content][meta_title]',value(isset($item->content[$lang['slug']]->meta_title)?$item->content[$lang['slug']]->meta_title:""),array('class'=>'form-control','id'=>'meta_title','placeholder'=>lang("meta title")))?>
				            </div>
						</div>

						<div class='form-group'>
							<label for="inputEmail3" class="control-label"><?=lang("Meta description")?></label>
							<div class="">
								<?php echo form_textarea('relation[translation]['.$lang['slug'].'][content][meta_description]',value(isset($item->content[$lang['slug']]->meta_description)?$item->content[$lang['slug']]->meta_description:""),array('class'=>'form-control','id'=>'meta_description'));?>
				            </div>
						</div>
						<!-- Meta tags -->

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
                <label><?=lang("Icon")?></label>
                <select class="form-control select2" name="icon" data-placeholder="<?=lang("Select an icon")?>"
                        style="width: 100%;">
                        <?php
                          foreach($icons as $icon):
                        ?>
                        <option value="<?=$icon?>" <?=(isset($item)?($icon==$item->icon?"selected":""):"")?>><span class="<?=$icon?>"></span> <?=$icon?></option>
                        <?php
                          endforeach;
                        ?>
                </select>
            </div>
            <div class="">
              <span id="iconselected" class="<?=isset($item->icon)?$item->icon:""?>"></span>
            </div>
            <hr />

            <div class="form-group">
                <label><?=lang("Doctors for Specialist")?></label>
                <select name="doctor_ids[]" class="form-control select-doctors" multiple="multiple" name="icon" data-placeholder="<?=lang("Select an icon")?>"
                        style="width: 100%;">
                    <?php
                    $check = "";
                      foreach($list_doctors as $k=>$d):
                        if(isset($item->doctor_specialist)){
                          foreach($item->doctor_specialist as $dp=>$list_dp){
                            if($list_dp->id == $k){
                              $check = "selected";
                            }else{
                              $check = "";
                            }
                          }
                        }
                    ?>
                      <option value="<?=$k?>" <?=$check?>> <?=$d?></option>
                    <?php
                      endforeach;
                    ?>
                </select>
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
  					<label for="inputEmail3" class="control-label"><?=lang("Image Specialist")?></label>

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

<script>
  $(document).ready(function(){
    function formatIcon (icon) {
      console.log(icon.text);
      if (!icon.id) {
        return icon.text;
      }
      var $icon = $(
        '<i class="'+icon.element.value+'"></i> '+icon.element.text
      );
      return $icon;
    };

    $('.select2').select2({
      templateResult: formatIcon
    });

    $('.select2').on('change',function(){
      console.log($(this).find(':selected')[0].value);
      $('#iconselected').removeClass().addClass($(this).find(':selected')[0].value)
    });

    $('.select-doctors').select2();
  });
</script>
