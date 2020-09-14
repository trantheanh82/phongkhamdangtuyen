<?php
	pr($params);
	$bg = array('bg-aqua','bg-green','bg-red','bg-yellow');
	
?>
<div class="info-box">
	<span class="info-box-icon <?=$bg[rand(0,3)]?>"><i class="ion <?=$params['widget_icon']?>"></i></span>
	<div class="info-box-content">
	  <span class="info-box-text"><?=__($params['name'],$this)?></span>
	  <span class="info-box-number"><?=$data?></span>
	</div>
	<!-- /.info-box-content -->
</div>
<!-- /.info-box -->