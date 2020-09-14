<?php defined('BASEPATH') OR exit('No direct script access allowed');

	$this->load->view('admin/elements/section_header_view');
?>
<?=content_open($page_name,$this)?>
	
		<form class="form-horizontal" role="form" action="<?=site_url('admin/articles/submit')?>" method="post" id='main_form_submit'>
		<?php
			echo form_hidden("id",$item->id);
			?>

	<div class='box-body'>
		
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 col-md-1 control-label"><?=__("Active",$this)?></label>
          <div class="checkbox">
            <label>
              <?php
	              echo form_hidden('active','N');
	              ?>
              <input type="checkbox" name='active' checked value="Y">
            </label>
          </div>
        </div>
		
		<div class='form-group'>
			<label for="inputEmail3" class="col-sm-2 col-md-1 control-label"><?=__("Image",$this)?></label>
     	 	<div class='col-sm-2 col-md-2'>
	 	 		<p style='padding-bottom:10px;' id='img'> <img src='<?=base_url()?>assets/upload/img/<?=$item->image?>' height="100" style='max-height:100px' />
	 	 		</p></div>
     	 	<div class='col-sm-8 col-md-5'>
    			<?php $this->load->view("admin/elements/fileupload_view",array('file'=>"image",'id'=>"img",'value'=>$item->image,'multiple'=>false));?>
			</div>
		</div>
		
		<div class='form-group'>
			<label for="inputEmail3" class="col-sm-2 col-md-1 control-label"><?=__("Title",$this)?></label>
			<div class="col-sm-10 col-md-5">
                    <input type="input" name='title' class="form-control make_slug" id="title" placeholder="<?=__("Title",$this)?>" value="<?=$item->title?>">
            </div>
		</div>
		
		<?php
			
			if(isset($list_cats)):
			?>
		<!-- Checkbox Categories -->
		<div class='form-group'>
			<label for='' class='col-sm-2 col-md-1 control-label'><?=__("Categories",$this)?></label>
			<div class='col-sm-10 col-md-5'>
				<div style="padding:5px;max-height:100px;overflow: scroll;border:1px solid #d2d6de;">
				<?php
					
					foreach($list_cats as $key=>$value):
						$check = "";
						if(!empty($item->article_category)){
							foreach($item->article_category as $k => $v){
								if($v->category_id == $key){
									$check = "checked";
									unset($item->article_category[$k]);
								}
							}
						}
				?>
				<div class="checkbox">
                    <label>
                      <input type="checkbox" <?=$check?> name="category_ids[<?=$key?>]" value="<?=$value?>">
                      <?=$value?>
                    </label>
                  </div>
				<?php
					endforeach;
				?>
				</div>
			</div>
		</div>	
		<?php
			endif;
			?>
		
		<div class='form-group'>
			<label for="inputEmail3" class="col-sm-2 col-md-1 control-label slug"><?=__("Slug",$this)?></label>
			<div class="col-sm-10 col-md-5">
                    <input type="input" name='slug' class="form-control slug" id="slug" placeholder="<?=__("Slug",$this)?>" value="<?=$item->slug?>">
            </div>
		</div>
		
		<div class='form-group'>
			<label for="inputEmail3" class="col-sm-2 col-md-1 control-label"><?=__("Description",$this)?></label>
			<div class="col-sm-10 col-md-5">
				<?php echo form_textarea('description',value($item->description),array('class'=>'form-control'));?>
            </div>
		</div>
		
		<div class='form-group'>
			<label for="inputEmail3" class="col-sm-2 col-md-1 control-label"><?=__("Content",$this)?></label>
			<div class="col-sm-10 col-md-10">
				<?php echo form_textarea('content',value($item->content),array('class'=>'editor1','id'=>'editor1','contenteditable'=>true));?>
            </div>
		</div>
		
	</div>
<?php
	/*
		./end-box
		*/
	$this->load->view('admin/elements/ui/box_content/box_footer',array('command_tools'=>array('save','cancel')));
?>
</form>
<?=content_close()?>	