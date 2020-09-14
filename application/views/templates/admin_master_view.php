
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="<?=$current_lang['language_code']?>">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link type="image/x-icon" rel="icon" href="<?=base_url()?>assets/admin/img/<?=$Settings['company_favicon']?>" />
  <link type="image/x-icon" rel="shortcut icon" href="<?=base_url()?>assets/admin/img/favicon.ico" />

  <?php

	  if(!empty($page_name)){
		  $page_title = $page_name."::Admin Panel";
	  }else{
		  $page_title = __('page_title',$this)."::Admin Panel";
	  }
  ?>

  <title><?php echo $page_title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <?=link_tag('assets/admin/bootstrap/dist/css/bootstrap.css?r=random1')?>
  <!-- Font Awesome -->
   <?=link_tag('assets/admin/font-awesome/css/font-awesome.min.css')?>
  <!-- Ionicons -->
  <?=link_tag('assets/admin/Ionicons/css/ionicons.min.css')?>

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <?=link_tag('assets/admin/css/skins/_all-skins.min.css')?>
  <!-- Morris chart -->
  <?=link_tag('assets/admin/morris.js/morris.css')?>
  <!-- jvectormap -->
  <?=link_tag('assets/admin/jvectormap/jquery-jvectormap.css')?>

  <!-- Date Picker -->
  <?=link_tag('assets/admin/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>
  <!-- Daterange picker -->

  <?=link_tag('assets/admin/bootstrap-daterangepicker/daterangepicker.css')?>
  <!-- bootstrap wysihtml5 - text editor -->
  <?=link_tag('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>

  <!-- text editor -->
  <?php //link_tag('assets/ckeditor/contents.css')?>
   <!-- text editor -->
  <?=link_tag('assets/admin/ckeditor/skins/moono/editor.css')?>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<?php
	echo $css_for_elements;
?>
 <!-- Theme style -->
  <?=link_tag('assets/admin/css/AdminLTE.css')?>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- JQuery 3 -->
  <script src="<?=base_url()?>assets/admin/jquery/dist/jquery.min.js"></script>

  <?php echo $before_head;?>


</head>
<body class="sidebar-mini wysihtml5-supported fixed skin-black">
<div class="wrapper" style="height: auto; min-height: 100%;">

<?php
	$this->load->view('templates/_parts/admin_master_header_view');

    $this->load->view('admin/elements/left_sidebar_view')?>

<div class="content-wrapper" style="min-height: 916px;">
	<?php
		// Content Goes here
		echo $the_view_content;
	?>
</div>
<footer class="main-footer">
	<?php
	if(!empty($debug_string)){
				pr($debug_string);
			}
?>
<div class="pull-right hidden-xs">
  <b>Version</b> 1.0
</div>
<strong>Copyright © 2014-<?=date('Y')?> <a href="#">Beeplatform</a>.</strong> All rights
reserved.
</footer>

<?php $this->load->view('templates/_parts/admin_master_footer_view');?>
