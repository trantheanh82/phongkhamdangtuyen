<?php if(isset($services)):?>
<div class="blog-categories sidebar-div mb-50">
									
	<!-- Title -->
	<h5 class="h5-sm darkgreen-color"><?=lang("Services")?></h5>

  <div class='container'>
    
    <div class='row'>
      <?php 
				$parent_link = base_url().'dich-vu/';
				foreach($services as $k=>$v):
					$link = $parent_link.$v->slug->slug; 
				
				?>
				<div class='col-6 col-lg-6 col-xs-12'>
					<div class='service-1'>
						<div class="hover-overlay text-center"> 

							<!-- Photo -->
							<?=img($v->image,'',array('class'=>'img-fluid','alt'=>$v->translation->content->name))?>
							<div class="item-overlay"></div>

							<!-- Profile Link -->		
							<div class="profile-link">
								<a class="btn btn-sm btn-tra-white black-hover" href="<?=$link?>" title=""><?=lang('View more info')?></a>
							</div> 

						</div>
						<div class="service-meta">
								<a class="green-color" href="<?=$link?>"><p class='green-color mt-2'><?=$v->translation->content->name?></p></a>
						</div>
					</div>
				</div>
			<?php endforeach;?>
    </div>
  </div>

</div>
<?php endif; ?>