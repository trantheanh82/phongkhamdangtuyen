<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
	/**
		Variables
		$id:
		$field_id:
		$path:
		$button_name:
		$max_width:
		$value:
	**/
	?>
<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-<?=$id?>"><?=__($button_name,$this)?></button>
<br /><br />
<div class='image-placehold mt-10' style='max-width:<?=isset($max_width)?$max_width:"150px";?>'>

	<p style='position:absolute;right:30px' class='hide remove-placehold-image' title='<?=__('remove image',$this)?>'><icon class='fa fa-trash red'></icon></p>

	<img src="<?=($value != "")?base_url().$value:""?>" id='img_<?=$id?>' class='img-responsive profile-avatar border-trans'
		style='cursor:pointer;width:<?=	isset($max_width)?$max_width:"150px";?>;'
		 data-toggle='modal' data-target='#modal-default-<?=$id?>'
		onerror="this.src='<?=base_url()?>assets/admin/img/images-empty.png';"/>

<input type='hidden' name='<?=$field_id?>' id='<?=$id?>' value="<?=$value?>"/>

</div>
<?php
	$this->load->view('admin/elements/modules/modal_filemanager_view',array('modal_title'=>lang('Upload Image'),'type'=>$type,'field_id'=>$id,'path'=>$path));
	?>

<script>

	function responsive_filemanager_callback(field_id){
		var url=jQuery('#'+field_id).val();
		$('#'+field_id).val($('#'+field_id).val().split("<?=base_url()?>")[1]);
		$('#img_'+field_id).attr('src',url);
	//your code
	}

	$(document).ready(function(){

		$('.image-placehold').hover(
			function(){
				if($('#img_<?=$field_id?>').attr('src') != "<?=base_url()?>assets/admin/img/images-empty.png"){
					$('.remove-placehold-image').removeClass('hide');
				}
			},
			function(){
				$('.remove-placehold-image').addClass('hide');
			}
		);

		$('.remove-placehold-image').on('click',function(){
			$('#<?=$id?>').val('');
			$('#img_<?=$field_id?>').attr('src','');

		})
	});
</script>
