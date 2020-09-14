<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
		$this->load->view('admin/elements/section_header_view');
?>
<?=content_open($page_name,$this)?>
<!-- Main Content -->

				    <div class='box-body'>
					    <form class="form-horizontal" action="<?=site_url('admin/settings/submit')?>" method="post">

					<?php
						foreach($form_settings as $k => $v):
					?>
						<div class="form-group">
					      <label class="control-label col-sm-3" for="pwd"><?=__($v->name,$this)?></label>
					     	 <div class="col-sm-8">
					     	 	<?php

						     	 	switch($v->form_type){
							     	 	case "textarea":
							    ?>
							     	 		<textarea class="form-control editor" id="<?=$v->name?>" name="<?=$v->form_name?>"><?=$v->value?></textarea>
							 	<?php
							     	 		break;
							     	 	case "image":
							     	 	echo "<div>";
							     	 		$this->load->view("admin/elements/modules/upload_image_view",array('type'=>'image','field_id'=>$v->form_name,'id'=>$v->id,'value'=>$v->value,'multiple'=>false,'path'=>'/img','button_name'=>$v->name,'max_width'=>'100px'));
							     	 	echo "</div>";
							     	 		break;
							     	 	case "checkbox":
							     	 		echo "<input name='".$v->form_name."'  id='".$v->form_name."' type='hidden' ".($v->value=="Y" ? 'checked' : '')." value='N'/>";
							     	 		echo form_checkbox($v->form_name,'Y',($v->value=='Y'?true:false));
							     	 		break;
							     	 	case "select":
							     	 		echo form_dropdown($v->form_name,$v->config_variable,$v->value,'class="form-control"');
							     	 		break;
							     	 	default:
							     	 		echo form_input($v->form_name,$v->value,'class="form-control"');

						     	 	}
						     	?>

					    	</div>
					    </div>
					<?php

						endforeach;
					?>

						<div class="form-group">
					      <div class="col-sm-offset-3 col-sm-10">
					        <button type="submit" class="btn btn-primary">Submit</button>
					      </div>
				    	</div>
						</form>
					</div>
				</div>
<?=content_close()?>
