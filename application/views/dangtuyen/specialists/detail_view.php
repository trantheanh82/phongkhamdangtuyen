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


				 		<!-- SIDEBAR  -->
						<aside id="sidebar" class="col-lg-4">


							<?=$this->load->view($template.'/modules/doctors/m_doctors_in_specialist',array('doctors'=>$specialist->doctor_specialist))?>

							<?=$this->load->view($template.'/modules/specialists/m_other_specialists',array('other_specialists'=>$other_specialists))?>
							
							<?=$this->load->view($template.'/modules/services/m_services',array('services'=>$services))?>
							
							<?=$this->load->view($template.'/modules/articles/m_lastest_posts',array('lastest_posts'=>$lastest_posts));?>
							
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



		