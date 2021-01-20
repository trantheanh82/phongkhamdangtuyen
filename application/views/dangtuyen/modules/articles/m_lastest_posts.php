<!-- POPULAR POSTS -->
<div class="popular-posts sidebar-div mb-50 wow fadeInUp" data-wow-delay="1s">

  <!-- Title -->
  <h5 class="h5-sm darkgreen-color"><?=lang("Latest Posts")?></h5>

  <ul class="popular-posts">
    <?php foreach($lastest_posts as $k=>$v):
            $link = base_url().'tin-tuc/'.$v->category->slug->slug.'/'.$v->slug->slug.'-chi-tiet';?>
    <!-- Popular post #1 -->
    <li class="clearfix d-flex align-items-center">
      <?php
          if(isset($v->image))
              echo img($v->image,'',array('width'=>100,'alt'=>$v->translation->content->name,'class'=>'img-fluid'));
      ?>
      <!-- Text -->
      <div class="post-summary">
        <?=anchor($link,$v->translation->content->name)?>
      </div>

    </li>
  <?php endforeach;?>
  </ul>

</div>
