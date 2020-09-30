<div class="wsmegamenu clearfix">
  <div class="container">
      <div class="row">
        <?php
            if(isset($children)):
        ?>
        <!-- MEGAMENU QUICK LINKS -->
        <ul class="col-lg-3 col-md-12 col-xs-12 link-list">
            <li class="title  darkgreen-color"><?=lang('Categories')?></li>
            <?php

                foreach($children->items as $k=>$v):
                    $link = base_url().'tin-tuc/'.$v->slug->slug;
                    echo "<li>".anchor($link,$v->translation->content->name)."</li>";
                endforeach;
            ?>
        </ul>
      <?php endif;

      ?>


        <!-- MEGAMENU FEATURED NEWS -->
        <div class="col-lg-5 col-md-12 col-xs-12">
          <?php
            if(isset($children->feature_post)):
          ?>
          <!-- Title -->
            <h3 class="title darkgreen-color"><?=lang("Featured Posts")?>:</h3>

            <!-- Image -->
            <?php
              if(isset($children->feature_post->image)):
            ?>
            <div class="fluid-width-video-wrapper"><?=img($children->feature_post->image,'',array('class'=>'img-fluid','alt'=>$Settings['company_name'].': '.$children->feature_post->translation->content->name))?></div>
            <?php
          endif;
            ?>
            <!-- Text -->
            <h5 class="h5-xs">
              <?=anchor(base_url().'tin-tuc/'.$children->feature_post->parent_category->slug->slug,$children->feature_post->translation->content->name)?></h5>
            <p class="wsmwnutxt">
              <?=getSnippet(strip_tags($children->feature_post->translation->content->description),20)?>
            </p>
            <?php
          endif;?>

        </div>	<!-- END MEGAMENU FEATURED NEWS -->


        <!-- MEGAMENU LATEST NEWS -->
        <div class="col-lg-4 col-md-12 col-xs-12">
          <?php
            if(isset($children->lastest_posts)):
          ?>
          <!-- Title -->
            <h3 class="title darkgreen-color"><?=lang("Lastest Posts")?>:</h3>

            <!-- Latest News -->
            <ul class="latest-news">
              <?php
                  foreach($children->lastest_posts as $k=>$v):
                      $link = base_url().'tin-tuc/'.$v->category->slug->slug.'/'.$v->slug->slug;
              ?>
            <!-- Post #1 -->
            <li class="clearfix d-flex align-items-center">

              <?=img($v->image,'',array('with'=>100,'class'=>'img-fluid','alt'=>$Settings['company_name'].': '.$v->translation->content->name))?>

              <!-- Text -->
              <div class="post-summary">
                <?=anchor($link,getSnippet(strip_tags($v->translation->content->name,9)).' ...')?>
                </div>

            </li>
            <?php
                endforeach;
            ?>
          </ul>
        <?php endif;?>
        </div>	<!-- END MEGAMENU LATEST NEWS -->


      </div>  <!-- End row -->
  </div>  <!-- End container -->
</div>  <!-- End wsmegamenu -->
