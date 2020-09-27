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
								<a href="<?=base_url()?>bookingappointments" class="btn btn-green green-hover"><?=lang("Book an appointment")?></a>
				 				
				 			</div>
				 		</div>	<!-- END SERVICE CONTENT --> 	


				 		<!-- SIDEBAR -->
						<aside id="sidebar" class="col-lg-4">


							<!-- TEXT WIDGET -->						
							<div id="txt-widget" class="sidebar-div mb-50">
										
								<!-- Title -->
								<h5 class="h5-sm steelblue-color">The Heart Of Clinic</h5>

								<!-- Head of Clinic -->
								<div class="txt-widget-unit mb-15 clearfix d-flex align-items-center">
								
									<!-- Avatar -->
									<div class="txt-widget-avatar">
										<img src="images/head-of-clinic.jpg" alt="testimonial-avatar">
									</div>

									<!-- Data -->
									<div class="txt-widget-data">
										<h5 class="h5-md steelblue-color">Dr. Jonathan Barnes</h5>	
										<span>Chief Medical Officer, Founder</span>	
										<p class="blue-color">1-800-1234-567</p>	
									</div>

								</div>	<!-- End Head of Clinic -->	
								
								<!-- Text -->
								<p class="p-sm">An enim nullam tempor sapien at gravida donec pretium ipsum porta justo
								   integer at odiovelna vitae auctor integer congue magna purus
								</p>

								<!-- Button -->
								<a href="about.html" class="btn btn-blue blue-hover">Learn More</a>
																		
							</div>	<!-- END TEXT WIDGET -->

								
							<!-- SIDEBAR TABLE -->
							<div class="sidebar-table blue-table sidebar-div mb-50">

								<!-- Title -->
								<h5 class="h5-md">Working Time</h5>

								<!-- Text -->
								<p class="p-sm">Porta semper lacus cursus, feugiat primis ultrice ligula risus auctor at
								   tempus feugiat dolor lacinia cursus nulla vitae massa
								</p>

								<!-- Table -->
								<table class="table">
									<tbody>
									    <tr>
									      	<td>Mon – Wed</td>
									      	<td> - </td>
									      	<td class="text-right">9:00 AM - 7:00 PM</td>
									    </tr>
									    <tr>
									      	<td>Thursday</td>
									      	<td> - </td>
									      	<td class="text-right">9:00 AM - 6:30 PM</td>
									    </tr>
									     <tr>
									      	<td>Friday</td>
									      	<td> - </td>
									      	<td class="text-right">9:00 AM - 6:00 PM</td>
									    </tr>
									    <tr class="last-tr">
									      	<td>Sun - Sun</td>
									      	<td>-</td>
									      	<td class="text-right">CLOSED</td>
									   	 </tr>
									  </tbody>
								</table>

								<!-- Title -->
								<h5 class="h5-xs">Need a personal health plan?</h5>

								<!-- Text -->
								<p class="p-sm">Porta semper lacus cursus, and feugiat primis ultrice ligula at risus auctor</p>

							</div>	<!-- END SIDEBAR TABLE -->


							<!-- SIDEBAR TIMETABLE -->
							<div class="sidebar-timetable sidebar-div mb-50">

								<!-- Title -->
								<h5 class="h5-md mb-20">Doctors Timetable</h5>

								<!-- Text -->
								<p class="p-sm">Porta semper lacus cursus, feugiat primis ultrice ligula risus auctor at
								   tempus feugiat dolor lacinia cursus nulla vitae massa
								</p>

								<!-- Button -->
								<a href="about.html" class="btn btn-green green-hover mt-10">View Timetable</a>

							</div>	<!-- END SIDEBAR TABLE -->


						</aside>   <!-- END SIDEBAR -->	


				 	</div>  <!-- End row -->	
				</div>	<!-- End container -->	
			</div>	<!-- END SERVICE DETAILS -->
      
      <?=$this->load->view($template.'/modules/m_home_testimonial',array('content'=>lang('Testimonial')))?>