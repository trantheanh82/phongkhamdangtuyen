<!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
	  <?=img($this->ion_auth->user()->row()->profile_pic,false,array('onerror'=>'this.src=\''.base_url().'assets/img/default-avatar.png\'','class'=>"img-circle","alt"=>$this->ion_auth->user()->row()->first_name." ".$this->ion_auth->user()->row()->last_name))?>
    </div>
    <div class="pull-left info">
      <p><?php print_r($this->ion_auth->user()->row()->first_name." ".$this->ion_auth->user()->row()->last_name);?></p>
      <p><?php echo $this->ion_auth->user()->row()->username?></p>
      <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
    </div>
  </div>
