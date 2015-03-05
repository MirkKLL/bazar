<div class="container">
	<div class="row">
		<div class="col-md-4"><?=$links?></div>
		<div class="col-md-8">
		<?php print_r($this->session->userdata('logged_in')); ?>
		</div>
	</div>
</div>