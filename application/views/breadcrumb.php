      
      <div class="container">
         <ol class="breadcrumb">
            <li><a href="<?=site_url();?>">Главная</a></li>
            <?php if(!empty($bred['sub']['name'])) : ?>
            <li><a href="<?$bred['sub']['url']?>"><?=$bred['sub']['name']?></a></li>
        	<?php endif; ?>
            <li class="active"><?=$bred['active']?></li>
         </ol>
      </div>
