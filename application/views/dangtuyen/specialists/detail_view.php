<?php echo $this->load->view($template.'/elements/page_inner_title',array('subpage_name'=>$specialist->translation->content->name)); ?>
<!-- DEPARTMENT DETAILS
			============================================= -->
			<div id="department-page" class="wide-60 department-page-section division">
				<div class="container">
				 	<div class="row">


				 		<!-- DEPARTMENT DETAILS -->
				 		<div class="col-lg-8">
				 			<div class="txt-block pr-30">


				 				<!-- CONTENT BLOCK -->
				 				<div class="content-block mb-40">
									
				 					<?=$specialist->translation->content->content?>

								</div>	<!-- END CONTENT BLOCK -->

				 			</div>
				 		</div>	<!-- END DEPARTMENT DETAILS -->

							<!-- IMAGE WIDGET -->
							<div id="image-widget" class="sidebar-div">
								<a href="#">
									<img class="img-fluid" src="/assets/dangtuyen/images/blog/image-widget.jpg" alt="image-widget" />
								</a>
							</div>


						</aside>   <!-- END SIDEBAR -->


					</div>	<!-- End row -->
				</div>	 <!-- End container -->
			</div>	<!-- END DEPARTMENT DETAILS -->

			<?=$this->load->view($template.'/modules/doctors/m_doctors',array('doctors'=>$doctors))?>



			<!-- ABOUT-5
			============================================= -->
			<section id="about-5" class="pt-100 about-section division">
				<div class="container">
					<div class="row d-flex align-items-center">


						<!-- IMAGE BLOCK -->
						<div class="col-lg-6">
							<div class="about-img text-center wow fadeInUp" data-wow-delay="0.6s">
								<img class="img-fluid" src="images/image-03.png" alt="about-image">
							</div>
						</div>


						<!-- TEXT BLOCK -->
						<div class="col-lg-6">
							<div class="txt-block pc-30 wow fadeInUp" data-wow-delay="0.4s">

								<!-- Section ID -->
					 			<span class="section-id blue-color">Highest Quality Care</span>

								<!-- Title -->
								<h3 class="h3-md steelblue-color">Complete Medical Solutions in One Place</h3>

								<!-- Text -->
								<p>Porta semper lacus cursus, feugiat primis ultrice in ligula risus auctor tempus feugiat
								   dolor lacinia cubilia curae integer congue leo metus, eu mollislorem primis in orci integer
								   metus mollis faucibus. An enim nullam tempor sapien gravida donec pretium and ipsum porta
								   justo integer at velna vitae auctor integer congue
								</p>

								<!-- Singnature -->
								<div class="singnature mt-35">

									<!-- Text -->
									<p class="p-small mb-15">Randon Pexon, Head of Clinic</p>

									<!-- Singnature Image -->
									<!-- Recommended sizes for Retina Ready displays is 400x68px; -->
									<img class="img-fluid" src="/assets/<?=$template ?>/images/signature.png" width="200" height="34" alt="signature-image" />

								</div>

							</div>
						</div>	<!-- END TEXT BLOCK -->


					</div>    <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END ABOUT-5 -->
