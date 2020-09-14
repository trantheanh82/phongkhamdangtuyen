<?php defined('BASEPATH') OR exit('No direct script access allowed');

	$this->load->view('admin/elements/section_header_view');
	
	$template = "
<table class='table table-responsive table-striped'>
    <tbody>
		<tr><td width='20%'>Công nghệ</td><td></td></tr>
		<tr><td>Độ phân giải thực</td><td></td></tr>
		<tr><td>Độ tương phản</td><td></td></tr>
	</tbody>
</table>";
?>
<?=content_open($page_name,$this)?>
<form class="form-horizontal" role="form" action="<?=site_url('admin/'.$page_name.'/submit')?>" method="post" id='main_form_submit'>
<?php
	if(isset($item->id)){
		echo form_hidden('id',$item->id);
	}
?>
	<div class='box-body'>
		<!-- ./col left -->
		<div class='col-sm-9 border-right-3d'>
			<div class='form-group'>
                    <!--<input type="input" name='title' class="form-control make_slug" id="title" placeholder="<?=lang("Title")?>">-->
                    <?=form_input('name',value(isset($item->name)?$item->name:""),array('id'=>'title','class'=>'form-control','placeholder'=>lang("Name")))?>
			</div>
            
			<div class='form-group'>
				<label for="inputEmail3" class="control-label"><?=lang("Template")?></label>
				<div class="">
					<?php echo form_textarea('template',value(isset($item->template)?(!empty($item->template)?$item->template:$template):$template),array('class'=>'form-control basic-editor','id'=>'template','contenteditable'=>true));?>
	            </div>
			</div>
            
		</div>
		<!-- ./col right -->
		<div class='col-sm-3'>
			
			<div class="form-group">
				<label for="inputEmail3" class="control-label"><?=lang("Status")?></label>
	          <div class="checkbox">
	            <label>
	              <?=form_hidden('active','N')?>
	              <?=form_checkbox('active','Y',(isset($item) && isset($item->active)?($item->active=='Y'?"checked":''):true),array('class'=>'minimal'))?>
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
	        
		</div>
		
	</div>
<?php
	/*./end-box
		*/
	$this->load->view('admin/elements/ui/box_content/box_footer',array('command_tools'=>array('save','cancel')));
?>
</form>
	
<?=content_close()?>