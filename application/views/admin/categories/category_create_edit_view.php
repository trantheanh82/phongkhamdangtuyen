<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<!-- Main Content -->
<?php
        $this->load->view('admin/elements/section_header_view');

        echo content_open($page_name, $this);

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

    $model_type = array('article'=>'Article','page'=>'Pages','service'=>'Service');
    echo form_open('admin/category/submit/'.$type,array('class'=>'form-horizontal','method'=>'post','id'=>'main_form_submit'));
?>
<!--<form class="form-horizontal" action="<?=site_url('admin/category/submit/'.$type)?>" method="post" id='main_form_submit'>-->

	<?php
        // set id if not empty
        if (isset($item)) {
            echo form_hidden('id', $item->id);
        }
        //echo form_hidden('refere_url', base_url(uri_string()));
        ?>
	<div class='box-body'>
		<div class='col-md-9 border-right-3d'>
			<?=language_tabs($langs, $current_lang['slug'])?>
			<?php
            foreach ($langs as $lang):
                if(isset($item->content[$lang['slug']]->id)){
                  echo form_hidden('relation[translation]['.$lang["slug"].'][id]',$item->content[$lang['slug']]->id);
                }

                if(isset($item->slug[$lang['slug']]->id)){
                  echo form_hidden('relation[slug]['.$lang["slug"].'][id]',$item->slug[$lang['slug']]->id);
                }
        ?>
			<div class="tab-pane<?=$lang['slug']==$current_lang['slug']?" active":""?>" id="<?=$lang['slug']?>">
				<div class="form-group">
					 <label class="control-label col-sm-2" for="pwd">Name</label>
					 <div class='col-sm-9'>
						<?php
                 echo form_input('relation[translation]['.$lang['slug'].'][content][name]', value(isset($item->content[$lang['slug']]->name)?$item->content[$lang['slug']]->name:""), 'class="form-control make_slug" id="'.$lang['slug'].'_slug"');
            ?>
					 </div>
							</div>

							<div class='form-group'>
								<label for="inputEmail3" class="control-label  col-sm-2"><?=lang("Slug")?></label>
								<div class="col-sm-9">
										 <!-- <input type="input" name='slug' class="form-control slug" id="slug" placeholder="<?=lang("Slug")?>">-->
											<?=form_input('relation[slug]['.$lang['slug'].'][slug]', value(isset($item->slug[$lang['slug']]->slug)?$item->slug[$lang['slug']]->slug:""), array('class'=>'form-control '.$lang['slug'].'_slug','id'=>'slug','placeholder'=>lang("Slug")))?>
								</div>
							</div>

							<div class='form-group'>
								<label class="control-label col-sm-2" for="pwd">Description</label>
					 <div class='col-sm-9'>
						<textarea class="form-control editor" id="editor1" name="<?='relation[translation]['.$lang['slug'].'][content][description]'?>" placeholder="<?=__("Type your content here", $this)?>"><?=isset($item->content[$lang['slug']]->description)?$item->content[$lang['slug']]->description:""?></textarea>
					 </div>
							</div>
			</div>
			<?php
                    endforeach;
            ?>
			<?=language_tabs_close()?>
		</div>
		<div class='col-md-3'>
			<div class="form-group">
				<label for="inputEmail3" class="control-label"><?=lang("Status")?></label>
	          <div class="checkbox">
	            <label>
	              <?=form_hidden('active', 'N')?>
	              <?=form_checkbox('active', 'Y', (!isset($item)?"checked":($item->active== 'Y')?"true":false), array('class'=>'minimal'))?>
	            </label>
	          </div>
	        </div>
	        <hr />
					<div class='form-group'>
					<label for="sort">Sort</label>

						<?php
                             echo form_input('sort', value(isset($item->sort)?$item->sort:DEFAULT_SORT), 'class="form-control" style="width:20%"');
                        ?>
					</div>
					<hr />
		        <div class="form-group">
							<label for="inputEmail3" class="control-label"><?=lang("Home Menu")?></label>
				          <div class="checkbox">
				            <label>
				              <?php
                                  echo form_hidden('on_menu', 'N');
                                  echo form_checkbox('on_menu', 'Y', (isset($item->on_menu) && $item->on_menu == 'Y'?true:false), array('class'=>'minimal'));
                              ?>
		            </label>
		          </div>
		        </div>
		        <hr />
            <div class="form-group">
                <label class='control-label'><?=lang('Type')?></label>
	                <select class="form-control select2" name='model' style="width: 100%;">
	                  <?php
                          foreach ($model_type as $k => $v):
                          ?>
		                   <option value='<?=$k?>' <?=($model==$k)?"selected":""?>><?=lang($v)?></option>
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
                          $this->load->view("admin/elements/modules/upload_image_view", array('type'=>'image','field_id'=>'image','id'=>'image','value'=>isset($item->image)?$item->image:"",'multiple'=>false,'path'=>'/img','button_name'=>'Upload Image','max_width'=>'300px'));
                  ?>
				     	 	</div>
						</div>
						<hr />

		</div>
	</div>

	<!--./box-footer -->
	<?php $this->load->view('admin/elements/ui/box_content/box_footer', array('command_tools'=>array('save','cancel')));?>
	</form>
<?=content_close()?>
