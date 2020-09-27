<?php
  if(isset($doctors)):
?>
<!-- DOCTORS-1
============================================= -->
<section id="doctors-1" class="bg-lightgrey wide-40 doctors-section division">
  <div class="container">


    <!-- SECTION TITLE -->
    <div class="row">
      <div class="col-lg-10 offset-lg-1 section-title">

        <!-- Title 	-->
        <h3 class="h3-md darkgreen-color"><?=lang("Our Medical Specialists")?></h3>

        <!-- Text -->
        <!--<p>Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis libero at tempus,
           blandit posuere ligula varius congue cursus porta feugiat
        </p>-->

      </div>
    </div>	 <!-- END SECTION TITLE -->


    <div class="row">

      <?php
        $doctor_number = count(get_object_vars($doctors));
        foreach($doctors as $k =>$value):
          $link = "";
          $columns = ($doctor_number==2?"col-lg-6":($doctor_number==3?"col-lg-4":($doctor_number>=4?"col-lg-3":"col-lg-4 offset-lg-4")));
      ?>
      <!-- DOCTOR #1 -->
      <div class="col-md-6 <?=$columns?>">
        <div class="doctor-1">

          <!-- Doctor Photo -->
          <div class="hover-overlay text-center">

            <!-- Photo -->
            <?=img($value->image,'',array('class'=>'img-fluid','alt'=>$value->translation->content->name.' '.lang("Doctor").' '.$Settings['company_name']))?>
            <div class="item-overlay"></div>

            <!-- Profile Link -->
            <!--<div class="profile-link">
              <?=anchor($link,lang('View more info'),array('class'=>"btn btn-sm btn-tra-white black-hover"))?>
            </div>-->

          </div>

          <!-- Doctor Meta -->
          <div class="doctor-meta">

            <h5 class="h5-sm darkgreen-color"><?=$value->translation->content->name?></h5>
            <span class="green-color"><?=$value->translation->content->title?></span>

            <p class="p-sm grey-color"><?=getSnippet($value->translation->content->experience,20)?> ...
            </p>

          </div>

        </div>
      </div>	<!-- END DOCTOR #1 -->

      <?php
    endforeach;
      ?>
    </div>	    <!-- End row -->


    <!-- ALL DOCTORS BUTTON -->
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="all-doctors mb-40">
          <a href="all-doctors.html" class="btn btn-orange orange-hover"><?=lang('View All')?></a>
        </div>
      </div>
    </div>


  </div>	   <!-- End container -->
</section>	<!-- END DOCTORS-1 -->
<?php
endif; // End if isset $doctors
?>
