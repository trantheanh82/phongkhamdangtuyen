<!-- HERO APPOINTMENT FORM -->
						<div class="col-lg-5 col-xl-5">
							<div id="hero-section-form" class="text-center mb-40">
								<form name="heroForm" class="row hero-form bg-green">

									<!-- Form Text -->
                                    <div class="col-md-12 white-color">
                                        <h4 class="h4-xs"><?=lang("Get an Appointment")?></h4>
                                    </div>

                                    <!-- Contact Form Input -->
					                <div id="input-name" class="col-lg-12">
					                	<input type="text" name="name" class="form-control name" placeholder="Enter Your Name*" required>
					                </div>

					                <div id="input-email" class="col-lg-12">
					                	<input type="text" name="email" class="form-control email" placeholder="Enter Your Email*" required>
					                </div>

					                <div id="input-phone" class="col-lg-12">
					                	<input type="tel" name="phone" class="form-control phone" placeholder="Enter Your Phone Number*" required>
					                </div>

					                 <!-- Contact Form Input -->
					                <div id="input-date" class="col-lg-12">
					                	<input id="datetimepicker" type="text" name="date" class="form-control date" placeholder="Appointment Date" required>
					                </div>

					                <!-- Form Select -->
					                <div id="input-doctor" class="col-md-12 input-doctor">
					                    <select id="inlineFormCustomSelect2" name="doctor" class="custom-select doctor" required>
					                        <option value="">Select Doctor</option>
					                      	<option>Jonathan Barnes D.M.</option>
					                      	<option>Hannah Harper D.M.</option>
					                      	<option>Matthew Anderson D.M.</option>
					                      	<option>Megan Coleman D.M.</option>
					                      	<option>Joshua Elledge D.M.</option>
					                      	<option>Other</option>
					                    </select>
					                </div>

					                <!-- Contact Form Button -->
					                <div class="col-lg-12 form-btn">
					                	<button type="submit" class="btn btn-orange tra-white-hover submit">Send Your Message</button>
					                </div>

					                <!-- Contact Form Message -->
					                <div class="col-lg-12 hero-form-msg text-center">
					                	<div class="sending-msg"><span class="loading"></span></div>
					                </div>

					            </form>
							</div>
						</div>	<!-- END HERO APPOINTMENT FORM -->
