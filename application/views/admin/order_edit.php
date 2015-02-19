<div class="container">
	<div class="row">
		<div class="col-md-4"><?=$links?></div>
		<div class="col-md-8">
			<?php 
			
			?>
			<form method="POST">
				<input type="hidden" name = "order_id" value="<?=$order['id']?>">
				<?=$order_status?> <br />
				<div class="row">
					<div class="col-md-4">
						<input class="form-control" type="text" value="<?=$order['phone']?>" disabled> <br />
					</div>
					
					<div class="col-md-4">
						<input class="form-control" type="text" value="<?=$order['first_name']?>" disabled> <br />
					</div>
					<div class="col-md-4">
						<input class="form-control" type="text" value="<?=$order['last_name']?>" disabled> <br />
					</div>
				</div>
				<input class="form-control" type="text" value="<?=$order['email']?>" disabled> <br />
				<input class="form-control" type="text" value="<?=$order['price']?> грн." disabled> <br />
				<div class="form-group">
					<label>Коментарии к заказу:</label>
					<textarea name="coments" class="form-control" rows="2"><?=$order['coments']?></textarea>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Создано:</label>
							<input class="form-control" type="text" value="<?=$order['created_at']?>" disabled>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Обновлено:</label>
							<input class="form-control" type="text" value="<?=$order['updated_at']?>" disabled>
						</div>
					</div>
				</div>
				<hr>
				<strong>Продукты: </strong>
				<br>
				<input class="form-control" type="hidden" name = "changed" value="no" id = "changed">
				<?php foreach ($order_details as $key => $food) : ?>
					<div class="row">
						<div class="col-md-4">
							<input class="form-control" type="text" value="<?=$food['name']?> [<?=$food['cat_name']?>]" disabled>
						</div>
						<div class="col-md-1">
							<input class="form-control" type="text" name= 'amount[<?=$food['food_id']?>]' value="<?=$food['qty']?>" onchange="set_changed();">
						</div>
						<div class="col-md-1" style="margin-top: 5px;">
							<?=$food['measure']?> <b>X</b>
						</div>
						<div class="col-md-3">
							<?=$food['last_price']?> грн. <b>=</b>
						</div>
						<div class="col-md-3">
							<?=$food['subtotal']?> грн.
						</div>
					</div>
					<br />
				<?php endforeach; ?>
				<input type="submit" value="Save order" class="btn btn-success">

			</form>
			
			<?php 
			echo "<pre>";
			//var_dump($order);
			var_dump($_POST);
			echo "--------- details ------------";
			var_dump($order_details);
			echo "</pre>";

			?>
		</div>
	</div>
</div>