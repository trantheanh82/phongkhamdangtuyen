<?php defined('BASEPATH') OR exit('No direct script access allowed');

	$this->load->view('admin/elements/section_header_view');
	echo content_open($page_name,$this);

	$checked = "checked";

	if (isset($item->active)) {
			if ($item->active == 'N') {
					$checked = "";
			}
	}

 	echo form_open('admin/layouts/submit/',array('role'=>'form','class'=>'form-horizontal','method'=>'post','id'=>'main_form_submit'));

	if(isset($item->id)){
		echo form_hidden('id',$item->id);
	}
	//echo form_hidden('refere_url', base_url(uri_string()));

?>
	<div class='box-body'>
		<!-- ./col left -->
		<div class='col-sm-12 border-right-3d'>
      <?php
        if(!empty($items)):
            foreach($items as $k=>$c):
            echo form_hidden('layoutitems['.$c->code.'][id]',$c->id);
            echo form_hidden('layoutitems['.$c->code.'][sort]',$c->sort);
            echo form_hidden('layoutitems['.$c->code.'][section]',$c->section);
            echo form_hidden('layoutitems['.$c->code.'][layout_id]',$c->layout_id);
            echo form_hidden('layoutitems['.$c->code.'][code]',$c->code);
            echo form_hidden('layoutitems['.$c->code.'][view]',$c->view);
      ?>
      <div class="layout_section" id="<?=$c->id?>">
					<h4 class='text-center text-bold bg-aqua' style="color:#fff;padding:1.5rem;"><?=$c->section?></h4>
					<!-- checkbox -->
					 <div class="form-group text-right">
						 <label>
							 <?=form_hidden('layoutitems['.$c->code.'][active]','N')?>
							 <input type="checkbox" class="minimal" value="Y" name="layoutitems[<?=$c->code?>][active]" <?=$c->active=='Y'?"checked":""?>>
							 <?=lang('Active')?>
						 </label>
					 </div>
          <hr  />
          <div class="layout_section__content">
              <?php
                  //if(empty($c->function) && empty($c->model)):

        						echo language_tabs($langs, $current_lang['slug'],$c->code);
                    foreach ($langs as $lang):

                      if(isset($c->translations->{$lang['slug']}->id))
                      echo form_hidden('layoutitems['.$c->code.'][translation]['.$lang['slug'].'][id]',$c->translations->{$lang['slug']}->id);
              ?>
        						<div class="tab-pane<?=$lang['slug']==$current_lang['slug']?" active":""?>" id="<?=$lang['slug'].'_'.$c->code?>">
                      <div class='form-group'>
          	            <label for="inputEmail3" class="control-label"><?=lang("Content")?></label>
          							<?php echo form_textarea('layoutitems['.$c->code.'][translation]['.$lang['slug'].'][html]',!empty($c->translations->{$lang['slug']}->html)?$c->translations->{$lang['slug']}->html:"",array(
                                                        'class'=>'form-control article-editor',
                                                        'id'=>$lang['slug'].'_'.$c->id,
                                                        'contenteditable'=>true,
                                                        'style'=>'width:100%;border:1px solid #333'))?>
                      </div><!-- ./end form group-->

        						</div><!-- ./end tab pane -->
          		<?php
                      endforeach; //end foreach language
                      echo language_tabs_close();
                  //else: // if function and model has value
                ?>
								<div class="row">

                <div class='col-sm-12 col-xs-12'>
                  <label for="inputEmail3" class="control-label"><?=lang("Function")?></label>

                  <div class='form-group'>
                      <!--<input type="input" name='title' class="form-control make_slug" id="title" placeholder="<?=lang("Title")?>">-->
                      <?=form_input('layoutitems['.$c->code.'][function]',value(isset($c->function)?$c->function:""),array('id'=>$lang['slug'].'_slug','class'=>'form-control make_slug editor cke_editable cke_editable_inline cke_contents_ltr cke_show_borders','placeholder'=>lang("Title")))?>
                  </div>
                </div>
                <div class='col-sm-12 col-xs-12'>
                  <label for="inputEmail3" class="control-label"><?=lang("Model")?></label>

                  <div class='form-group'>
                      <!--<input type="input" name='title' class="form-control make_slug" id="title" placeholder="<?=lang("Title")?>">-->
                      <?=form_input('layoutitems['.$c->code.'][model]',value(isset($c->model)?$c->model:""),array('id'=>$lang['slug'].'_slug','class'=>'form-control make_slug editor cke_editable cke_editable_inline cke_contents_ltr cke_show_borders','placeholder'=>lang("Title")))?>
                  </div>
                </div>

							</div>
                <?php
            //  endif; // endif function & model
                ?>

          </div>
      </div>
      <?php
            endforeach;
        endif;
      ?>
    </div>
  </div>
      <?php
      	/*./end-box
      		*/
      	$this->load->view('admin/elements/ui/box_content/box_footer',array('command_tools'=>array('save','cancel')));
      ?>
</form>

<?=content_close()?>
