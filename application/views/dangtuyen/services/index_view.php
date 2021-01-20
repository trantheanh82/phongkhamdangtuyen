<?=$this->load->view($template.'/elements/page_inner_title',array('subpage_name'=>$page_name))?>

	<!-- Chuyen khoa-7
			============================================= -->
			<section id="services-7" class="wide-70 servicess-section division">
				<div class="container">
					<div class="row">


						<!-- SERVICE BOXES -->
						<div class="col-lg-8">
							<div class="row">

								<?php
									if(!empty($items)):
										$data_wow_delay = 0.2;
											foreach($items as $k=>$v):
												if(!empty($v->link)){
													$link = base_url().'dich-vu/'.$v->link;
												}else{
													$link= base_url().'dich-vu/'.$v->slug->slug;
												}
												if(!empty($v->image))
												$img = img($v->image,'',array('class'=>'img-fluid float-left','style'=>'max-width:75px'));
								?>
								<!-- SERVICE BOX #1 -->
			 					<div class="col-md-6">
			 						<div class="sbox-7 icon-xs wow fadeInUp" data-wow-delay="<?=$data_wow_delay+=0.2?>s">
			 							<a href="<?=$link?>">
											<?php
												if(!empty($v->icon)):
											?>
				 							<!-- Icon -->
											<span class="<?=$v->icon?> green-color"></span>
										<?php endif;
										 			if(!empty($img)):
														echo $img;
										endif;?>

											<!-- Text -->
											<div class="sbox-7-txt">

												<!-- Title -->
												<h5 class="h5-sm darkgreen-color"><?=$v->translation->content->name?></h5>

												<!-- Text -->
												<p class="p-sm"><?=getSnippet(strip_tags($v->translation->content->description),17)?> ...
												</p>

											</div>

										</a>
			 						</div>
			 					</div>  <!-- END SERVICE BOX #1 -->

								<?php
										endforeach;
									endif;
								?>
	 						</div>
						</div>	<!-- END SERVICE BOXES -->



						<!-- SIDEBAR -->
						<aside id="sidebar" class="col-lg-4">

							<?=$this->load->view($template.'/modules/opening_house_view.php')?>
							<!-- TEXT WIDGET -->
							<div id="txt-widget" class="sidebar-div mb-50">
								<?=$this->load->view($template.'/modules/healthcare/m_healthcare',array('healthcares'=>$other_healthcare))?>

								<?=$this->load->view($template.'/modules/articles/m_lastest_posts',array('lastest_posts'=>$lastest_posts));?>
							</div>

						</aside>   <!-- END SIDEBAR -->

					</div>    <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END SERVICES-7 -->




			<?=$this->load->view($template.'/modules/banners/m_banner_doctors.php')?>
