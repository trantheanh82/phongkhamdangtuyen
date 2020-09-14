
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

    <meta property="og:title" content="<?=$page_title?>">
    <meta property="og:description" content="<?=strip_tags($meta_description)?>">
    <meta property="og:image" content="<?=base_url().$meta_image?>">
    <meta property="og:url" content="<?=base_url(uri_string());?>">
    <meta property="og:site_name" content="<?=$Settings['company_name']?>">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/<?=$Settings['company_favicon']?>">
    <?php echo $before_head?>
</head>

<body>
  <!-- PRELOADER SPINNER
		============================================= -->
		<div id="loader-wrapper">
			<div id="loader"><div class="loader-inner"></div></div>
		</div>

    <!-- STYLE SWITCHER
		============================================= -->
		<div id="stlChanger">
			<div class="blockChanger bgChanger">
            	<a href="#" class="chBut"><i class="fas fa-sliders-h"></i></a>
                <div class="chBody">
					<div class="stBlock text-center" style="margin:30px 20px 30px 16px">
						<p>Choose Layout</p>
						<a class="s_1" href="demo-1.html"><img src="<?=base_url().'assets/'.$template?>/images/color-scheme/l-01.jpg" width="175" height="120" alt="layout-image"></a>
						<a class="s_1" href="demo-2.html"><img src="<?=base_url().'assets/'.$template?>/images/color-scheme/l-02.jpg" width="175" height="93" alt="layout-image"></a>
						<a class="s_1" href="demo-3.html"><img src="<?=base_url().'assets/'.$template?>/images/color-scheme/l-03.jpg" width="175" height="105" alt="layout-image"></a>
						<a class="s_1" href="demo-4.html"><img src="<?=base_url().'assets/'.$template?>/images/color-scheme/l-04.jpg" width="175" height="100" alt="layout-image"></a>
						<a class="s_1" href="demo-5.html"><img src="<?=base_url().'assets/'.$template?>/images/color-scheme/l-05.jpg" width="175" height="112" alt="layout-image"></a>
						<a class="s_1" href="demo-6.html"><img src="<?=base_url().'assets/'.$template?>/images/color-scheme/l-06.jpg" width="175" height="100" alt="layout-image"></a>
						<a class="s_1" href="demo-7.html"><img src="<?=base_url().'assets/'.$template?>/images/color-scheme/l-07.jpg" width="175" height="97" alt="layout-image"></a>
						<a class="s_1" href="demo-8.html"><img src="<?=base_url().'assets/'.$template?>/images/color-scheme/l-08.jpg" width="175" height="91" alt="layout-image"></a>
						<a class="s_1" href="demo-9.html"><img src="<?=base_url().'assets/'.$template?>/images/color-scheme/l-09.jpg" width="175" height="97" alt="layout-image"></a>
						<a class="s_1" href="demo-10.html"><img src="<?=base_url().'assets/'.$template?>/images/color-scheme/l-10.jpg" width="175" height="105" alt="layout-image"></a>
						<a class="s_1" href="demo-11.html"><img src="<?=base_url().'assets/'.$template?>/images/color-scheme/l-11.jpg" width="175" height="105" alt="layout-image"></a>
						<a class="s_1" href="demo-12.html"><img src="<?=base_url().'assets/'.$template?>/images/color-scheme/l-12.jpg" width="175" height="125" alt="layout-image"></a>
					</div>
				</div>
			</div>
		</div>	  <!-- END SWITCHER -->

    <!-- PAGE CONTENT
============================================= -->
<div id="page" class="page">
<?php echo $this->load->view($template.'/elements/header/section_header_4')?>
