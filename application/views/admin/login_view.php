
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$page_title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <?php echo link_tag('assets/admin/bootstrap/dist/css/bootstrap.min.css')?>
  <!-- Font Awesome -->
    <?php echo link_tag('assets/admin/font-awesome/css/font-awesome.min.css')?>
  <!-- Ionicons -->
  <?php echo link_tag('assets/admin/Ionicons/css/ionicons.min.css')?>
  <!-- Theme style -->
  <?php echo link_tag('assets/admin/css/AdminLTE.css')?>
  <!-- iCheck -->
  <?php echo link_tag('assets/admin/plugins/iCheck/square/blue.css')?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
   <?php
		  if($Settings['login_screen'] != ""){
			  $background = base_url().$Settings['login_screen'];
		  }else{
			  $background = base_url().'assets/img/full-size-bg.jpg';
		  }
	  ?>
  <style>

	  .login-page{
		  	/*background: #d2d6de url("<?=$background?>") center center fixed !important;*/
        background-color:#d2d6de;
		  	-webkit-background-size: cover;
			  -moz-background-size: cover;
			  -o-background-size: cover;
			  background-size: cover;
        height:auto;
    }
      #myVideo {
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 100%;
        min-height: 100%;
      }
	  </style>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <video control autoplay muted loop id="myVideo" src='<?=base_url()?>assets/admin/video/sea.mp4' type='video/mp4'>
  <source src="<?=base_url()?>assets/admin/video/sea.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>
<div class="login-box">
<!--  <div class="login-logo">
    <a href="<?=base_url()?>admin/user/login"><b><?=$page_title?></b></a>
  </div> -->
  <!-- /.login-logo -->
  <div class="login-box-body">
	  <?php
		  if($this->session->flashdata('message')):
		  	echo $this->session->flashdata('message');
		  endif;
		  if(isset($login)):
		  ?>
    <p class="login-box-msg"><?=__("Sign in to start your session",$this)?></p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input name="identity" type="email" class="form-control" placeholder="<?=__("Email...",$this)?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="<?=__("Password...",$this)?>">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input name="remember" type="checkbox" value=1 checked> <?=__("Remember Me",$this)?>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><?=__("Sign In",$this)?></button>
        </div>
        <!-- /.col -->
      </div>
    </form>
<!--
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
-->
    <!-- /.social-auth-links -->

    <a href="<?=base_url()?>admin/auth/forgot_password"><?=__("I forgot my password",$this)?></a><br>
    <!--<a href="register.html" class="text-center">Register a new membership</a>-->
	<?php
		endif;
		?>

	<?php
		if(isset($forgot_password)):
		?>
			<h1><?php echo lang('forgot_password_heading');?></h1>
			<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

			<div id="infoMessage"><?php echo $message;?></div>

			<?php echo form_open("/admin/auth/forgot_password");?>

			      <p>
			      	<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
			      	<?php echo form_input($identity);?>
			      </p>

			      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'));?></p>

			<?php echo form_close();?>

	<?php
		endif;
		?>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
	<script type="text/javascript" src="<?php echo base_url('assets/admin/jquery/dist/jquery.js');?>"></script>

<!-- Bootstrap 3.3.7 -->
	<script type="text/javascript" src="<?php echo base_url('assets/admin/bootstrap/dist/js/bootstrap.min.js');?>"></script>

<!-- iCheck -->
   <script type="text/javascript" src="<?php echo base_url('assets/admin/plugins/iCheck/icheck.min.js');?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
