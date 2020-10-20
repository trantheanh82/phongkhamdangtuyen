<section id="about-1" class="about-section division">
				<div class="container">
					<div class="row d-flex align-items-center">


						<!-- ABOUT BOX #1 -->
						<div id="abox-1" class="col-md-6 col-lg-6 col-sm-12">
							<div class="abox-1 white-color">

								<form name="heroForm" class="row hero-form">
								<!-- Title -->
								<h4 class="h4-md col-lg-12 text-uppercase"><?=lang('Booking An Appointment')?></h4>
									<div id="input-name" class="col-lg-6">
										<input type="text" name="name" class="form-control name box-shadow" placeholder="<?=lang("Enter Your Name")?>*" required>
									</div>
									<div id="input-phone" class="col-lg-6">
										<input type="tel" name="phone" class="form-control phone box-shadow" placeholder="<?=lang("Enter Your Phone Number")?>*" required>
									</div>
									<!-- Contact Form Input -->
								 <div id="input-date" class="col-lg-6">
									 <input id="datetimepicker" type="text" name="date" class="form-control date box-shadow" placeholder="<?=lang("Appointment Date")?>" required>
								 </div>

								 <!--<div id="input-message" class="col-lg-6 input-message">
									 <input class="form-control message box-shadow" name="message" placeholder="<?=lang('Your Message')?> ..." />
								 </div>-->
								 <div id="input-doctor" class="col-md-6 input-doctor">
						                    <select id="inlineFormCustomSelect2" name="doctor" class="custom-select doctor" required="">
						                        <option value="">Chọn nơi khám</option>  
																		<option>Tại phòng khám</option>
						                      	<option>Khám tại nhà</option>
						                    </select>
						                </div>

								 <!-- Contact Form Button -->
								 <div class="col-lg-6 offset-lg-3 form-btn">
									 <button type="submit" class="btn btn-orange tra-white-hover submit text-uppercase font-weight-bold box-shadow"><?=lang("Booking")?></button>
								 </div>

								 <!-- Contact Form Message -->
								 <div class="col-lg-12 hero-form-msg text-center">
									 <div class="sending-msg"><span class="loading"></span></div>
								 </div>
 								</form>
							</div>
						</div>

						<!-- ABOUT BOX #4 -->
						<div id="abox-4" class="col-md-6 col-lg-6 col-sm-12">
							<div class="abox-1 white-color">

								<form name="lookupPatientForm" class="row hero-form">
								<!-- Title -->
								<h4 class="h4-md col-lg-12 text-uppercase"><?=lang('Look up patient')?></h4>
									<div id="input-name" class="col-lg-6">
										<input type="text" name="patient_code" class="form-control name box-shadow" placeholder="<?=lang("Patient Code")?>*" required>
									</div>
									<div id="input-phone" class="col-lg-6">
										<input type="tel" name="birthday_year" class="form-control phone box-shadow" placeholder="<?=lang("Your Birthday Year")?>*" required>
									</div>

								<!--	<div id="input-date" class="col-lg-12">
										<input id="datetimepicker" type="text" name="date" class="form-control date box-shadow" placeholder="<?=lang("Appointment Date")?>" required>
									</div>-->

								 <!-- Contact Form Button -->
								 <div class="col-lg-6 offset-lg-3 form-btn">
									 <button type="submit" class="btn btn-orange tra-white-hover submit text-uppercase font-weight-bold box-shadow"><?=lang("Look up")?></button>
								 </div>

								 <!-- Contact Form Message -->
								 <div class="col-lg-12 hero-form-msg text-center">
									 <div class="sending-msg"><span class="loading"></span></div>
								 </div>
 								</form>

							</div>
						</div>


					</div>    <!-- End row -->
				</div>	   <!-- End container -->
			</section>
