<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
if($this->ion_auth->logged_in()):
?>

<header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url()?>/admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?php

	      if(isset($Settings['company_logo']))
	      echo img($Settings['company_logo'],false,array('width'=>'30'));

      ?>
	  </span>
      <!-- logo for regular state and mobile devices -->
     <!-- <span class="logo-lg"><b>Admin</b>LTE</span>-->
      <span class="logo-lg">
      <?php
	      if(isset($Settings['company_logo']))
	      echo img(base_url().$Settings['company_logo'],false,array('width'=>'30'));

      ?>
      	<b><?=$Settings['company_name']?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          

          <?php
	      	/*Load User Panel View*/
	      	$this->load->view('admin/elements/user/header_panel_view');
	      ?>
          <!-- Control Sidebar Toggle Button -->
          <!--<li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>-->
        </ul>
      </div>
    </nav>
  </header>
 <?php
endif;
?>
