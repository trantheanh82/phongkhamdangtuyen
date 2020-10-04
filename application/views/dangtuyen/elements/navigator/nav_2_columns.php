<div class="wsmegamenu clearfix halfmenu">
    <div class="container-fluid">
      <div class="row">
        <?php
        $i = 0;
        $parent_link = base_url().(isset($parent_slug)?$parent_slug.'/':"");
        $number_of_elements =  count((array)$children);
          foreach($children as $v):

            $link = $parent_link.$v->slug->slug;

            if($i == 0){
              echo '<!-- Links --><ul class="col-lg-6 col-md-12 col-xs-12 link-list">';
            }
            echo "<li>".anchor($link,"<i class='flaticon-060-cardiogram-4 green-color'></i> ".$v->translation->content->name)."</li>";

            $i++;
            if($i>=($number_of_elements/2)){
              echo "</ul>";
              $i=0;
            }

          endforeach;
        ?>
      </div>
    </div>
</div>
