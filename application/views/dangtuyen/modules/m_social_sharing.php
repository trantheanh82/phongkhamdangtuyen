<div class="post-share-list">
  <ul class="share-social-icons clearfix">	
    <?php if($Settings['social_btn_facebook']=='Y'):?>
    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?=base_url(uri_string())?>" class="share-ico ico-facebook"><i class="fab fa-facebook" aria-hidden="true"></i> <?=lang('Share')?></a></li>
    <?php
  endif;
          if($Settings['social_btn_twitter'] == 'Y'):
    ?>
    <li><a href="https://twitter.com/intent/tweet?url=<?=base_url(uri_string())?>" class="share-ico ico-twitter"><i class="fab fa-twitter" aria-hidden="true"></i> <?=lang('Twitter')?></a></li>
    <?php
  endif;
          if($Settings['social_btn_linkedin'] == 'Y'):
    ?>
    <li><a href="https://www.linkedin.com/sharing/share-offsite/?url=<?=base_url(uri_string())?>" class="share-ico ico-linkedin"><i class="fab fa-linkedin" aria-hidden="true"></i> <?=lang('Linked In')?></a></li>
  <?php endif;?>
  </ul>
</div>