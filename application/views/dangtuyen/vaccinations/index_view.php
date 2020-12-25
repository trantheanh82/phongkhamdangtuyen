<?=$this->load->view($template.'/elements/page_inner_title',array('subpage_name'=>$page_name))?>

<section id="tabs-2" class="wide-100 tabs-section division">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 col-lg-12" style="padding:20px;">
									<?=$page->translation->content->content?>
						</div>
					</div>
				 	<div class="row">
				 		<!-- TABS NAVIGATION -->
				 		<div class="col-lg-4">
							<div id="tabs-nav" class="list-group text-center clearfix">
							    <ul class="nav nav-pills" id="pills-tab" role="tablist">
										<?php
													if(!empty($items)):
														$active = true;
															foreach($items as $k=>$v):
										?>
										<li class="nav-item icon-xs">
											<a class="nav-link<?=$active?" active":""?>" id="tab<?=$v->id?>-list" data-toggle="pill" href="#tab-<?=$v->id?>" role="tab" aria-controls="tab-<?=$v->id?>" aria-selected="false">
												<?=$v->translation->content->name?>
											</a>
										</li>
									<?php $active=false;endforeach; endif;?>
								</ul>

							</div>
						</div>	<!-- END TABS NAVIGATION -->


						<!-- TABS CONTENT -->
				 		<div class="col-lg-8">
							<div class="tab-content" id="pills-tabContent">

								<?php
									if(!empty($items)):
										$active = true;
											foreach($items as $k => $v):
								?>
								<!-- TAB-1 CONTENT -->
								<div class="tab-pane fade <?=$active?" active show":""?>" id="tab-<?=$v->id?>" role="tabpanel" aria-labelledby="tab<?=$v->id?>-list">
											<?=$v->translation->content->content?>
								</div>	<!-- END TAB-1 CONTENT -->
							<?php $active=false; endforeach; endif;?>
							</div>	<!-- END TABS CONTENT -->


			 			</div>
				 	</div>     <!-- End row -->
				</div>     <!-- End container -->
			</section>



			<?=$this->load->view($template.'/modules/banners/m_banner_doctors.php')?>
