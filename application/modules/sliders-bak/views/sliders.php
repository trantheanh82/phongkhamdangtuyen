<!--Slider-->
<section class="rev_slider_wrapper text-center">
<!-- START REVOLUTION SLIDER 5.0 auto mode -->
  <div id="rev_slider_full" class="rev_slider" data-version="5.0">
    <ul>
    <!-- SLIDE  -->
    <?php
		foreach($sliders as $k => $slider):
	?>
      <li data-transition="fade">
        <!-- MAIN IMAGE -->
        <!--<img src="images/banner5.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgparallax="10" class="rev-slidebg">-->
        <?php
	        echo img($slider->image,array("alt"=>$Settings['company_name'].' '.$slider->tag_line,"data-bgposition"=>"center center","data-bgfit"=>"cover", "data-bgparallax"=>"10", "class"=>"rev-slidebg"));
	        ?>
	    <?php
		    if(!empty($slider->tag_line)):
		    ?>   
        <!-- LAYER NR. 1 -->
        <div class="tp-caption tp-resizeme"
        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
        data-y="['306','250','270','150']" data-voffset="['0','0','0','0']"
        data-responsive_offset="on"
        data-visibility="['on','on','on','on']"
        data-width="none"
		data-height="none"
        data-type="text"
        data-textAlign="['center','center','center','center']"
        data-transform_idle="o:1;"
        data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
        data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
        data-start="800"><h1><?=$slider->tag_line?></h1>
        </div>
        <?php
	        endif; //end of tag_line
	        
	        if(!empty($slider->description)):
	        ?>
        <div class="tp-caption tp-resizeme"
        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
        data-y="['380','340','300','350']" data-voffset="['0','0','0','0']"
        data-responsive_offset="on"
        data-width="none"
		data-height="none"
        data-type="text"
        data-textAlign="['center','center','center','center']"
        data-visibility="['on','on','off','off']"
        data-transform_idle="o:1;"
        data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;"
        data-transform_out="opacity:0;s:1000;s:1000;"
        data-start="1500"><p>Giải pháp quản lý tổng thể giúp doanh nghiệp hoạt động hiệu quả, phát triển và bền vững hơn!
.</p>
        </div>
        <?php
	        endif; //end of description
	    ?>
	    
        <div class="tp-caption  tp-resizeme"
        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
        data-y="['470','410','350','250']" data-voffset="['0','0','0','0']"
        data-responsive_offset="on"
        data-width="none"
		data-height="none"
        data-type="text"
        data-textAlign="['center','center','center','center']"
        data-visibility="['on','on','on','on']"
        data-transform_idle="o:1;"
        data-transform_in="y:[-200%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
        data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
        data-mask_out="x:0;y:0;s:inherit;e:inherit;"
        data-start="2000">
	        <?php
		        if(!empty($slider->button_1)):
		        ?>
        <a href="<?=$slider->button_1_link?>" class="border_radius btn_common blue"><?=lang($slider->button_1)?></a>
        <?php
	        	endif;
	        	
	        	if(!empty($slider->button_2)):
	        ?>
        <a href="<?=$slider->button_2_link?>" class="border_radius btn_common yellow"><?=lang($slider->button_2)?></a>
        <?php
	        	endif;
	        ?>
        </div>
      </li>
    <?php
	    endforeach;
	?>
    </ul>
  </div><!-- END REVOLUTION SLIDER -->
</section>