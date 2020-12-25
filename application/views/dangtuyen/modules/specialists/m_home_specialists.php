<!-- SERVICES-2
============================================= -->
<section id="services-2" class="bg-lightgrey wide-70 services-section division">
  <div class="container">


    <!-- SECTION TITLE -->
    <div class="row">
      <div class="col-lg-10 offset-lg-1 section-title">
        <?=$content?>
      </div>
    </div>

<?php
  if(!empty($items)):
    $data_wow_delay = 0.4;
?>
    <div class="row">

      <?php
        $parent_link = base_url().'chuyen-khoa/';
        foreach($items as $k=>$v):
            $link = $parent_link.$v->slug->slug;
         ?>
      <!-- SERVICE BOX #1 -->
      <div class="col-sm-6 col-lg-4">
        <div class="sbox-2 wow fadeInUp" data-wow-delay="<?=$data_wow_delay?>s">
          <a href="<?=$link?>">

            <!-- Icon  -->
            <div class="sbox-2-icon icon-xl">
              <span class="<?=$v->icon?>"></span>
            </div>

            <!-- Title -->
            <h5 class="h5-sm sbox-2-title green-color"><?=$v->translation->content->name?></h5>

          </a>
        </div>
      </div>

      <?php
          $data_wow_delay += 0.2;
          if($data_wow_delay > 1)
            $data_wow_delay = 0.4;

        endforeach;?>
    </div>	   <!-- End row -->
<?php endif; ?>

  </div>	   <!-- End container -->
</section>	<!-- END SERVICES-2 -->
