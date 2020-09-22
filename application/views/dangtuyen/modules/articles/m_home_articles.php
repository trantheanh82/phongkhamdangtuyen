<?php if(!empty($items)):?>
<!-- Articles-1
============================================= -->
<section id="blog-1" class="wide-60 blog-section division">
  <div class="container">


    <!-- SECTION TITLE -->
    <div class="row">
      <div class="col-lg-10 offset-lg-1 section-title">
        <?=$content?>
      </div>
    </div>


    <!-- BLOG POSTS HOLDER -->
    <div class="row">
      <?php
      $data_wow_delay = 0.4;
        foreach($items as $k=>$v):
            $link = "";
        ?>
      <!-- BLOG POST #1 -->
      <div class="col-lg-4">
        <div class="blog-post wow fadeInUp" data-wow-delay="<?=$data_wow_delay+0.2?>s">

          <?php if(!empty($v->image)):?>
          <!-- BLOG POST IMAGE -->
          <div class="blog-post-img">
            <?=img($v->image,'',array('class'=>'img-fluid','alt'=>'blog-post-image'))?>
          </div>
          <?php endif; ?>
          <!-- BLOG POST TITLE -->
          <div class="blog-post-txt">

            <!-- Post Title -->
            <h5 class="h5-sm steelblue-color"><a href="<?=$link?>"><?=$v->translation->content->name?></a></h5>

            <!-- Post Data -->
            <span><?=date_format(date_create($v->created_at),'d/m/Y')?></span>

            <!-- Post Text -->
            <?=getSnippet($v->translation->content->description,30)?>

          </div>

        </div>
      </div>	<!-- END  BLOG POST #1 -->
      <?php
        endforeach;
      ?>
    </div>
    <!-- ALL POSTS BUTTON -->
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="all-posts-btn mb-40 wow fadeInUp" data-wow-delay="1s">
          <a href="blog-listing.html" class="btn btn-orange orange-hover"><?=lang("View more posts")?></a>
        </div>
      </div>
    </div>


  </div>	   <!-- End container -->
</section>	<!-- END Articles-1 -->
<?php endif; ?>
