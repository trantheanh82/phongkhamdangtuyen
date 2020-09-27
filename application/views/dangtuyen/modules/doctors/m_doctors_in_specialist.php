<?php
  if(isset($doctors)):
?>
<!-- TEXT WIDGET -->
<div id="txt-widget" class="sidebar-div mb-50">

  <!-- Title -->
  <h5 class="h5-sm darkgreen-color"><?=lang('Our Medical Specialists')?></h5>
  <?php
      foreach($doctors as $k=>$v):
  ?>
  <!-- Head of Clinic -->
  <div class="txt-widget-unit mb-15 clearfix d-flex align-items-center">
  
    <!-- Avatar -->
    <div class="txt-widget-avatar">
      <?=img($v->image,'',array('alt'=>lang("Doctor of ").$Settings['company_name']))?>
    </div>

    <!-- Data -->
    <div class="txt-widget-data">
      <h5 class="h5-md darkgreen-color"><?=$v->translation->content->name?></h5>
      <span class='green-color'><?=$v->translation->content->title?></span>
    </div>

  </div>	<!-- End Head of Clinic -->
  <?php
endforeach;
  ?>

</div>	<!-- END TEXT WIDGET -->
<?php
endif;
?>
