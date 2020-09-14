<footer>
  <!--<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>-->
</footer>

<?php
	$rand_debug = rand(0,99999999);
	?>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url()?>assets/admin/jquery-ui/jquery-ui.min.js"></script>
<!-- jQuery Validate -->
<script src="<?=base_url()?>assets/admin/js/jquery-validate/jquery.validate.min.js"></script>
<script src="<?=base_url()?>assets/admin/js/jquery-validate/additional-methods.min.js"></script>

<!-- Modernizr JS -->
<script src="<?=base_url()?>assets/admin/js/vendor/modernizr-2.8.3.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/admin/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?=base_url()?>assets/admin/raphael/raphael.min.js"></script>
<!--<script src="<?=base_url()?>assets/admin/morris.js/morris.min.js"></script>-->
<!-- Sparkline -->
<script src="<?=base_url()?>assets/admin/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

<!-- jvectormap -->
<script src="<?=base_url()?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url()?>assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url()?>assets/admin/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url()?>assets/admin/moment/min/moment.min.js"></script>
<script src="<?=base_url()?>assets/admin/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?=base_url()?>assets/admin/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" charset="UTF-8"></script>
<!-- datepicker -->
<script src="<?=base_url()?>assets/admin/bootstrap-datepicker/dist/locales/bootstrap-datepicker.vi.min.js" charset="UTF-8"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url()?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?=base_url()?>assets/admin/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/admin/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/admin/js/adminlte.js"></script>
<!-- FastClick -->
<!--<script src="<?=base_url()?>assets/admin/ckeditor/ckeditor.js"></script>-->
<!--<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>-->
<!--<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>-->
<script src="<?=base_url()?>assets/admin/ckeditor/ckeditor.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="<?=base_url()?>assets/admin/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/admin/js/demo.js"></script>
<script src="<?=base_url()?>assets/admin/js/script.js?r=<?=$rand_debug?>"></script>

<script id="main_script" src="<?=base_url()?>assets/admin/js/main.js"></script>

<!-- script for layout in <?=$this->router->fetch_class()?>-->
<?php echo $script_for_layout;?>

<?php echo $before_body;?>



</body>

</html>
