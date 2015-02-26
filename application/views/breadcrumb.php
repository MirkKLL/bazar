      <div class="container">
         <ol class="breadcrumb">
            <li><a href="<?=site_url();?>">Главная</a></li>
            <?php
            if (count($bred)<2) {
             foreach ($bred as $key => $name) {
               echo "<li class='active'>$name</li>";            			
            }
         }else{
          $i= 0;
          foreach ($bred as $key => $name) {
            if ($i== 0) {
              $url = site_url()."group/categories/".$key;
              echo "<li><a href='$url'>$name</a></li>";
           }else{
              echo "<li class='active'>$name</li>";            			
           }
           $i++;
        }
     }
     ?>
  </ol>
</div>
