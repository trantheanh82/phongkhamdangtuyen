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

    echo form_open('admin/publicmenu/submit',array('class'=>'form-horizontal','method'=>'post','id'=>'main_form_submit'));
        // set id if not empty
        if (isset($item)) {
            echo form_hidden('id', $item->id);
        }
      //  echo form_hidden('refere_url', base_url(uri_string()));
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
	              <?=form_checkbox('active', 'Y', (!isset($item)?"checked":(($item->active== 'Y')?"true":false)), array('class'=>'minimal'))?>
	            </label>
	          </div>
	        </div>
	        <hr />
            <div class='form-group'>
            <label for="sort"><?=lang("Link")?></label>
            <?php
              echo form_input('link', value(isset($item->link)?$item->link:""), 'class="form-control" style="width:100%"');
            ?>
            </div>
            <hr />
  					<div class='form-group'>
  					<label for="sort"><?=lang("Sort")?></label>
            <?php
              echo form_input('sort', value(isset($item->sort)?$item->sort:DEFAULT_SORT), 'class="form-control" style="width:20%"');
            ?>
  					</div>
  					<hr />

            <div class="form-group">
                <label class='control-label'><?=lang('Type')?></label>
	                <select class="form-control select2" name='type' style="width: 100%;">
	                  <?php
                          foreach ($menu_type as $k => $v):
                          ?>
		                   <option value='<?=$k?>' <?=(isset($item) && ($item->type==$k))?"selected":""?>><?=$v?></option>
		              <?php
                          endforeach;
                          ?>
	                </select>
              </div>
              <hr />
		</div>
	</div>

	<!--./box-footer -->
	<?php $this->load->view('admin/elements/ui/box_content/box_footer', array('command_tools'=>array('save','cancel')));?>
	</form>
<?=content_close()?>
