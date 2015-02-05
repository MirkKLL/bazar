<div class="container cart">
	<form action="<?=site_url();?>/cart/update" method="POST">
		<h1>Корзина</h1>
		<?php $i = 1; ?>
		<?php foreach ($this->cart->contents() as $items): ?>
			<div class="row">
				<div class="col-sm-2 hidden-xs hidden-sm "><?php echo form_hidden($i.'[rowid]', $items['rowid']); ?></div>
				<div class="col-md-2 hidden-xs hidden-sm "><img  src="http://placehold.it/120x80" alt="prevew"></div>
				<div class="col-sm-4 col-xs-4"><h3><?=$items['name']?></h3></div>
				<div class="col-sm-2">
					<input type="text" name="<?php echo $i.'[qty]';?>" value = "<?=$items['qty']?>" maxlength = "3" size = "5">
				</div>
				<div class="col-sm-2"><?php echo $this->cart->format_number($items['price']); ?> грн.</div>
				<div class="col-sm-2"><?php echo $this->cart->format_number($items['subtotal']); ?> грн.</div>
			</div>
		<?php $i++; ?>
		<?php endforeach; ?>
		<div class="row">
			<div class="col-md-3 col-md-offset-9">
				<strong>Всего: <?php echo $this->cart->format_number($this->cart->total()); ?> грн. </strong>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-8">
				<button type="button" class="btn btn-warning" onClick='submit()'> <span class="glyphicon glyphicon-refresh"></span> Пересчитать</button>
  				<button type="button" class="btn btn-success">Оформить заказ</button>
			</div>
		</div>

	</form>


	