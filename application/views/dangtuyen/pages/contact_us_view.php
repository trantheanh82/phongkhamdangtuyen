<!-- GOOGLE MAP
			============================================= -->
			<div id="gmap" class="gmap"></div>




			<!-- CONTACTS-1
			============================================= -->
			<section id="contacts-1" class="wide-60 contacts-section division">				
				<div class="container">


					<!-- SECTION TITLE -->	
					<div class="row">	
						<div class="col-lg-10 offset-lg-1 section-title">	

							<!-- Title 	-->	
							<h3 class="h3-md green-color"><?=lang('Contact to')?> Phòng Khám Đa Khoa <span class='red-color'>Đặng Tuyền</span> </h3>	
						</div>
					</div>

						
					<div class="row">	


		 				<!-- CONTACTS INFO -->
		 				<div class="col-md-5 col-lg-4">

		 					<!-- General Information -->
		 					<div class="contact-box mb-40">
								<h5 class="h5-sm green-color"><?=lang("General Information")?></h5>
                <?php
                  if(isset($Settings['company_address_1'])):
                ?>
                  <p><?=lang('Address').$Settings['address']?></p> 
                  <p><?=lang('Address 2').$Settings['company_address_1']?></p> 

                <?php
              else:
                ?>
                <p><?=lang('Address 1')?>:<?=$Settings['address']?></p>
                <?php
              endif;
                ?>
                <?php
                    if(!empty($Settings['company_phone_1']))
                    echo "<p>".lang("Phone").$Settings['company_phone_1']."</p>";
                    
                    if(!empty($Settings['company_email']))
                    echo "<p>Email: <a href=\"mailto:".$Settings['company_email']."\" class=\"orange-color\">".$Settings['company_email']."</a></p>";
										
										if(!empty($Settings['fb_fanpage'])){
											echo "<p>Email: <a href=\"".$Settings['fb_fanpage']."\" class=\"orange-color\">".$Settings['fb_fanpage']."</a></p>";

										}
										?>
								
		 					</div>

              <?php 
                if(!empty($Settings['company_phone_2'])):
              ?>
		 					<!-- Patient Experience -->
              
		 					<div class="contact-box mb-40">
								<h5 class="h5-sm green-color"><?=lang('Patient Experience')?></h5>
								<?="<p>".lang("Phone").$Settings['company_phone_2']."</p>";?>
								<?="<p>Email: <a href=\"mailto:".$Settings['company_email']."\" class=\"orange-color\">".$Settings['company_email']."</a></p>";?>
		 					</div>
              <?php
            endif;
              ?>

		 					<!-- Working Hours -->
		 					<div class="contact-box mb-40">
								<h5 class="h5-sm green-color"><?=lang("Working Hours")?></h5>
								<p><?=lang('Monday')," - ".lang("Sunday")?>: 8:00 AM - 8:00 PM</p> 
		 					</div>

						</div>	<!-- END CONTACTS INFO -->


						<!-- CONTACT FORM -->	
				 		<div class="col-md-7 col-lg-8">
				 			<div class="form-holder mb-40">
				 				<form name="contactForm" class="row contact-form">
				                                            
					                <!-- Contact Form Input -->
					                <div id="input-name" class="col-md-12 col-lg-6">
					                	<input type="text" name="name" class="form-control name" placeholder="<?=lang('Enter Your Name')?>*" required> 
					                </div>
					                        
					                <div id="input-email" class="col-md-12 col-lg-6">
					                	<input type="text" name="email" class="form-control email" placeholder="<?=lang('Enter Your Email')?>*" required> 
					                </div>

					                <div id="input-phone" class="col-md-12 col-lg-6">
					                	<input type="tel" name="phone" class="form-control phone" placeholder="<?=lang('Enter Your Phone')?>*" required> 
					                </div>	

					                <!-- Form Select -->
					                <div id="input-patient" class="col-md-12 col-lg-6 input-patient">
					                    <select id="inlineFormCustomSelect3" name="patient" class="custom-select patient" required>
					                        <option value=""><?=lang('Have You Visited Us Before')?>?*</option>
            											<option><?=lang('New Patient')?></option>
            											<option><?=lang('Returning Patient')?></option>
            											<option><?=lang('Other')?></option>
					                    </select>
					                </div>

					                <div id="input-subject" class="col-lg-12">
					                	<input type="text" name="subject" class="form-control subject" placeholder="<?=lang("Subject")?>*" required> 
					                </div>					                          
					                        
					                <div id="input-message" class="col-lg-12 input-message">
					                	<textarea class="form-control message" name="message" rows="6" placeholder="<?=lang("Your Message")?> ..." required></textarea>
					                </div> 
					                                            
					                <!-- Contact Form Button -->
					                <div class="col-lg-12 mt-15 form-btn">  
					                	<button type="submit" class="btn btn-orange orange-hover submit"><?=lang("Send Your Message")?></button> 
					                </div>
					                                                              
					                <!-- Contact Form Message -->
					                <div class="col-lg-12 contact-form-msg text-center">
					                	<div class="sending-msg"><span class="loading"></span></div>
					                </div>  
				                                              
				                </form> 

				 			</div>	
				 		</div> 	<!-- END CONTACT FORM -->	


				 	</div>	<!-- End row -->			  
 

				</div>	   <!-- End container -->		
			</section>	<!-- END CONTACTS-1 -->