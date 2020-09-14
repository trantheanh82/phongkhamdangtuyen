
<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*Configure*/
	$controller  = $this->router->fetch_class();
	$action = $this->router->fetch_method();
/**/


$this->load->view('templates/_parts/admin_master_header_view'); ?>


<div class="container">
	<div class='row'>
	  <?php echo $the_view_content; ?>
	 </div>
</div>
<?php $this->load->view('templates/_parts/admin_master_footer_view');?>