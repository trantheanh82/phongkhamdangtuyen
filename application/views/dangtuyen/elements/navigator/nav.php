<!-- MAIN MENU -->
  <nav class="wsmenu clearfix">
    <ul class="wsmenu-list">
      <?php
      foreach($main_menu as $menu):
      ?>
      <li aria-haspopup="true"><a href="<?=$menu->link?>"><?=$menu->translation->content->name?> <?=!empty($menu->children)?'<span class="wsarrow"></span>':''?></a>
          <?php
            if(!empty($menu->children)):
                $this->load->view($template.'/elements/navigator/'.$menu->type,array('parent_slug'=>$menu->slug->slug,'children'=>$menu->children));
            endif;
          ?>
      </li>
      <?php
    endforeach;
      ?>

      <!-- DROPDOWN MENU -->
      <!--<li aria-haspopup="true"><a href="#">Home <span class="wsarrow"></span></a>

      </li>	-->
        <!-- END DROPDOWN MENU -->


        <!-- PAGES -->
      <!--  <li aria-haspopup="true"><a href="#">Pages <span class="wsarrow"></span></a>

    </li>	--> <!-- END PAGES -->


        <!-- HALF MENU -->
      <!--  <li aria-haspopup="true"><a href="#">Half Menu <span class="wsarrow"></span></a>

      </li>	--><!-- END HALF MENU -->


        <!-- MEGAMENU -->
        <!--<li aria-haspopup="true"><a href="#">Mega Menu <span class="wsarrow"></span></a>

    </li>	--><!-- END MEGAMENU -->


    <!-- SIMPLE NAVIGATION LINK -->
    <!--<li class="nl-simple" aria-haspopup="true"><a href="#">Simple Link</a></li>-->

    <!-- HIDDEN NAVIGATION MENU BUTTON -->
    <!--<li class="nl-simple header-btn" aria-haspopup="true">
      <?=anchor('/bookingappointments',"<i class=\"flaticon-007-calendar-3\" aria-hidden=\"true\"></i> ".lang('Book an appointment'))?></li>-->
    </ul>

  </nav>	<!-- END MAIN MENU -->

  <!-- NAVIGATION MENU BUTTON -->
  <!--<div class="header-button">
    <span class="nl-simple header-btn orange-hover">
 <?=anchor('/bookingappointments',"<i class=\"flaticon-007-calendar-3\" aria-hidden=\"true\"></i> ".lang('Book an appointment'))?>
      </span>
  </div>-->
