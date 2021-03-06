<!-- Messages: style can be found in dropdown.less-->
<?php
//notification request call
if(isset($notification_request_call) || isset($notification_contact) || isset($notification_booking)):
?>
<li>

  <a href="<?=base_url()?>clearcache"><?=lang("Refresh Page")?></a>
</li>
<li class="dropdown messages-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-envelope-o"></i>
    <span class="label<?=$notification_request_call>0 || $notification_contact>0 || $notification_booking>0?" label-success":""?>"><?=$notification_request_call+$notification_contact+$notification_booking?></span>
  </a>
  <ul class="dropdown-menu">
    <li class="header"><a href="/admin/booking"><i class='fa fa-calendar'></i><?=lang("We have")." ".$notification_booking." ".lang("new booking")?></a></li>
    <li class="header"><a href="/admin/requestcalls"><i class='fa fa-phone'></i> <?=lang("We have")." ".$notification_request_call." ".lang("request call")?></a></li>
    <li class="header"><a href="/admin/contacts"><i class='fa fa-address-card'></i><?=lang("We have")." ".$notification_contact." ".lang("new contact")?></a></li>
    <!--<li>
      <!-- inner menu: contains the actual data -->
      <!--<ul class="menu">
        <li><!-- start message -->
          <!--<a href="#">
            <div class="pull-left">
              <img src="<?=base_url()?>assets/admin/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <h4>
              Support Team
              <small><i class="fa fa-clock-o"></i> 5 mins</small>
            </h4>
            <p>Why not buy a new awesome theme?</p>
          </a>
        </li>
        <!-- end message -->
        <!--<li>
          <a href="#">
            <div class="pull-left">
              <img src="<?=base_url()?>assets/admin/img/user3-128x128.jpg" class="img-circle" alt="User Image">
            </div>
            <h4>
              AdminLTE Design Team
              <small><i class="fa fa-clock-o"></i> 2 hours</small>
            </h4>
            <p>Why not buy a new awesome theme?</p>
          </a>
        </li>
        <li>
          <a href="#">
            <div class="pull-left">
              <img src="<?=base_url()?>assets/admin/img/user4-128x128.jpg" class="img-circle" alt="User Image">
            </div>
            <h4>
              Developers
              <small><i class="fa fa-clock-o"></i> Today</small>
            </h4>
            <p>Why not buy a new awesome theme?</p>
          </a>
        </li>
        <li>
          <a href="#">
            <div class="pull-left">
              <img src="<?=base_url()?>assets/admin/img/user3-128x128.jpg" class="img-circle" alt="User Image">
            </div>
            <h4>
              Sales Department
              <small><i class="fa fa-clock-o"></i> Yesterday</small>
            </h4>
            <p>Why not buy a new awesome theme?</p>
          </a>
        </li>
        <li>
          <a href="#">
            <div class="pull-left">
              <img src="<?=base_url()?>assets/admin/img/user4-128x128.jpg" class="img-circle" alt="User Image">
            </div>
            <h4>
              Reviewers
              <small><i class="fa fa-clock-o"></i> 2 days</small>
            </h4>
            <p>Why not buy a new awesome theme?</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="footer"><a href="#">See All Messages</a></li>-->
  </ul>
</li>
<?php
endif; //notification request call
?>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu hide">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                   <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                 <li><!-- Task item -->
                   <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                 <li><!-- Task item -->
                   <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                <li><!-- Task item -->
                 <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
               </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
<!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	            <?=img(base_url().$this->ion_auth->user()->row()->profile_pic,true,array('onerror'=>'this.src=\''.base_url().'assets/img/default-avatar.png\'','class'=>"user-image","alt"=>$this->ion_auth->user()->row()->first_name.' '.$this->ion_auth->user()->row()->last_name))?>
              <!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
              <span class="hidden-xs"><?=$this->ion_auth->user()->row()->first_name.' '.$this->ion_auth->user()->row()->last_name?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
<?=img(base_url().$this->ion_auth->user()->row()->profile_pic,true,array('onerror'=>'this.src=\''.base_url().'assets/img/default-avatar.png\'','class'=>"img-circle","alt"=>$this->ion_auth->user()->row()->first_name.' '.$this->ion_auth->user()->row()->last_name))?>
                <p>
                  <?php print_r($this->ion_auth->user()->row()->first_name.' '.$this->ion_auth->user()->row()->last_name);?>
                </p>
              </li>
              <!-- Menu Body -->
              <!--<li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row
              </li>-->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <?=anchor('admin/user/profile/'.$this->ion_auth->user()->row()->id,__('Profile',$this),array('class'=>'btn btn-default btn-flat'))?>
                </div>
                <div class="pull-right">
                  <?=anchor('admin/auth/logout',__('Sign out',$this),array('class'=>'btn btn-default btn-flat'))?>
                </div>
              </li>
            </ul>
          </li>
