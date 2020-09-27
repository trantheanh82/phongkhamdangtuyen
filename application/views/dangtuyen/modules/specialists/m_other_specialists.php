<?php if(isset($other_specialists)):?>
<div class="blog-categories sidebar-div mb-50">

	<!-- Title -->
	<h5 class="h5-sm darkgreen-color"><?=lang("Other Specialists")?></h5>

	<ul class="blog-category-list clearfix">
    <?php
        $parent_link = base_url().$page->slug->slug.'/';
        foreach($other_specialists as $k=>$v):
          $link = $parent_link.$v->slug->slug;
    ?>
		<li><a href="<?=$link?>" class='darkgreen-color'><i class="fas <?=$v->icon?> green-color"></i> <?=$v->translation->content->name?></a> </li>
    <?php
        endforeach;
    ?>
	</ul>

</div>
<?php endif;?>
