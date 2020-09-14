<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="box-header <?=isset($no_border)?"":"with-border"?>">
  <?php
	  if(isset($box_tool) || isset($command_tools)):
	  ?>
	  <div class="box-tools pull-right mb-10">

	  <?php
		  	if(isset($box_tool)):
		  ?>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
	<?php
			endif;

			if(isset($command_tools)):
				$this->load->view('admin/elements/ui/command_tools',$command_tools);
			endif;
			?>

       </div>
   <?php

	   endif;
	  ?>
</div>
