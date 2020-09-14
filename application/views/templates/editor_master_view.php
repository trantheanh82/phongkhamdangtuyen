<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Rich FileManager</title>

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>src/css/libs-main.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>src/css/filemanager.min.css" />

	<style type="text/css">
		.fm-container .fm-loading-wrap {
			position: fixed;
			height: 100%;
			width: 100%;
			overflow: hidden;
			top: 0;
			left: 0;
			display: block;
			background: white url(/billfee/images/spinner.gif) no-repeat center center;
			z-index: 999;
		}
	</style>
	<!-- CSS dynamically added using 'config.options.theme' defined in config file -->
</head>

<body>

<?php echo $the_view_content; ?>	
</body>

</html>