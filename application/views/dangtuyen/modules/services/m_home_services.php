<!-- SERVICES
============================================= -->
<?php if(!empty($items)):?>
<section id="tabs-1" class="wide-100 tabs-section division">
  <div class="container">
    <?php if(isset($content)):?>
    <!-- SECTION TITLE -->
    <div class="row">
      <div class="col-lg-10 offset-lg-1 section-title">

        <!-- Title 	-->
        <?=$content?>

        <!-- Text -->
      </div>
    </div>	 <!-- END SECTION TITLE -->
  <?php endif;?>
  <div class="row">
    <?php
    $i = 1;
      foreach($items as $k=>$v):
        $link = base_url()."dich-vu/".$v->slug->slug;
    ?>
      <div class='col-lg-6 col-md-6 mb-2 <?=($i%2==0)?'pl-lg-4':'pr-lg-4'?>'>
        <div class='sbox mb-5 box-shadow-dark'>

        <?php if(!empty($v->image))
              echo '<div class="tab-img">'.img($v->image,'',array('class'=>'img-fluid','alt'=>$v->translation->content->name)).'</div>';
        ?>
          <div class='service-title'  style='font-weight:bold;'>
            <h4 class='h4-md h5-title text-uppercase'><?=anchor($link,$v->translation->content->name)?></h4>
          </div>
        </div>
      </div>
    <?php
      $i++;
    endforeach;
    ?>
  </div>
</section>
<?php endif;?>