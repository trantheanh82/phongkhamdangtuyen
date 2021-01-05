<?=$this->load->view($template.'/modules/banners/m_banner_8')?>

<!-- FOOTER-3
			============================================= -->
			<footer id="footer-3" class="wide-40 footer division">
				<div class="container">


					<!-- FOOTER CONTENT -->
					<div class="row">


						<!-- FOOTER INFO -->
						<div class="col-md-6 col-lg-3">
							<div class="footer-info mb-40">

								<!-- Footer Logo -->
								<!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 360 x 80  pixels) -->
								<!--<img src="<?=base_url().'assets/'.$template?>/images/footer-logo.png" width="180" height="40" alt="footer-logo">-->
                <?=img($Settings['company_logo_footer'],'',array('height'=>45,'alt'=>$Settings['company_name']))?>

								<!-- Text -->
								<p class="mt-20"><?=$Settings['company_description']?></p>

								<!-- Social Icons -->
								<div class="footer-socials-links mt-20">
									<ul class="foo-socials text-center clearfix">

										<li><a href="https://www.facebook.com/pkdkdangtuyen/" class="ico-facebook"><i class="fab fa-facebook-f"></i></a></li>
										<!--<li><a href="#" class="ico-twitter"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#" class="ico-google-plus"><i class="fab fa-google-plus-g"></i></a></li>
										<li><a href="#" class="ico-tumblr"><i class="fab fa-tumblr"></i></a></li>-->

										<!--
										<li><a href="#" class="ico-behance"><i class="fab fa-behance"></i></a></li>
										<li><a href="#" class="ico-dribbble"><i class="fab fa-dribbble"></i></a></li>
										<li><a href="#" class="ico-instagram"><i class="fab fa-instagram"></i></a></li>
										<li><a href="#" class="ico-linkedin"><i class="fab fa-linkedin-in"></i></a></li>
										<li><a href="#" class="ico-pinterest"><i class="fab fa-pinterest-p"></i></a></li>
										<li><a href="#" class="ico-youtube"><i class="fab fa-youtube"></i></a></li>
										<li><a href="#" class="ico-vk"><i class="fab fa-vk"></i></a></li>
										<li><a href="#" class="ico-yelp"><i class="fab fa-yelp"></i></a></li>
										<li><a href="#" class="ico-yahoo"><i class="fab fa-yahoo"></i></a></li>
									    -->

									</ul>
								</div>

							</div>
						</div>


						<!-- FOOTER CONTACTS -->
						<div class="col-md-6 col-lg-3">
							<div class="footer-box mb-40">

								<!-- Title -->
								<h5 class="h5-xs darkgreen-color"><?=lang("Our Locations")?></h5>

								<!-- Address -->
								<p><?=lang("Address").$Settings['address']?></p>
								<p><?=lang("Address 2").$Settings['company_address_1']?></p>

								<!-- Email -->
								<p class="foo-email mt-20">E: <a href="mailto:<?=$Settings['company_email']?>"><?=$Settings['company_email']?></a></p>

								<!-- Phone -->
								<p>P: <?=$Settings['company_phone_1']?></p>

							</div>
						</div>


						<!-- FOOTER LINKS -->
						<div class="col-md-6 col-lg-2">
							<div class="footer-links mb-40">

								<!-- Title -->
								<h5 class="h5-xs darkgreen-color"><?=lang("About Clinic")?></h5>

								<!-- Footer Links -->
								<ul class="foo-links clearfix">
									<li><a href="<?=base_url()?>/gioi-thieu/gioi-thieu"><?=lang('About us')?></a></li>
									<li><a href="<?=base_url()?>/gioi-thieu/tuyen-dung"><?=lang('Recruitment')?></a></li>
									<li><a href="<?=base_url()?>/gioi-thieu/bac-si"><?=lang('Our Doctors')?></a></li>
								</ul>

							</div>
						</div>


						<!-- FOOTER LINKS -->
						<div class="col-md-6 col-lg-4">
							<div class="footer-links mb-40">

								<!-- Title -->
								<h5 class="h5-xs darkgreen-color">Fanpage</h5>

								<!-- Footer List -->
								<!--<ul class="clearfix">
									<li><a href="#">Help Center</a></li>
									<li><a href="#">Life Chatting</a></li>
									<li><a href="#">Terms & Privacy</a></li>
									<li><a href="#">FAQs</a></li>
									<li><a href="#">Site Map</a></li>
								</ul>-->
								<?=$this->load->view($template.'/elements/facebook/fb_fanpage')?>

							</div>
						</div>


					</div>	  <!-- END FOOTER CONTENT -->


					<!-- FOOTER COPYRIGHT -->
					<div class="bottom-footer">
						<div class="row">
							<div class="col-md-12">
								<?=$Settings['copyright']?>
							</div>
						</div>
					</div>


				</div>	   <!-- End container -->
			</footer>	<!-- END FOOTER-3 -->
<?=$this->load->view($template.'/modules/call_btn')?>
<?=$this->load->view($template.'/modules/zalo_btn')?>

<?=$this->load->view($template.'/modules/dialog/modal',array('modal'=>array('title'=>lang('BOOKING APPOINTMENT ONLINE'),'content'=>$this->load->view($template.'/modules/m_booking','',true))))?>
