<?php $this->load->view($template.'/elements/page_inner_title',array('subpage_name'=>$page_name));?>

<!-- BLOG PAGE CONTENT
			============================================= -->
			<div id="single-blog-page" class="wide-100 blog-page-section division">
				<div class="container">
				 	<div class="row">


				 		<!-- SINGLE POST -->
				 		<div class="col-lg-8">
					 		<div class="single-blog-post pr-30">

				 			  <?php if(isset($item->image)):?>
					 			<!-- BLOG POST IMAGE -->
					 			<div class="blog-post-img mb-40">
                  <?=img($item->image,'',array('class'=>'img-fluid','alt'=>$Settings['company_name'].': '.$item->translation->content->name))?>
								</div>	
              <?php endif;?>


								<!-- BLOG POST TEXT -->
								<div class="sblog-post-txt">

									<!-- Post Title -->
									<h4 class="h4-lg steelblue-color"><?=$item->translation->content->name?></h4>

									<!-- Post Data -->
									<span><?=date_format(date_create($item->created_at),'d-m-Y')?></span>

									<?=$item->translation->content->content?>

									<!-- BLOG POST SHARE LINKS -->
									<div class="post-share-links">

										<!-- POST TAGS -->
									<!--	<div class="post-tags-list">
											<span><a href="#">Effective Treatment</a></span>	
											<span><a href="#">Research</a></span>
											<span><a href="#">Diagnostic</a></span>										
										</div>-->

										<!-- POST SHARE ICONS -->
                    <?php
                    if($Settings['enabled_social_sharing'] == 'Y'){
                      echo $this->load->view($template.'/modules/m_social_sharing');
                    }
                    ?>
										

									</div>	<!-- END BLOG POST SHARE -->
									

								</div>	<!-- END BLOG POST TEXT -->


								

				 			</div>
				 		</div>	 <!-- END SINGLE POST -->				 		


				 		<!-- SIDEBAR -->
						<aside id="sidebar" class="col-lg-4">


              <?=$this->load->view($template.'/modules/articles/m_categories')?>

              <?=$this->load->view($template.'/modules/articles/m_lastest_posts',array('lastest_posts'=>$lastest_posts))?>


						</aside>	<!-- END SIDEBAR -->

				 		
				 	</div>	<!-- End row -->	
				 </div>	 <!-- End container -->
			</div>	<!-- END BLOG PAGE CONTENT -->
