<div class="container">
	<div class="row">
		<div class="col-md-4"><?=$links?></div>
		<div class="col-md-8">
		<?php 
			
		?>
		<form method="POST">
			<input type="hidden" name = "order_id" value="<?=$order['id']?>">
			<?=$order_status?> <br />
			<input class="form-control" type="text" value="<?=$order['first_name']?>" disabled> <br />
			<input class="form-control" type="text" value="<?=$order['last_name']?>" disabled> <br />
			<input class="form-control" type="text" value="<?=$order['phone']?>" disabled> <br />
			<input class="form-control" type="text" value="<?=$order['email']?>" disabled> <br />
			<input class="form-control" type="text" value="<?=$order['price']?> грн." disabled> <br />
			<div class="form-group">
			<label>Коментарии к заказу:</label>
				<textarea name="coments" class="form-control" rows="2"><?=$order['coments']?></textarea>
			</div>

			<div class="form-group">
				<label class="control-label">Создано:</label>
				<input class="form-control" type="text" value="<?=$order['created_at']?>" disabled>
			</div>
			<div class="form-group">
				<label class="control-label">Обновлено:</label>
				<input class="form-control" type="text" value="<?=$order['updated_at']?>" disabled>
			</div>

			<strong>Продукты: </strong>
			<?php foreach ($order_details as $key => $food) : ?>
				<input class="form-control" type="text" value="<?=$food['name']?> грн." disabled> <br />
			<?php endforeach; ?>
			<input type="submit" value="OK" class="btn btn-success">

		</form>
			
			<?php 

			var_dump($order);
			var_dump($order_details);

			 ?>
		</div>
	</div>
</div>