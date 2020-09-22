<!-- SERVICES
============================================= -->
<?php if(!empty($items)):?>
<section id="tabs-1" class="wide-100 tabs-section division">
  <div class="container">
    <!-- SECTION TITLE -->
    <div class="row">
      <div class="col-lg-10 offset-lg-1 section-title">

        <!-- Title 	-->
        <?=$content?>

        <!-- Text -->
      </div>
    </div>	 <!-- END SECTION TITLE -->

    <div class="row">
      <div class="col-md-12">
        <!-- TABS NAVIGATION -->
        <div id="tabs-nav" class="list-group text-center">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
              <?php
              $active = "active";
                foreach($items as $k => $v):
              ?>
              <!-- TAB-1 LINK -->
              <li class="nav-item icon-xs">
                <a class="nav-link <?=$active?>" id="tab<?=$v->id?>-list" data-toggle="pill" href="#tab-<?=$v->id?>" role="tab" aria-controls="tab-1" aria-selected="true">
                  <!--<span class="flaticon-083-stethoscope"></span>--> <?=$v->translation->content->name?>
                </a>
              </li>
              <?php $active = "";
                endforeach;
              ?>

          </ul>

        </div>	<!-- END TABS NAVIGATION -->


        <!-- TABS CONTENT -->
        <div class="tab-content" id="pills-tabContent">
          <?php
          $active = 'active';
          foreach($items as $k=>$v):
                $link = "";
            ?>
          <!-- TAB-1 CONTENT -->
          <div class="tab-pane fade show <?=$active?>" id="tab-<?=$v->id?>" role="tabpanel" aria-labelledby="tab<?=$v->id?>-list">
            <div class="row d-flex align-items-center">

              <?php
                if(!empty($v->image)): ?>
              <!-- TAB-1 IMAGE -->
              <div class="col-lg-6">
                <div class="tab-img">
                  <?=img($v->image,'',array('class'=>'img-fluid','alt'=>$v->translation->content->name))?>
                </div>
              </div>
            <?php endif;?>
              <!-- TAB-1 TEXT -->
              <div class="col-lg-6">
                <div class="txt-block pc-30">

                  <!-- Title -->
                  <h3 class="h3-md green-color"><?=$v->translation->content->name?></h3>

                  <?=$v->translation->content->content?>
                  <!-- Button -->
                  <a href="<?=$link?>" class="btn btn-orange orange-hover mt-30"><?=lang('View more detail')?></a>

                </div>
              </div>	<!-- END TAB-1 TEXT -->


            </div>
          </div>	<!-- END TAB-1 CONTENT -->

        <?php
            $active = "";
            endforeach;?>
        </div>	<!-- END TABS CONTENT -->


      </div>
    </div>     <!-- End row -->
  </div>     <!-- End container -->
</section>	<!-- END SERVICES-1 -->
<?php endif;?>
