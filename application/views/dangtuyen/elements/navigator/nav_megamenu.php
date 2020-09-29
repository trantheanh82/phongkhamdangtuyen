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
                foreach($children as $k=>$v):
                    $link = "";
                    echo "<li>".anchor($link,$v->translation->content->name)."</li>";
                endforeach;
            ?>
        </ul>
      <?php endif;
      ?>


        <!-- MEGAMENU FEATURED NEWS -->
        <div class="col-lg-5 col-md-12 col-xs-12">

          <!-- Title -->
            <h3 class="title darkgreen-color">Featured News:</h3>

            <!-- Image -->
            <div class="fluid-width-video-wrapper"><img src="<?=base_url().'assets/'.$template?>/images/blog/featured-news.jpg" alt="featured-news" /></div>

            <!-- Text -->
            <h5 class="h5-xs"><a href="#">5 Benefits of integrative medicine</a></h5>
            <p class="wsmwnutxt">Porta semper lacus cursus, feugiat primis ultrice in ligula risus auctor
               tempus feugiat dolor impedit magna purus at pretium gravida donec
            </p>

        </div>	<!-- END MEGAMENU FEATURED NEWS -->


        <!-- MEGAMENU LATEST NEWS -->
        <div class="col-lg-4 col-md-12 col-xs-12">

          <!-- Title -->
            <h3 class="title darkgreen-color">Latest News:</h3>

            <!-- Latest News -->
            <ul class="latest-news">

    <!-- Post #1 -->
    <li class="clearfix d-flex align-items-center">

      <!-- Image -->
      <img class="img-fluid" src="<?=base_url().'assets/'.$template?>/images/blog/latest-post-1.jpg" alt="blog-post-preview" />

      <!-- Text -->
      <div class="post-summary">
        <a href="single-post.html">Etiam sapien risus ante auctor tempus accumsan an empor ...</a>
        <p>43 Comments</p>
      </div>

    </li>

    <!-- Post #2 -->
    <li class="clearfix d-flex align-items-center">

      <!-- Image -->
      <img class="img-fluid" src="<?=base_url().'assets/'.$template?>/images/blog/latest-post-2.jpg" alt="blog-post-preview" />

      <!-- Text -->
      <div class="post-summary">
        <a href="single-post.html">Blandit tempor a sapien ipsum, porta risus auctor justo ...</a>
        <p>38 Comments</p>
      </div>

    </li>

    <!-- Post #3 -->
    <li class="clearfix d-flex align-items-center">

      <!-- Image -->
      <img class="img-fluid" src="<?=base_url().'assets/'.$template?>/images/blog/latest-post-3.jpg" alt="blog-post-preview" />

      <!-- Text -->
      <div class="post-summary">
        <a href="single-post.html">Cursus risus auctor tempus risus laoreet turpis auctor varius ...</a>
        <p>29 Comments</p>
      </div>

    </li>
  </ul>
          </div>	<!-- END MEGAMENU LATEST NEWS -->


      </div>  <!-- End row -->
  </div>  <!-- End container -->
</div>  <!-- End wsmegamenu -->
