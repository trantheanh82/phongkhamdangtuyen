<ul class="sub-menu">
  <?php
    $link = base_url().(isset($parent_slug)?$parent_slug.'/':"");
    foreach($children as $v){
      $link .= $v->slug->slug;

      echo "<li aria-haspopup=true>".anchor($link,$v->translation->content->name)."</li>";
    }

  ?>
</ul>
