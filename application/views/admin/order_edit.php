<div class="container">
	<div class="row">
		<div class="col-md-4"><?=$links?></div>
		<div class="col-md-8">
		<form method="POST">
			<input type="hidden" name = "order_id" value="<?=$order['id']?>">
			<?=$order_status?> <br />
			<input class="form-control" type="text" value="<?=$order['first_name']?>" disabled> <br />
			<input class="form-control" type="text" value="<?=$order['last_name']?>" disabled> <br />
			<input class="form-control" type="text" value="<?=$order['phone']?>" disabled> <br />
			<input class="form-control" type="text" value="<?=$order['email']?>" disabled> <br />
			<div class="form-group">
			<label>Коментарии к заказу:</label>
				<textarea name="coment" class="form-control" rows="2"><?=$order['coments']?></textarea>
			</div>

			<div class="form-group">
				<label class="control-label">Создано:</label>
				<input class="form-control" type="text" value="<?=$order['created_at']?>" disabled>
			</div>
			<div class="form-group">
				<label class="control-label">Обновлено:</label>
				<input class="form-control" type="text" value="<?=$order['updated_at']?>" disabled>
			</div>

			<input type="submit" value="OK" class="btn btn-success">
		</form>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<td>ID</td>
						
					</tr>
				</thead>
				<tbody>
					<?php foreach ($order as $id => $element): ?>
						<tr>
							<td><?=$id?> : <?=$element?></td>
							
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php //print_r($orders[0]); ?>
		</div>
	</div>
</div>