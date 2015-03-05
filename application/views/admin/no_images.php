<div class="container">
	<div class="row">
	<div class="col-md-2"><?=$links?></div>
	<div class="col-md-2"></div>
		<div class="col-md-8">
			<?php foreach ($no_images as $id => $name) : ?>
				<?="<b>".$id."</b> | ".$name['name']?> <br>
			<?php endforeach; ?>
		</div>
	</div>
</div>
