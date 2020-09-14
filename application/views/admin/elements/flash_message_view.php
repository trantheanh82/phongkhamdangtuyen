<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
if($this->session->flashdata('message')){
?>
	<!-- Flash Message -->
	  <div class="row">
			  <div class='col-xs-12 col-md-12 col-lg-12'>
			    <div class="alert alert-success alert-dismissible" role="alert" style='margin-top:2%;'>
			      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
			aria-hidden="true">&times;</span></button>
					<h4><i class="icon fa fa-check"></i> <?=__("Alert!",$this)?></h4>
			      <?php echo $this->session->flashdata('message');?>
			    </div>
			  </div>
	  </div>
	 <!-- End Flash Message -->
	<?php
}
?>