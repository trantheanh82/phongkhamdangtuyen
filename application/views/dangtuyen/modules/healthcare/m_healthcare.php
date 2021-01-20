<?php if(isset($healthcares)):?>
	<div class="popular-posts sidebar-div mb-50 wow fadeInUp"  data-wow-delay="0.8s">

	  <!-- Title -->
	  <h5 class="h5-sm darkgreen-color"><?=lang("Health Cares")?></h5>

	  <ul class="popular-posts">
	    <?php foreach($other_healthcare as $k=>$v):
	            $link = base_url().'dich-vu/chuyen-khoa/'.$v->slug->slug;?>
	    <!-- Popular post #1 -->
	    <li class="clearfix d-flex align-items-center">
	      <?php
	          if(isset($v->image))
	              echo img($v->image,'',array('width'=>50,'alt'=>$v->translation->content->name,'class'=>'img-fluid'));
	      ?>
	      <!-- Text -->
	      <div class="post-summary">
	        <?=anchor($link,$v->translation->content->name)?>
	      </div>

	    </li>
	  <?php endforeach;?>
	  </ul>

	</div>
<?php endif; ?>
