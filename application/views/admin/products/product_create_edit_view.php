<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	//Flash Message View
	$this->load->view('admin/elements/flash_message_view');
	
	$this->load->view('admin/elements/section_header_view');
	
	$tabs = array(lang('General'),lang('Images'),lang('Specifications'));
	?>
	<!-- Main Content -->
<form class="form-horizontal" role="form" action="<?=site_url('admin/products/submit')?>" method="post" id='main_form_submit' enctype="multipart/form-data">
		      

<?php
	if(isset($item->id)){
		echo form_hidden('id',value($item->id));
	}
	echo form_hidden('has_many','images');
?>		
	
	<?=content_open_tabs($page_name,$tabs)?>


	<div class="tab-content">
		<div class='tab-pane active' id='tab_1'>
			<div class="row">
				<div class='col-sm-9 border-right-3d'>
	
					
		            <div class="form-group">
						 <label class="control-label" for="pwd"><?=__('Product code',$this)?></label>
						 <div>
							<?php
								 echo form_input('code',value(isset($item->code)?$item->code:""),'class="form-control"');
							?>
						 </div>
		            </div>
		                        
		            <div class="form-group">
						 <label class="control-label" for="pwd"><?=__('Name',$this)?></label>
						 <div>
							<?php
								 echo form_input('name',value(isset($item->name)?$item->name:""),'class="form-control make_slug"');
							?>
						 </div>
		            </div>
		            
		            <div class="form-group">
						 <label class="control-label" for="pwd"><?=__('Slug',$this)?></label>
						 <div>
							<?php
								 echo form_input('slug',value(isset($item->slug)?$item->slug:""),'class="form-control" id="slug"');
							?>
						 </div>
		            </div>
		            
		            <div class="form-group">
						 <label class="control-label" for="pwd"><?=__('Price',$this)?></label>
						 <div>
							<?php
								echo form_hidden('price',value(isset($item->price)?$item->price:""),"id='simple_price");
								echo form_input('makeup_price',value(isset($item->price)?$item->price:""),"id='makeup_price' class='form-control currency'");
							?>
						 </div>
		            </div>
		                       
		            <div class='form-group'>
			            <label class="control-label" for="pwd"><?=__('General Information',$this)?></label>
						 <div>
							<textarea class="form-control product-editor" id="description" name="description"><?=value(isset($item->description)?$item->description:"")?></textarea>
						 </div>
		            </div>
		            <hr />
		            <div class='form-group'>
			            <label class="control-label" for="pwd"><?=__('Information Detail',$this)?></label>
						 <div>
							<textarea class="form-control product-editor" id="content" name="content"><?=value(isset($item->content)?$item->content:"")?></textarea>
						 </div>
		            </div>
		            <hr />
		            <div class=''>
			            <h3><?=lang("Meta tags")?></h3>
		            </div>	
		           <div class="form-group">
						 <label class="control-label" for="pwd"><?=__('Page title',$this)?></label>
						 <div>
							<?php
								 echo form_input('page_title',value(isset($item->page_title)?$item->page_title:""),'class="form-control" id="slug"');
							?>
						 </div>
		            </div>
			        <div class="form-group">
							 <label class="control-label" for="pwd"><?=__("Page Description",$this)?></label>
							 <div>
								<textarea class="form-control" id="page_title" name="page_description"><?=value(isset($item->page_description)?$item->page_description:"")?></textarea>
							 </div>
			            </div>
				</div>
				
				<div class='col-sm-3'>
					
					<div class='form-group'>
			            <label class='control-label' for='active'><?=__('Active',$this)?></label>
						<div class='checkbox'>
			            <?php 
				            echo "<input name='active'  id='active' type='hidden'  value='N'/>";
				     	 	echo form_checkbox('active','Y','checked',array('class'=>'minimal'));
			            ?>
						</div>
		            </div>
		            <hr />
		            
		            <?php
			            if(isset($solutions)):
		            ?>
		            <div class="form-group">
			            <label class="control-label"><?=lang("Solutions")?></label>
			            <div>
			                <select name="solution_id" class="form-control select2" style="width: 100%;">
				                	<option><?=lang("Select a solutions")?></option>
				                <?php
					                $selected = ""; 
					                foreach($solutions as $k=>$v):
					                	if(isset($item->solution_id) && $item->solution_id == $k)
					                		$selected=" selected";
				                ?>
				                    <option<?=$selected?> value="<?=$k?>"><?=$v?></option>
					            <?php 
						            	$selected = "";
						            	endforeach; ?>
					                
			                </select>
			            </div>
		            </div>
		            <?php endif;?>
		            
		            <?php
			            if(isset($manufactures)):
		            ?>
		            <div class="form-group">
			            <label class="control-label"><?=lang("Manufactures")?></label>
			            <div>
			                <select name="manufacture_id" class="form-control select2" style="width: 100%;">
				                	<option><?=lang("Select a Manufactures")?></option>
				                <?php
					                $selected = ""; 
					                foreach($manufactures as $k=>$v):
					                	if(isset($item->manufacture_id) && $item->manufacture_id == $k)
					                		$selected=" selected";
				                ?>
				                    <option<?=$selected?> value="<?=$k?>"><?=$v?></option>
					            <?php 
						            	$selected = "";
						            	endforeach; ?>
					                
			                </select>
			            </div>
		            </div>
		            
		            	<?php if(isset($product_types)): ?>
			            <div class="form-group">
			            	<label class="control-label"><?=lang("Product Type")?></label>
				            <div>
				                <select name="product_type_id" id="product_type" class="form-control select2" style="width: 100%;">
					                	<option><?=lang("Select a product type")?></option>
						                <?php 
							                	$selected = "";
							                foreach($product_types as $k=>$v):
												if(isset($item->product_type_id) && $item->product_type_id == $k)
													$selected = " selected";
							            ?>
						                    <option<?=$selected?> value="<?=$k?>"><?=lang($v)?></option>
							            <?php	
								            $selected =""; 
								            endforeach; ?>
				                </select>
				            </div>
			            </div>
			            <?php endif; ?>
				            
				        
		            <?php endif; ?>
		            
		            <div class='form-group'>
			            <label class="control-label" for="sort">Sort</label>
			            <div class='input'>
							<?php
								 echo form_input('sort',value(isset($item->sort)?$item->sort:10),'class="form-control"');
							?>
			            </div>
		            </div>
		            
				</div>
			</div>
		</div>
		<!-- Tab Images -->
		<div class='tab-pane' id='tab_2'>
			<?php $this->load->view('admin/elements/product_images',array('value'=>isset($item->images)?$item->images:""));?>
		</div>
		<!-- ./end Tab Images -->
		<!-- Tab Specifications -->
		<div class='tab-pane' id='tab_3'>
			<div class='form-group'>
					<textarea class="form-control basic-editor" id="specification" name="specification"><?=value(isset($item->specification)?$item->specification:"")?></textarea>
	        </div>
		</div>
		<!-- ./end Tab Images -->
<?php $this->load->view('admin/elements/ui/box_content/box_footer',array('command_tools'=>array('save','cancel'))); ?>

	</div>
	
	<?php
	/*
		./end-box
		*/
	?>

<?php
	//$this->load->view('admin/elements/ckeditor_view');
?>

<?=content_close_tabs()?>

</form>	
<?php
	foreach($product_type_items as $k => $v):
	?>
<div class='hide' id="template_<?=$v->id?>">
	<?=$v->template?>
</div>
<?php
	endforeach;
	?>

<script>
	
		
	$(document).ready(function(){
		$('#product_type').on('change',function(){
			template_id = $(this).val();
			SetContents($('#template_'+template_id+'').html());
		})
	});
	
	function SetContents(val){
		var editor = CKEDITOR.instances.specification;
		editor.setData(val);
	}
</script>