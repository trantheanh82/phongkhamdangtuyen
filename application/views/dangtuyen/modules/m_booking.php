<!-- APPOINTMENT FORM -->
<div id="appointment-form-holder" class="text-center">
  <form name="appointmentform" class="row appointment-form">
    <!-- Form Select -->
            <!-- Contact Form Input -->

         <div id="input-doctor" class="col-md-12 input-doctor">
              <select id="inlineFormCustomSelect2" name="type" class="custom-select type" required>
                  <option value=""><?=lang('Select Booking or Vaccinations')?></option>
                  <option value="examination">1. <?=lang("Medical Examination")?></option>
                  <option value="vaccinations">2. <?=lang("Vaccinations")?></option>
              </select>
          </div>
           <div id="input-name" class="col-lg-12">
             <input type="text" name="name" class="form-control name" placeholder="<?=lang('Enter Your Name')?>*" required>
           </div>

            <div id="input-phone" class="col-lg-12">
              <input type="tel" name="phone" class="form-control phone" placeholder="<?=lang('Enter Your Phone Number')?>*" required>
            </div>

            <!-- Contact Form Button -->
            <div class="col-lg-12 form-btn">
              <button type="submit" class="btn btn-orange blue-orange submit"><?=lang("Confirm a Booking")?></button>
            </div>

            <!-- Contact Form Message -->
            <div class="col-lg-12 appointment-form-msg text-center">
              <div class="sending-msg"><span class="loading"></span></div>
            </div>

          </form>

</div>	<!-- END APPOINTMENT FORM -->
