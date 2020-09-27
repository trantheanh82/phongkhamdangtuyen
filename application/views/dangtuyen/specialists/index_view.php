<?=$this->load->view($template.'/elements/page_inner_title',array('subpage_name'=>$page->translation->content->name))?>

	<!-- Chuyen khoa-7
			============================================= -->
			<section id="services-7" class="wide-70 servicess-section division">
				<div class="container">
					<div class="row">


						<!-- SERVICE BOXES -->
						<div class="col-lg-8">
							<div class="row">

								<?php
									if(!empty($specialists)):
										$data_wow_delay = 0.2;
											foreach($specialists as $k=>$v):

												$link= base_url().$page->slug->slug.'/'.$v->slug->slug;
								?>
								<!-- SERVICE BOX #1 -->
			 					<div class="col-md-6">
			 						<div class="sbox-7 icon-xs wow fadeInUp" data-wow-delay="<?=$data_wow_delay+=0.2?>s">
			 							<a href="<?=$link?>">

				 							<!-- Icon -->
											<span class="<?=$v->icon?> green-color"></span>

											<!-- Text -->
											<div class="sbox-7-txt">

												<!-- Title -->
												<h5 class="h5-sm darkgreen-color"><?=$v->translation->content->name?></h5>

												<!-- Text -->
												<p class="p-sm"><?=getSnippet($v->translation->content->description,17)?> ...
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


						<!-- INFO TABLE -->
						<div class="col-lg-4">
							<div class="services-7-table green-table mb-30 wow fadeInUp" data-wow-delay="0.6s">

								<!-- Title -->
								<h4 class="h4-xs">Opening Hours:</h4>

								<!-- Text -->
								<p class="p-sm">Porta semper lacus cursus and feugiat primis ultrice ligula risus auctor
								   tempus feugiat and dolor lacinia cursus
								</p>

								<!-- Table -->
								<table class="table">
									<tbody>
									    <tr>
									      	<td>Mon – Wed</td>
									      	<td> - </td>
									      	<td class="text-right">9:00 AM - 7:00 PM</td>
									    </tr>
									    <tr>
									      	<td>Thursday</td>
									      	<td> - </td>
									      	<td class="text-right">9:00 AM - 6:30 PM</td>
									    </tr>
									     <tr>
									      	<td>Friday</td>
									      	<td> - </td>
									      	<td class="text-right">9:00 AM - 6:00 PM</td>
									    </tr>
									    <tr class="last-tr">
									      	<td>Sun - Sun</td>
									      	<td>-</td>
									      	<td class="text-right">CLOSED</td>
									   	 </tr>
									  </tbody>
								</table>

								<!-- Title -->
								<h5 class="h5-sm">Need a personal health plan?</h5>

								<!-- Text -->
								<p class="p-sm">Porta semper lacus cursus, and feugiat primis ultrice ligula at risus auctor</p>

							</div>
						</div>	<!-- END INFO TABLE -->


					</div>    <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END SERVICES-7 -->




			<?=$this->load->view($template.'/modules/banners/m_banner_doctors.php')?>
