<?php
  echo $this->load->view($template.'/elements/page_inner_title');
?>
        <!-- Latest News Start Here -->
        <div class="latest-news-area">
            <div class="container">
                <div class="row">
                    <!-- Content Start Here -->
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="news-layout-1">
                          <?php
                              if(!empty($items)):
                                foreach($items as $k=>$v):
                                  $link = base_url().$current_lang['slug'].'/'.$slug_model.'/'.$item->slug->slug.'/'.$v->slug->slug.'-chi-tiet';
                          ?>
                          <div class="single-item">
                              <div class="item-image">
                                  <?=anchor($link,img(base_url().$v->image,array('class'=>'img-responsive','alt'=>$v->translation->content->name)));?>
                                  <!--<div class="date"><?=date_format(date_create($v->created_at),'d')?><span><?=date_format(date_create($v->created_at),'m')?></span></div>-->
                              </div>
                              <div class="item-container">
                                  <h3>
                                    <?=anchor($link,$v->translation->content->name)?>
                                  </h3>
                                  <?=$v->translation->content->description?>
                                  <?=anchor($link,lang("Read More").'<i class="fa fa-angle-right" aria-hidden="true"></i>',array('class'=>'btn-default-black'))?>
                              </div>
                          </div>
                          <?php
                                endforeach;
                              endif;
                          ?>


                            <div class="pagination-wrapper">
                                <ul class="pagination">
                                    <?php echo $this->article_model->all_pages?>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <!-- Content End Here -->

                    <?php echo $this->load->view($template.'/elements/modules/m_right_sidebar',array(
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
