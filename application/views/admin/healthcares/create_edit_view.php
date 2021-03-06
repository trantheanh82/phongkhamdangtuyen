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

 	echo form_open('admin/healthcares/submit/'.$type,array('role'=>'form','class'=>'form-horizontal','method'=>'post','id'=>'main_form_submit'));

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
              <label for="inputEmail3" class="control-label"><?=lang("Package name")?></label>
                <!--<input type="input" name='title' class="form-control make_slug" id="title" placeholder="<?=lang("Title")?>">-->
                <?=form_input('relation[translation]['.$lang['slug'].'][content][name]',value(isset($item->content[$lang['slug']]->name)?$item->content[$lang['slug']]->name:""),
								array('id'=>$lang['slug'].'_slug','class'=>'form-control make_slug editor cke_editable cke_editable_inline cke_contents_ltr cke_show_borders','placeholder'=>lang("Title")))?>
						</div>

            <div class='form-group'>
							<label for="inputEmail3" class="control-label"><?=lang("Slug")?></label>
							<div class="">
               <!-- <input type="input" name='slug' class="form-control slug" id="slug" placeholder="<?=lang("Slug")?>">-->
                <?=form_input('relation[slug]['.$lang['slug'].'][slug]',value(isset($item->slug[$lang['slug']]->slug)?$item->slug[$lang['slug']]->slug:""),
								array('class'=>'form-control '.$lang['slug'].'_slug','id'=>'slug','placeholder'=>lang("Slug")))?>
	            </div>
						</div>

						<div class='form-group'>
							<label for="inputEmail3" class="control-label"><?=lang("Description")?></label>
							<div class="inline-content-editor">
								<?php echo form_textarea('relation[translation]['.$lang['slug'].'][content][description]',value(isset($item->content[$lang['slug']]->description)?$item->content[$lang['slug']]->description:""),
								array('class'=>'form-control article-editor','id'=>$lang['slug'].'_description','contenteditable'=>true));?>
				            </div>
						</div>

						<div class='form-group'>
							<label for="inputEmail3" class="control-label"><?=lang("Content")?></label>
							<div class="inline-content-editor">
								<?php echo form_textarea('relation[translation]['.$lang['slug'].'][content][content]',value(isset($item->content[$lang['slug']]->content)?$item->content[$lang['slug']]->content:""),
													array('class'=>'form-control article-editor','id'=>$lang['slug'].'_content','contenteditable'=>true));?>
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
                  <?=form_input('relation[translation]['.$lang['slug'].'][content][meta_title]',value(isset($item->content[$lang['slug']]->meta_title)?$item->content[$lang['slug']]->meta_title:""),
									array('class'=>'form-control','id'=>'meta_title','placeholder'=>lang("meta title")))?>
	            </div>
			</div>

			<div class='form-group'>
				<label for="inputEmail3" class="control-label"><?=lang("Meta description")?></label>
				<div class="">
					<?php echo form_textarea('relation[translation]['.$lang['slug'].'][content][meta_description]',value(isset($item->content[$lang['slug']]->meta_description)?$item->content[$lang['slug']]->meta_description:""),
					array('class'=>'form-control','id'=>'meta_description'));?>
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


					<?php
				if(isset($list_cats) && !empty($list_cats)):
			?>
				<!-- Checkbox Categories -->
				<div class='form-group'>
					<label for='' class='control-label'><?=lang("Categories")?></label>
					<div class=''>
						<div style="padding:5px;max-height:300px;overflow: scroll;border:1px solid #d2d6de;">
						<?php
							foreach($list_cats as $key=>$value):
								$check = "checked";
								if(isset($item))
									if($key == $item->category_id) $check = "checked";
						?>
								<div class="checkbox">
                    <label>
                      <input type="radio" <?=$check?> class='minimal' name="category_id" value="<?=$key?>">
                      <?=$value?>
                    </label>
                  </div>
						<?php
							endforeach;
						?>
						</div>
						<!--<div class='text-right'><a href="">+ <?=lang('create new')?></a></div>-->
					</div>
				</div>
				<hr />

				<?php
					endif;
					?>

	        <div class="form-group">
				<label for="inputEmail3" class="control-label"><?=lang("Home Menu")?></label>
	          <div class="checkbox">
	            <label>
	              <?php
		              echo form_hidden('on_menu','N');
					  echo form_checkbox('on_menu','Y',(isset($item->on_menu)?($item->on_menu=='N'?false:true):false),array('class'=>'minimal'));
	              ?>
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

					<!-- upload image -->
					<div class='form-group'>
						<label for="inputEmail3" class="control-label"><?=lang("Image Pages")?></label>

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

<script>
	$(document).ready(function(){
		$('#select_icon').change(function(){
			value = $(this).val();
			$('#preview_icon').attr('class',"fa "+value);
			$('#form_icon').val(value);
		});
	});
	</script>
