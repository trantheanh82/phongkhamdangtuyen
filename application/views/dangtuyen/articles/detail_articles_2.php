<?php

  echo $this->load->view($template.'/elements/modules/page_inner_title');
?>
<!-- Latest News Start Here -->
        <div class="latest-news-area">
            <div class="container">
                <div class="row">
                    <!-- Content Start Here -->
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="news-details-layout">
                            <div class="item-img-holder">
                                <center><?=img($item->image,'',array('class'=>'img-responsive','alt'=>$item->translation->content->name))?><center>
                            </div>
                            <div class="item-header">
                                <ul class="item-info">
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i><?=date_format(date_create($item->created_at),'d-m-Y')?></li>
                                    <!--<li><i class="fa fa-user" aria-hidden="true"></i><a href="#">by admin</a></li>
                                    <li><i class="fa fa-tag" aria-hidden="true"></i><a href="#">Business</a></li>
                                    <li><i class="fa fa-comment-o" aria-hidden="true"></i><a href="#">02 Comments</a></li>-->
                                </ul>
                                <h2><?=$item->translation->content->name?></h2>
                            </div>
                            <div class="item-fulltext">

                                <?=$item->translation->content->content?>

                                <div class="item-links fi-clear">
                                  <?php
                                  if(!empty($item->translation->tags)):
                                  ?>
                                    <ul class="item-tags">
                                      <li><span><?=lang('Tags')?>:</span></li>
                                      <?php
                                      $link = base_url().'tags/';
                                        foreach($item->translation->tags as $k=>$t):
                                      ?>
                                        <li><?=$t?>,</li>
                                        <?php
                                      endforeach;
                                      ?>
                                    </ul>
                                    <?php
                                  endif;
                                  if($Settings['enabled_social_sharing'] == 'Y'){
                                    echo $this->load->view($template.'/elements/modules/social_sharing');
                                  }
                                    ?>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Content End Here -->
                    <?=$this->load->view($template.'/elements/modules/m_right_sidebar',array(
                      'show_categories'=>$this->load->view($template.'/elements/modules/articles/m_category_articles','',TRUE),
                    'latest_news'=>$this->load->view($template.'/elements/modules/articles/m_latest_news','',TRUE)))?>
                </div>
            </div>
        </div>
        <!-- Latest News End Here -->
        <!-- Waste More time Start Here -->
        <!--<div class="waste-time-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="waste-time-content">
                            <h3>Waste No More Time!</h3>
                            <p>Rimply dummy text of the printing and typesetting industry Ipsum has been the industry's.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="waste-time-button">
                            <a href="#" class="btn btn-default btn-rounded">Get a Quote <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- Waste More time End Here -->
