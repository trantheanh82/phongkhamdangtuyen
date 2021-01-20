<ul class="sub-menu">
  <?php
    $parent_link = base_url().(isset($parent_slug)?$parent_slug.'/':"");
    foreach($children as $v){
      $link = $parent_link.$v->slug->slug;
      $menu =  "<li aria-haspopup=true>";
      $menu .= anchor($link,$v->translation->content->name);

      if(!empty($v->services)){
        $menu .= "<ul class='sub-menu'>";

        foreach($v->services as $service_key => $service_value){
            $sublink = $parent_link.$v->slug->slug.'/'.$service_value->slug->slug;
            $menu .= "<li>
            ".anchor($sublink,$service_value->translation->content->name)."
            </li>";
          }
        $menu .= "</ul>";

      }
      $menu .= "</li>";
      echo $menu;
    }
  ?>
</ul>
