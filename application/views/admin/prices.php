<div class="container">
	<div class="row">
		<div class="col-md-4"><?=$links?></div>
		<div class="col-md-8">
			<form method="POST" action="<?=site_url()?>prices">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<td>ID</td>
							<td>Product</td>
							<td>Owner</td>
							<td></td>
							<td>Выпущено</td>
							<td>Годно</td>
							<td>Цена грн.</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($prices as $price): ?>
							<tr>
								<td><a href="<?=site_url()?>/admin/price_edit/<?=$price->id?>"><?=$price->id?></a></td>
								<td><?=$price->name?></td>
								<td><?=$price->last_name?> | <?=$price->first_name?></td>
								<td><?=$price->amount?> | <?=$price->measure?></td>
								<td><input class="form-control update_prod_date" type = "date" name= "prod" value="<?=$price->prod_date?>"  data-id = "<?=$price->id?>"></td>
								<td><input class="form-control update_expire" type = "date" name= "expire" value="<?=$price->expire_date?>"  data-id = "<?=$price->id?>"></td>
								<td><input class="form-control update_price" name= "price" value="<?=$price->last_price?>" style = "max-width:130px;" data-id = "<?=$price->id?>"></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</div>
<script>
	
	function update_price () {
		$.post(
			"<?=base_url();?>index.php/ajax/update_price",
			{
				id: this.getAttribute('data-id'),
				price: this.value
			},
			onAjaxSuccess
			);

		function onAjaxSuccess(data)
		{
			console.log('done');
			return;
               // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
               $('.cart_amount').addClass("text-success");
               $('#cart_amount').text(data);
               setTimeout(function(){
               	$('.cart_amount').toggleClass('text-success text-muted');
               }, 2000);
                      //#9d9d9d
                  }
              }

              function update_expire () {
              	$.post(
              		"<?=base_url();?>index.php/ajax/update_expire",
              		{
              			id: this.getAttribute('data-id'),
              			expire: this.value
              		},
              		onAjaxSuccess
              		);

              	function onAjaxSuccess(data)
              	{
              		console.log('done');

              	}
              }

              function update_prod_date () {
              	$.post(
              		"<?=base_url();?>index.php/ajax/update_prod_date",
              		{
              			id: this.getAttribute('data-id'),
              			prod: this.value
              		},
              		onAjaxSuccess
              		);

              	function onAjaxSuccess(data)
              	{
              		console.log('done');

              	}
              }

          </script>