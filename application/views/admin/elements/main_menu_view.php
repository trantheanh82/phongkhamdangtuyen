 <ul class="nav navbar-nav">
	 <?php
		
		 foreach($admin_menu as $k => $items):
		 	if(empty($items->link)):
	 ?>
	 	<li class='class="dropdown'>
	 		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?=$items->name?></a>
	 		<ul class="dropdown-menu" role="menu">
		 		<?php
			 		foreach($items as $i => $submenu):
			 	?>
			 	<li>
			 		<a href="<?=site_url($submenu)?>" data-load="ajax"><?=$i?></a>
			 	</li>
			 	<?php
				 	endforeach;
				 ?>
	 		</ul>
	 	</li>
	 <?php
		 	else:
	?>
		<li><a href='<?=site_url($items->link)?>' data-load="ajax"><?=$k?> yes</a></li>
	<?php	 	
		 	endif;
		 endforeach;
	?>
	<!--	
	<li><a href="#">Contact & About us</a></li>
    <li><a href="#">Products</a></li>
    <li><a href="#">Capabilities</a></li>
    <li><a href="#">Services</a></li>
	<li><a href="#">News</a></li>
	<li class='class="dropdown'>
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Modules</a>
		<ul class="dropdown-menu" role="menu">
		    <li><a href="<?php echo site_url('admin/modules/banners'); ?>">Banners</a></li>
			<li><a href="<?php echo site_url('admin/modules/links'); ?>">Useful Links</a></li>
		    <li><a href="<?php echo site_url('admin/modules/brochuce'); ?>">Brochuce</a></li>
		    <li><a href="<?php echo site_url('admin/modules/recruitments'); ?>">Recruitments</a></li>

		</ul>
	</li>
	-->
 </ul>