<?php if(!empty($sliders)):?>
<!-- HERO-2
			============================================= -->
			<section id="hero-2" class="hero-section division">


				<!-- SLIDER -->
				<div class="slider green-nav">
			    	<ul class="slides">

							<?php
								foreach($sliders as $k=>$slider):
							?>
				     	<!-- SLIDE #1 -->
				      	<li id="slide-1">

					        <!-- Background Image -->
				        	<img src="<?=base_url().$slider->translation->content->image?>" alt="slide-background">

							<!-- Image Caption -->
		       				<div class="caption d-flex align-items-center <?=$slider->text_align=="left"?"left-align":"right-align"?>">
		       					<div class="container">
		       						<div class="row">
		       							<div class="col-md-9 col-lg-9<?=$slider->text_align=="left"?"":"  offset-md-3 offset-lg-5"?>">
		       								<div class="caption-txt <?=$slider->text_color?>">
						       					<!-- Title -->
														<?php if(!empty($slider->translation->content->headline)) echo $slider->translation->content->headline?>
						       					<?php if(!empty($slider->translation->content->description)) echo $slider->translation->content->description?>
														<!-- Button -->
														<?php if(!empty($slider->translation->content->button_link)): ?>
														<a href="<?=$slider->translation->content->button_link?>" class="btn btn-green green-hover"><?=$slider->translation->content->button_text?></a>
														<?php endif; ?>
											</div>
										</div>
									</div>  <!-- End row -->
								</div>  <!-- End container -->
					        </div>	<!-- End Image Caption -->

					    </li>	<!-- END SLIDE #1 -->
						<?php endforeach; ?>

				    </ul>
			  	</div>	<!-- END SLIDER -->


			</section>	<!-- END HERO-2 -->
<?php endif; ?>
