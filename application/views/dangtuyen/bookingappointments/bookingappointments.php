
			<div id="appointment-page" class="wide-60 appointment-page-section division">
				<div class="container">
				 	<div class="row">


				 		<!-- SERVICE DETAILS -->
				 		<div class="col-lg-8">
				 			<div class="txt-block pr-30">

				 				<!-- Title -->
								<h3 class="h3-md darkgreen-color">Hẹn lịch khám trực tuyến</h3>

								<!-- Text -->
								<p>Để tránh thời gian chờ đợi của quý khách. Quý khách vui lòng đặt lịch để phòng khám sắp xếp và được phục vụ quý khách tốt nhất.
								</p>

								<!-- APPOINTMENT FORM -->
								<div id="appointment-form-holder" class="text-center">
									<form name="appointmentform" class="row appointment-form">

										<!-- Form Select -->
						               <!-- <div id="input-department" class="col-md-12 input-department">

						                    <select id="inlineFormCustomSelect1" name="department" class="custom-select department" required>
						                        <option value=""><?=lang("Select Department")?></option>
                                    <?php foreach($specialists as $k => $v): ?>
  						                      	<option value="<?=$v?>"><?=$v?></option>
                                    <?php endforeach;?>
						                    </select>
						                </div>-->

						                <!-- Form Select -->
						               <!-- <div id="input-doctor" class="col-md-12 input-doctor">
						                    <select id="inlineFormCustomSelect2" name="doctor" class="custom-select doctor" required>
						                        <option value=""><?=lang('Select Doctor')?></option>
                                    <?php foreach($doctors as $k => $v): ?>
  						                      	<option value="<?=$v?>"><?=lang("Doctors")?> <?=$v?></option>
                                    <?php endforeach;?>
						                    </select>
						                </div>-->
														
														<!-- Contact Form Input -->
													 <div id="input-name" class="col-lg-12">
														 <input type="text" name="name" class="form-control name" placeholder="<?=lang('Enter Your Name')?>*" required>
													 </div>
													 
						                <!-- Contact Form Input -->
						                <div id="input-date" class="col-lg-12">
						                	<input id="datetimepicker" type="text" name="date" class="form-control date" placeholder="<?=lang("Appointment Date")?>" required>
						                </div>

						                <!--<div id="input-email" class="col-lg-12">
						                	<input type="text" name="email" class="form-control email" placeholder="<?=lang('Enter Your Email')?>*" required>
						                </div>-->

						                <div id="input-phone" class="col-lg-12">
						                	<input type="tel" name="phone" class="form-control phone" placeholder="<?=lang('Enter Your Phone Number')?>*" required>
						                </div>

						                <div id="input-message" class="col-lg-12 input-message">
						                	<textarea class="form-control message" name="message" rows="6" placeholder="<?=lang('Your Message')?> ..."></textarea>
						                </div>

						                <!-- Contact Form Button -->
						                <div class="col-lg-12 form-btn">
						                	<button type="submit" class="btn btn-orange blue-orange submit"><?=lang("Request an Appointment")?></button>
						                </div>

						                <!-- Contact Form Message -->
						                <div class="col-lg-12 appointment-form-msg text-center">
						                	<div class="sending-msg"><span class="loading"></span></div>
						                </div>

					                </form>

								</div>	<!-- END APPOINTMENT FORM -->

								<!-- Text -->
								<p class="p-sm grey-color mb-30">* <?=lang('Require Fields')?>
								</p>


				 			</div>
				 		</div>	<!-- END SERVICE DETAILS -->


				 		<!-- SIDEBAR -->
						<aside id="sidebar" class="col-lg-4">


							<!-- TEXT WIDGET -->
							<div id="txt-widget" class="sidebar-div mb-50">

								<!-- Title -->
								<h5 class="h5-sm green-color">The Heart Of Clinic</h5>

								<!-- Head of Clinic -->
								<div class="txt-widget-unit mb-15 clearfix d-flex align-items-center">

									<!-- Avatar -->
									<div class="txt-widget-avatar">
										<img src="/assets/dangtuyen/images/head-of-clinic.jpg" alt="testimonial-avatar">
									</div>

									<!-- Data -->
									<div class="txt-widget-data">
										<h5 class="h5-md steelblue-color">Dr. Jonathan Barnes</h5>
										<span>Chief Medical Officer, Founder</span>
										<p class="red-color"><?=$Settings['company_phone_1']?></p>
									</div>

								</div>	<!-- End Head of Clinic -->

								<!-- Text -->
								<p class="p-sm">An enim nullam tempor sapien at gravida donec pretium ipsum porta justo
								   integer at odiovelna vitae auctor integer congue magna purus
								</p>

								<!-- Button -->
								<a href="about.html" class="btn btn-orange orange-hover">Learn More</a>

							</div>	<!-- END TEXT WIDGET -->


							<!-- SIDEBAR TABLE -->
							<div class="sidebar-table green-table sidebar-div mb-50">

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


						</aside>   <!-- END SIDEBAR -->


					</div>	<!-- End row -->
				</div>	 <!-- End container -->
			</div>	<!-- END APPOINTMENT PAGE -->
