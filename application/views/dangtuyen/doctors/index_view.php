<?=$this->load->view($template.'/elements/page_inner_title',array('subpage_name'=>$page_name))?>
<!-- DOCTORS-3
			============================================= -->
			<section id="doctors-3" class="bg-lightgrey wide-60 doctors-section division">
				<div class="container">
					<div class="row">

            <?php foreach($items as $k=>$v):?>
						<!-- DOCTOR #1 -->
						<div class="col-md-6 col-lg-4">
							<div class="doctor-2">	

								<!-- Doctor Photo -->
								<div class="hover-overlay"> 
                  <?=img($v->image,'',array('alt'=>lang('Doctors').' '.$v->translation->content->name,'class'=>'img-fluid'))?>
								</div>								
														
								<!-- Doctor Meta -->		
								<div class="doctor-meta">

									<h5 class="h5-xs darkgreen-color"><?=$v->translation->content->name?></h5>
									<span class='green-color'><?=$v->translation->content->title?></span>

									<!-- Button -->
									<a class="btn btn-sm btn-orange orange-hover mt-15" href="doctor-1.html" title=""><?=lang('VIEW INFO')?></a>

								</div>	

							</div>								
						</div>	<!-- END DOCTOR #1 -->
						
          <?php endforeach;?>


					</div>	    <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END DOCTORS-3 -->