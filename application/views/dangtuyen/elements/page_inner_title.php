<?php
/**
 *  $subpage_title
 */
?>
<!-- BREADCRUMB
============================================= -->
<div id="breadcrumb" class="division">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class=" breadcrumb-holder">

          <!-- Breadcrumb Nav -->
          <nav aria-label="breadcrumb">

              <?=$this->breadcrumbs->show()?>

          </nav>
		  
		  <?php
			  if(!isset($subpage_name))
				  $subpage_name = lang("Page name");
				  
			  	echo "
          <!-- Title --> <h4 class=\"h4-sm darkgreen-color\">".$subpage_name."</h4>";
        	  
			  ?>
          

        </div>
      </div>
    </div>  <!-- End row -->
  </div>	<!-- End container -->
</div>	<!-- END BREADCRUMB -->
