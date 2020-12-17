
<!doctype html>
<!-- MedService - Medical & Medical Health Landing Page Template design by Jthemes -->
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="<?=$current_lang['slug']?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$page_title?></title>
    <meta name="description" content="<?=strip_tags($meta_description)?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="<?=$Settings['company_name'].': '.$page_title?>">
    <meta property="og:description" content="<?=strip_tags($meta_description)?>">
    <meta property="og:image" content="<?=base_url().$meta_image?>">
    <meta property="og:url" content="<?=base_url().$current_lang['slug'].uri_string();?>">
    <meta property="og:site_name" content="<?=$Settings['company_name']. ': '.$page_title?>">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/<?=$Settings['company_favicon']?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <?php echo $before_head?>
</head>

<body>
  <?=$this->load->view($template.'/elements/facebook/fb_sdk.php')?>
  <!-- PRELOADER SPINNER
		============================================= -->
		<div id="loader-wrapper">
			<div id="loader"><div class="loader-inner"></div></div>
		</div>
    <!-- PAGE CONTENT
============================================= -->
<div id="page" class="page">
<?php echo $this->load->view($template.'/elements/header/section_header')?>
