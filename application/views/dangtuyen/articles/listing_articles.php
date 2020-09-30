<?php $this->load->view($template.'/elements/page_inner_title',array('subpage_name'=>$page_name));?>
<?php //pr($items) ?>
<!-- BLOG PAGE CONTENT
			============================================= -->
			<div id="blog-page" class="wide-100 blog-page-section division">
				<div class="container">
				 	<div class="row">


				 		<!-- BLOG POSTS HOLDER -->
				 		<div class="col-lg-8">
				 			<div class="posts-holder pr-30">

                <?php
                    if(!empty($items)):
                        foreach($items as $k=>$v):
                          $link = base_url().$slug_model.'/'.$item->slug->slug.'/'.$v->slug->slug.'-chi-tiet';
                ?>
				 				<!-- BLOG POST #1 --> 
				 				<div class="blog-post">
			 			      
                  <?php if(!empty($v->image)){
                          echo '
        						 			<!-- BLOG POST IMAGE -->
        						 			<div class="blog-post-img">
                          '.img($v->image,"",array("atl"=>"blog-post-image","class"=>"img-fluid")).'
        									</div>';
                        } 
                  ?>

					 				<!-- BLOG POST TITLE -->
									<div class="blog-post-txt">

										<!-- Post Title -->
										<h5 class="h5-xl darkgreen-color">
                      <?=anchor($link,$v->translation->content->name)?>
                    </h5>

										<!-- Post Data -->
										<span><?=date_format(date_create($v->created_at),'d-m-Y')?></span>

										<!-- Post Text -->
										<p><?=getSnippet(strip_tags($v->translation->content->description),30)?>
										</p>

									</div>

								</div>	<!-- END BLOG POST #1 --> 
              <?php endforeach; endif;?>


					 			<!-- BLOG POST #2 
					 			<div class="blog-post">
			 			
						 			<!-- BLOG POST IMAGE 
						 			<div class="blog-post-img">		
										<div class="video-preview text-center">				 				

							 				<!-- Change the link HERE!!! 			
											<a class="video-popup1" href="https://www.youtube.com/embed/SZEflIVnhH8">

												<!-- Play Icon 						
												<div class="video-btn play-icon-blue">	
													<div class="video-block-wrapper">
														<i class="fas fa-play"></i>
													</div>
												</div>

												<!-- Preview Image 
												<img class="img-fluid" src="images/blog/post-5-img.jpg" alt="blog-post-image" />

											</a>								 		

										</div>
									</div>

								</div>	<!-- END BLOG POST #4 -->


								<!-- BLOG PAGE PAGINATION -->
								<!--<div class="blog-page-pagination b-top">
									<nav aria-label="Page navigation">
										<ul class="pagination justify-content-center primary-theme">
	    									<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-long-arrow-alt-left"></i></a></li>
										    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
										    <li class="page-item"><a class="page-link" href="#">2</a> </li>
										    <li class="page-item"><a class="page-link" href="#">3</a></li>
										    <li class="page-item next-page"><a class="page-link" href="#"><i class="fas fa-long-arrow-alt-right"></i></a></li>
	 									</ul>	
	 								</nav>					
								</div>-->
                
                <!-- BLOG PAGE PAGINATION -->
								<div class="blog-page-pagination b-top">
									<nav aria-label="Page navigation">
										<ul class="pagination justify-content-center primary-theme">
	    									<?php echo $this->article_model->all_pages?>
	 									</ul>	
	 								</nav>					
								</div>


				 			</div>
				 		</div>	 <!-- END BLOG POSTS HOLDER -->



				 		<!-- SIDEBAR -->
						<aside id="sidebar" class="col-lg-4">

							<?=$this->load->view($template.'/modules/articles/m_categories')?>

              <?=$this->load->view($template.'/modules/articles/m_lastest_posts',array('lastest_posts'=>$lastest_posts))?>
					
					    
						</aside>	<!-- END SIDEBAR -->

				 		
				 	</div>	<!-- End row -->	
				 </div>	 <!-- End container -->
			</div>	<!-- END BLOG PAGE CONTENT -->