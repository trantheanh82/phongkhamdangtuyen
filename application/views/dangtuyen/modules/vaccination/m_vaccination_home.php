<!-- TABS-1
			============================================= -->
			<section id="tabs-1" class="wide-100 tabs-section division">
				<div class="container">

          <!-- SECTION TITLE -->
          <div class="row">
            <div class="col-lg-10 offset-lg-1 section-title">

              <!-- Title 	-->
              <h3 class="h3-md darkgreen-color"><?=lang("Vaccinations")?></h3>

              <!-- Text -->
              <!--<p>Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis libero at tempus,
                 blandit posuere ligula varius congue cursus porta feugiat
              </p>-->

            </div>
          </div>	 <!-- END SECTION TITLE -->

				 	<div class="row">
				 		<div class="col-md-12">


				 			<!-- TABS NAVIGATION -->
							<div id="tabs-nav" class="list-group text-center">
							    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <?php
                        if(!empty($items)):
                          $i = 1;
                          foreach($items as $k => $v):

                    ?>
							    	<!-- TAB-1 LINK -->
								  	<li class="nav-item icon-xs">
								    	<a class="nav-link <?=$i==1?"active":""?>" id="tab1-list" data-toggle="pill" href="#tab-<?=$v->id?>" role="tab" aria-controls="tab-<?=$v->id?>" aria-selected="true">
								    		<span class="flaticon-083-stethoscope"></span> <?=$v->translation->content->name?>
								    	</a>
								  	</li>
                  <?php
                    $i=$i+1;
                endforeach;
                        endif;?>
								</ul>

							</div>	<!-- END TABS NAVIGATION -->


							<!-- TABS CONTENT -->
							<div class="tab-content" id="pills-tabContent">

                <?php if(!empty($items)):
                  $i = 1;
                          foreach($items as $k=>$v):
                            $link = "";
                            ?>
								<!-- TAB-1 CONTENT -->
								<div class="tab-pane fade show <?=$i==1?"active":""?>" id="tab-<?=$v->id?>" role="tabpanel" aria-labelledby="tab1-list">
									<div class="row d-flex align-items-center">


										<!-- TAB-1 IMAGE -->
										<div class="col-lg-6">
                      <?php if(!empty($v->image)):?>
											<div class="tab-img">
                        <?=img($v->image,'',array('class'=>'img-fluid'))?>
											</div>
                    <?php endif;?>
										</div>


										<!-- TAB-1 TEXT -->
										<div class="col-lg-6">
											<div class="txt-block pc-30">

												<!-- Title -->
												<h3 class="h3-md green-color"><?=$v->translation->content->name?></h3>

												<!-- Text -->
												<p class="mb-30"><?=strip_tags($v->translation->content->description)?>
												</p>

												<!-- Options List -->
												<div class="row">

													<div class="col-xl-6">

														<!-- Option #1 -->
														<div class="box-list">
															<div class="box-list-icon green-color"><i class="fas fa-angle-double-right"></i></div>
															<p class="p-sm">Nemo ipsam egestas volute and turpis dolores quaerat</p>
														</div>

														<!-- Option #2 -->
														<div class="box-list">
															<div class="box-list-icon blue-color"><i class="fas fa-angle-double-right"></i></div>
															<p class="p-sm">Magna luctus tempor</p>
														</div>

														<!-- Option  #3 -->
														<div class="box-list">
															<div class="box-list-icon blue-color"><i class="fas fa-angle-double-right"></i></div>
															<p class="p-sm">An enim nullam tempor at pretium purus blandit</p>
														</div>

													</div>

													<div class="col-xl-6">

														<!-- Option #4 -->
														<div class="box-list">
															<div class="box-list-icon blue-color"><i class="fas fa-angle-double-right"></i></div>
															<p class="p-sm">Magna luctus tempor blandit a vitae suscipit mollis</p>
														</div>

														<!-- Option #5 -->
														<div class="box-list">
															<div class="box-list-icon blue-color"><i class="fas fa-angle-double-right"></i></div>
															<p class="p-sm">Nemo ipsam egestas volute turpis dolores quaerat</p>
														</div>

														<!-- Option #6 -->
														<div class="box-list">
															<div class="box-list-icon blue-color"><i class="fas fa-angle-double-right"></i></div>
															<p class="p-sm">An enim nullam tempor</p>
														</div>

													</div>

												</div>	<!-- End Options List -->

												<!-- Button -->
												<a href="<?=$link?>" class="btn btn-orange orange-hover mt-30"><?=lang('Tìm hiểu thêm')?></a>

											</div>
										</div>	<!-- END TAB-1 TEXT -->


									</div>
								</div>	<!-- END TAB-1 CONTENT -->

              <?php
                  $i = $i+1;
                  endforeach; endif;?>


							</div>	<!-- END TABS CONTENT -->


			 			</div>
				 	</div>     <!-- End row -->
				</div>     <!-- End container -->
			</section>	<!-- END TABS-1 -->