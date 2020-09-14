<?php
	
	$data = statistics($course_id);
?>

<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="info-box">
    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

    <div class="info-box-content">
      <span class="info-box-text"><?=__('Total Student',$this)?></span>
      <span class="info-box-text"><?=__('Course',$this).' '.$data['course']->name?></span>
      <span class="info-box-number"><?=$data['total_student']?></span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<!-- /.col -->

<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="info-box">
    <span class="info-box-icon bg-red"><i class="fa fa-usd"></i></span>

    <div class="info-box-content">
      <span class="info-box-text"><?=__('Total Amount',$this)?></span>
      <span class="info-box-text"><?=__('Course',$this).' '.$data['course']->name?></span>
      <span class="info-box-number currency"><?=$data['pay_amount']?></span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class="clearfix visible-sm-block"></div>

<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="info-box">
    <span class="info-box-icon bg-green"><i class="fa fa-asterisk"></i></span>

    <div class="info-box-content">
      <span class="info-box-text"><?=__('Total Dept',$this)?></span>
      <span class="info-box-text"><?=__('Course',$this).' '.$data['course']->name?></span>
      <span class="info-box-number currency"><?=$data['dept']?></span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<!-- /.col -->
<!--
<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="info-box">
    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">New Members</span>
      <span class="info-box-number">2,000</span>
    </div>
    <!-- /.info-box-content 
  </div>
  <!-- /.info-box
</div>
<!-- /.col -->