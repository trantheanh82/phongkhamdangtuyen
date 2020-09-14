<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php 
	$this->load->view('admin/elements/section_header_view');
?>
<?=content_open($page_name,$this)?>

<div class='box-body'>
	  <?php
			$this->load->view('admin/elements/ui/command_tools',array('command_tools'=>array('create'=>array('url'=>'admin/groups/create','name'=>'Group'))));
			?>
		  <table id="data" class="table table-bordered table-striped table-hover">
		    <thead>
			    <tr>
			      <th class='text-center'><?=__("ID",$this)?></th>
			      <th class='text-center'><?=__("Group name",$this)?></th>
			      <th class='text-center'><?=__("Description",$this)?></th>
			      <th class='text-center'><?=__("Operation",$this)?></th>
			      <!--<th class='text-center'><?=__("Status",$this)?></th>-->
			      <th class='text-center'><?=__("Permistions",$this)?></th>           
			    </tr>
		    </thead>
			<tbody>
				<?php
					foreach($groups as $group):
				?>
				<tr>         
				    <td><?=$group->id?></td>
				    <td><?=anchor('admin/groups/edit/'.$group->id,$group->name)?></td>
				    <td><?=$group->description?></td>
				    <td class='text-center'> 
					    <?=anchor('admin/groups/permissions/'.$group->id,'<i class="fa fa-list-alt"></i>',array('title'=>__('Permissions',$this)))?>
				    </td>
				    <td class='text-right'><?=anchor('admin/groups/edit/'.$group->id,'<i class="fa fa-edit"></i>',array('title'=>__('Edit',$this))).' '.anchor('admin/groups/delete/'.$group->id,'<i class="fa fa-trash"></i>',array('title'=>__('Delete',$this)))?></td>
				    
				    
				</tr>
				<?php
					endforeach;
					?>
			</tbody>
		  </table>
</div>
<?=content_close()?>
