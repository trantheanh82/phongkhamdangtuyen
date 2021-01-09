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
								<a href="https://phongkhamdangtuyen.com/bookingappointments" class="btn btn-orange orange-hover " data-toggle="modal" data-target="#bookingModal" data-modal-type="booking" data-modal-title="ĐẶT LỊCH KHÁM - TIÊM CHỦNG">Đặt lịch khám</a>
				 			</div>
				 		</div>	<!-- END SERVICE CONTENT -->


				 		<!-- SIDEBAR -->
						<aside id="sidebar" class="col-lg-4">


							<!-- TEXT WIDGET -->
							<div id="txt-widget" class="sidebar-div mb-50">

								<?php //$this->load->view($template.'/modules/services/m_services',array('services'=>$other_services))?>
								<?=$this->load->view($template.'/modules/articles/m_lastest_posts',array('lastest_posts'=>$lastest_posts));?>

						</aside>   <!-- END SIDEBAR -->


				 	</div>  <!-- End row -->
				</div>	<!-- End container -->
			</div>	<!-- END SERVICE DETAILS -->

      <?=$this->load->view($template.'/modules/m_home_testimonial',array('content'=>lang('Testimonial')))?>
