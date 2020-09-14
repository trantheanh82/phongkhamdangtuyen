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

 	echo form_open('admin/faq/submit/'.$type,array('role'=>'form','class'=>'form-horizontal','method'=>'post','id'=>'main_form_submit'));

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
              <label for="inputEmail3" class="control-label"><?=lang("Question")?></label>
                <!--<input type="input" name='title' class="form-control make_slug" id="title" placeholder="<?=lang("Title")?>">-->
                <?=form_input('relation[translation]['.$lang['slug'].'][content][question]',value(isset($item->content[$lang['slug']]->question)?$item->content[$lang['slug']]->question:""),array('id'=>$lang['slug'].'_slug','class'=>'form-control make_slug editor cke_editable cke_editable_inline cke_contents_ltr cke_show_borders','placeholder'=>lang("Title")))?>
						</div>

            <div class='form-group'>
							<label for="inputEmail3" class="control-label"><?=lang("Slug")?></label>
							<div class="">
               <!-- <input type="input" name='slug' class="form-control slug" id="slug" placeholder="<?=lang("Slug")?>">-->
                <?=form_input('relation[slug]['.$lang['slug'].'][slug]',value(isset($item->slug[$lang['slug']]->slug)?$item->slug[$lang['slug']]->slug:""),array('class'=>'form-control '.$lang['slug'].'_slug','id'=>'slug','placeholder'=>lang("Slug")))?>
	            </div>
						</div>

						<div class='form-group'>
							<label for="inputEmail3" class="control-label"><?=lang("Answer")?></label>
							<div class="">
								<?php echo form_textarea('relation[translation]['.$lang['slug'].'][content][answer]',value(isset($item->content[$lang['slug']]->answer)?$item->content[$lang['slug']]->answer:""),array('class'=>'form-control basic-editor','id'=>$lang['slug'].'_answer','contenteditable'=>true));?>
				            </div>
						</div>

            <?php
	            if(isset($item) && $item->slug == 'gioi-thieu'):
            ?>
            <div class='form-group'>
	            <label for="inputEmail3" class="control-label"><?=lang("Company history")?></label>

				<?php echo form_textarea('content_1',value(isset($item->content_1)?$item->content_1:""),array('class'=>'form-control article-editor','id'=>'content_1','contenteditable'=>true,'style'=>'width:100%;border:1px solid #333'));?>
            </div>

            <div class='form-group'>
	            <label for="inputEmail3" class="control-label"><?=lang("Intro")?></label>

				<?php echo form_textarea('content_2',value(isset($item->content_2)?$item->content_2:""),array('class'=>'form-control article-editor','id'=>'content_2','contenteditable'=>true,'style'=>'width:100%;border:1px solid #333'));?>
            </div>

            <?php
	            endif;
	            ?>
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

	       <!-- <div class="form-group">
				<label for="inputEmail3" class="control-label"><?=lang("Home Menu")?></label>
	          <div class="checkbox">
	            <label>
	              <?php
		              //echo form_hidden('on_menu','N');
					  //echo form_checkbox('on_menu','Y',(isset($item->on_menu) && $item->on_menu == 'Y'?true:false),array('class'=>'minimal'));
	              ?>
	            </label>
	          </div>
	        </div>
	        <hr />-->

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
