<div class="container">
	<div class="row">
		<div class="col-md-4"><?=$links?></div>
		<div class="col-md-8">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<td>ID</td>
						<td>user</td>
						<td>status</td>
						<td>created</td>
						<td>updated</td>
						<td>address</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($orders as $order): ?>
						<tr>
							<td><a href="<?=site_url()?>/admin/order_edit/<?=$order->id?>"><?=$order->id?></a></td>
							<td><?=$order->phone?> | <?=$order->first_name?></td>
							<td><?=$order->name?></td>
							<td><?=$order->created_at?></td>
							<td><?=$order->updated_at?></td>
							<td><?=$order->address?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php //print_r($orders[0]); ?>
		</div>
	</div>
</div>