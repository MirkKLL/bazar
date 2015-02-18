<div class="container">
	<div class="row">
		<div class="col-md-4"><?=$links?></div>
		<div class="col-md-8">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<td>ID</td>
						
					</tr>
				</thead>
				<tbody>
					<?php foreach ($order as $element): ?>
						<tr>
							<td><?=$element?></td>
							
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php //print_r($orders[0]); ?>
		</div>
	</div>
</div>