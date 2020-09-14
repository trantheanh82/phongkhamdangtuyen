<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	$this->load->view('admin/elements/section_header_view');
?>
<?=content_open($page_name,$this)?>			
		<!-- /.box-header -->
		<div class="box-body">
			<div class='row'>
			    <div class="col-lg-12">
			      <a href="<?php echo site_url('admin/users/create');?>" class="btn btn-primary">Create user</a>
			    </div>
				<div class="col-lg-12" style="margin-top: 10px;">
				    <?php
				    if(!empty($users))
				    {
				      echo '<table id="data" class="table table-hover table-bordered table-condensed">';
				      echo '<thead><tr><th>ID</th><th>Username</th><th>Name</th><th>Email</th><th>Last login</th><th>Operations</th></tr></thead>';
				      echo '<tbody>';
				      foreach($users as $user)
				      {
				        echo '<tr>';
				        echo '<td>'.$user->id.'</td><td>'.$user->username.'</td><td>'.$user->first_name.' '.$user->last_name.'</td></td><td>'.$user->email.'</td><td>'.date('Y-m-d H:i:s', $user->last_login).'</td><td>';
				        if($current_user->id != $user->id) echo anchor('admin/users/edit/'.$user->id,'<span class="glyphicon glyphicon-pencil"></span>').' '.anchor('admin/users/delete/'.$user->id,'<span class="glyphicon glyphicon-remove"></span>');
				        else echo '&nbsp;';
				        echo '</td>';
				        echo '</tr>';
				      }
				      echo '</tbody>';
				      echo '</table>';
				    }
				    ?>
				</div>
			</div>
		</div>
<?=content_close()?>