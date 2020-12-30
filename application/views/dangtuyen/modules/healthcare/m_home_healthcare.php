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
    $delay = 0.4;
      foreach($items as $k=>$v):
        $link = base_url()."goi-kham-suc-khoe/".$v->slug->slug;
    ?>
      <div class='col-lg-4 col-md-6 col-sm-6 mb-2 <?=($i%2==0)?'pl-lg-4':'pr-lg-4'?>'>
        <div class='sbox mb-5 box-shadow-dark wow fadeInUp' data-wow-delay="<?=$delay?>s">

        <?php if(!empty($v->image))
              echo '<div class="tab-img text-center">'.anchor($link,img($v->image,'',array('class'=>'img-fluid','alt'=>$v->translation->content->name))).'</div>';
        ?>
          <div class='service-title text-center'  style='font-weight:bold;'>
            <h4 class='h4-md h5-title text-uppercase'><?=anchor($link,$v->translation->content->name)?></h4>
          </div>
        </div>
      </div>
    <?php
      $i++;
      $delay += 0.2;
    endforeach;
    ?>
  </div>
</section>
<?php endif;?>
