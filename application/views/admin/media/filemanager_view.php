
<!-- Main Content -->
	<?php 
		$this->load->view('admin/elements/section_header_view');
?>
<?=content_open($page_name,$this)?>
	<div class='box-body'>
			<div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
				<iframe class="embed-responsive-item" width="100%" src="<?=base_url()?>filemanager/dialog.php?type=0&lang=vi&popup=1&crossdomain=0&relative_url=0&akey=abc&fldr=/" allowfullscreen></iframe>
	</div>
<?=content_close()?>
