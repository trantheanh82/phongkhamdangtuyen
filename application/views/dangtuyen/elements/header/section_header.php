<!-- HEADER
			============================================= -->
			<header id="header-2" class="header">


				<!-- MOBILE HEADER -->
			    <div class="wsmobileheader clearfix">
			    	<a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
			    	<span class="smllogo">
              <?=img($Settings['company_logo_2'],'', array('height'=>'44px','alt'=>$Settings['company_name'],'class'=>'img-responsive'))?>
            </span>
			    	<a href="return false;" class="searchbtn"><i class="fas fa-search"></i></a>
			 	</div>


			  	<!-- HEADER WIDGETS -->
			 	<div class="hero-widget clearfix">
			 		<div class="container">
			 			<div class="row d-flex align-items-center">
				       <!-- LOGO IMAGE -->
		    				<!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 360 x 80 pixels) -->
		    				<div class="col-md-5 col-xl-7">
		    					<div class="desktoplogo"><a href="<?=base_url()?>">
                    <?=img($Settings['company_logo'], '', array('height'=>45,'alt'=>$Settings['company_name']))?>
                  </a></div>
		    				</div>

				     		<!-- WIDGETS -->
						    <div class="col-md-7 col-xl-5">
						    	<div class="row">

						    		<!-- Emergency Cases Widget
						    		<div class="col-md-6">
						    			<div class="header-widget icon-xs">
						    				<span class="flaticon-039-emergency-call-1 blue-color"></span>
							    			<div class="header-widget-txt">
								    			<p>Emergency Cases</p>
												<p class="header-widget-phone steelblue-color">1-800-123-4560</p>
											</div>
						    			</div>
						    		</div>-->

						    		<!-- Working Hours Widget -->
						    		<!--<div class="col-md-6">
						    			<div class="header-widget icon-xs">
						    				<span class="flaticon-092-clock blue-color"></span>
							    			<div class="header-widget-txt">
								    			<p class="txt-400">Thời gian làm việc</p>
													<p class="txt-400">Thứ 2 - CN | 6:00 - 19:00</p>
								    			<!--<p class="lightgrey-color"></p>-->
								    		<!--</div>
						    			</div>
						    		</div>-->

						    		<!-- Location Widget -->
						    		<div class="col-md-12">
						    			<div class="header-widget icon-xs">
						    				<span class="flaticon-021-hospital-9 green-color"></span>
							    			<div class="header-widget-txt">
								    			<p class="txt-400"><?=lang('Address').$Settings['address']?></p>

									    			<p class="txt-400"><?=lang('Address 2').$Settings['company_address_1']?></p>
												<!--<p class="lightgrey-color">Victoria 3000 Australia</p>-->
											</div>
						    			</div>
						    		</div>

						    	</div>
					      	</div>	<!-- END WIDGETS -->

				      	</div>
				    </div>
			  	</div>	<!-- END HEADER WIDGETS -->


			  	<!-- NAVIGATION MENU -->
			  	<div class="wsmainfull menu clearfix">
    				<div class="wsmainwp clearfix">

    					<!-- LOGO IMAGE -->
    					<!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 360 x 80 pixels) -->
    					<div class="desktoplogo"><a href="<?=base_url()?>">                    <?=img($Settings['company_logo_2'], '', array('height'=>44,'alt'=>$Settings['company_name']))?>
</a></div>

    					<?=$this->load->view($template.'/elements/navigator/nav', array('main_menu'=>$main_menu))?>

    				</div>
    			</div>	<!-- END NAVIGATION MENU -->


			</header>	<!-- END HEADER -->
