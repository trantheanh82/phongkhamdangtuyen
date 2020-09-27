<?php $this->load->view($template.'/elements/footer/section_footer');?>
</div>
<!-- .end id=wrapper -->
		</div>	<!-- END PAGE CONTENT -->
		
<?php echo $before_body?>
<?php echo $script_for_layout?>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '653960835500999',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v8.0'
    });
  };
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
    
<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v8.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="393720394079584">
      </div>
</body>

</html>
