<?php if(isset($categories)):?>
<!-- BLOG CATEGORIES --> 
<div class="blog-categories sidebar-div mb-50">
    
  <!-- Title -->
  <h5 class="h5-sm darkgreen-color"><?=lang('Categories')?></h5>

  <ul class="blog-category-list clearfix">
    <?php
          foreach($categories as $k=>$v):
              $link = base_url().$current_lang['slug'].'/'.$slug_model.'/'.$v->slug->slug;?>
    <li><a href=<?=$link?>><i class="fas fa-angle-double-right green-color"></i> <?=$v->translation->content->name?></a> </li>
    
    <?php endforeach;?>
  </ul>

</div>
<?php endif; ?>