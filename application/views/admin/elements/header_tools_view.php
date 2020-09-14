<div class='btn-bar btn-toolbar dropleft pull-right'  >
<?php
	
	if($action == 'index'):
?>

		<div class='btn-group '>
			<button type='button' class='btn btn-primary dropdown-toggle cmd-create' data-toggle="dropdown" aria-expanded="false">
		      <i class="glyphicon glyphicon-plus-sign"></i> <?=__('Create',$this);?>
		    </button>
		    <!--
		    <ul class="dropdown-menu" role="menu">
                <li><a href=''>ABC</a></li>
                <li><a href=''>ABC</a></li>
                <li><a href=''>ABC</a></li>
            </ul>
            -->
		</div>
		
		<!--<a type='button' class='btn btn-info pull-right'>
	      <i class="glyphicon glyphicon-edit"></i> Unactive
	    </a>
			    
		<a type='button' class='btn btn-info pull-right'>
	      <i class="glyphicon glyphicon-edit"></i> Active
	    </a>-->
<?php
	elseif($action == 'create'):
?>
			<button type='button' class='btn btn-info btn-primary cmd-save'>
		      <i class="glyphicon glyphicon-save"></i>
		      Save
		    </button>
			<button type='button' class='btn btn-info cmd-cancel'>
				Cancel
		    </button>
	
<?php
	elseif($action == 'edit'):
?>
	<div class='adv-buttons col-md-5'>
		<div class='text-right'>
			<button type='button' class='btn btn-info cmd-save'>
		      <i class="glyphicon glyphicon-save"></i> Save
		    </button>
		</div>
	</div>
	
	<div class='adv-buttons col-md-5'>
		<div class='text-right'>
			<button type='button' class='btn btn-info cmd-cancel'>Cancel
		    </button>
		</div>
	</div>
<?php
	else:
?>
		<button type='button' class='btn btn-info cmd-create'>
	      <i class="glyphicon glyphicon-plus"></i> Create
	    </button>
<?php
	endif;
?>
</div