<!-- DOCTORS-1
============================================= -->
<section id="doctors-1" class="wide-40 doctors-section division">
  <div class="container">


    <!-- SECTION TITLE -->
    <div class="row">
      <div class="col-lg-10 offset-lg-1 section-title">

        <!-- Title 	-->
        <?=$content?>

        <!-- Text -->
      </div>
    </div>	 <!-- END SECTION TITLE -->

<?php if (!empty($items)) :?>
    <div class="row">
      <?php  foreach($items as $k=>$v):?>
      <!-- DOCTOR #1 -->
      <div class="col-md-6 col-lg-3">
        <div class="doctor-1">

          <!-- Doctor Photo -->
          <div class="hover-overlay text-center">

            <!-- Photo -->
            <?=img($v->image,'',array('class'=>'img-fluid','alt'=>lang("Dang Tuyen's Doctor").": ".$v->translation->content->name))?>
            <div class="item-overlay"></div>

            <!-- Profile Link -->
            <!--<div class="profile-link">
              <a class="btn btn-sm btn-tra-white black-hover" href="doctor-1.html" title="">View More Info</a>
            </div>-->

          </div>

          <!-- Doctor Meta -->
          <div class="doctor-meta">

            <h5 class="h5-sm darkgreen-color"><?=$v->translation->content->name?></h5>
            <span class="green-color"><?=$v->translation->content->title?></span>

            <p class="p-sm grey-color"><?=getSnippet(strip_tags($v->translation->content->experience),20)?>
            </p>

          </div>

        </div>
      </div>	<!-- END DOCTOR #1 -->
    <?php endforeach;?>




    </div>	    <!-- End row -->


    <!-- ALL DOCTORS BUTTON -->
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="all-doctors mb-40">
          <!--<a href="all-doctors.html" class="btn btn-blue blue-hover">Meet All Doctors</a>-->
          <a href="<?=base_url().'bac-si'?>" class="btn btn-orange orange-hover"><?=lang('View All')?></a>
        </div>
      </div>
    </div>

  <?php endif;?>


  </div>	   <!-- End container -->
</section>	<!-- END DOCTORS-1 -->
