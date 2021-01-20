<?=$this->load->view($template.'/elements/page_inner_title',array('subpage_name'=>$page_name))?>

<!-- SERVICE DETAILS
			============================================= -->
			<div id="service-page" class="wide-60 service-page-section division">
				<div class="container">
					<div class="row">


						<!-- SERVICE CONTENT -->
				 		<div class="col-lg-8">
				 			<div class="s2-page pr-30 mb-40">

				 				<?=$item->translation->content->content?>

								<!-- Button -->
								<div class='text-center' style='width:100%;'>
								<a href="<?=base_url()?>bookingappointments" class="btn btn-orange orange-hover " data-toggle="modal" data-target="#bookingModal" data-modal-type="booking" data-modal-title="<?=lang("BOOKING APPOINTMENT ONLINE")?>"><?=lang("Book an appointment")?></a>
								</div>

				 			</div>
				 		</div>	<!-- END SERVICE CONTENT -->


				 		<!-- SIDEBAR -->
						<aside id="sidebar" class="col-lg-4">


							<!-- TEXT WIDGET -->
							<div id="txt-widget" class="sidebar-div mb-50">

								<?=$this->load->view($template.'/modules/healthcare/m_healthcare',array('healthcares'=>$other_healthcare))?>

								<?=$this->load->view($template.'/modules/services/m_services',array('other_services'=>$other_services))?>

								<?=$this->load->view($template.'/modules/articles/m_lastest_posts',array('lastest_posts'=>$lastest_posts));?>
							</div>

						</aside>   <!-- END SIDEBAR -->


				 	</div>  <!-- End row -->
				</div>	<!-- End container -->
			</div>	<!-- END SERVICE DETAILS -->

      <?=$this->load->view($template.'/modules/m_home_testimonial',array('content'=>lang('Testimonial')))?>
