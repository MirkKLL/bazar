<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h2>Оформление заказа <small>на сумму: <?php echo $this->cart->format_number($this->cart->total()); ?> грн. </small></h2>
			<br>
			<form role="form" method="POST" action="<?=site_url()?>/cart/order_finis">
				<div class="form-goup">
					<label for="phone">Телефон:</label>
					<div class="form-inline">
						<label for="phone">+3 8</label>
						<input class="form-control" id="phone" placeholder="0938888888" name="phone" maxlength="10">
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Имя:</label>
					<input type="text" class="form-control" name="first_name" placeholder="Иван">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Фамилия:</label>
					<input type="text" class="form-control" name="last_name" placeholder="Сидоров">
				</div>
				<div class="form-group">
					<label for="address">Адрес доставки:</label>
					<textarea class="form-control" rows="3" name="address" placeholder="пр.Ленина 10 кв. 20, 1 подъезд, код: 321"></textarea>
				</div>
				<div class="form-group">
					<label for="comments">Коментарии:</label>
					<textarea class="form-control" rows="3" name="comments" placeholder="примечания по заказу"></textarea>
				</div>
				
				<button type="submit" class="btn btn-default btn-success btn-lg pull-right">Отправить</button>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>