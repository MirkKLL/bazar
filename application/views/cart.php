<div class="container cart">
	<form action="<?=site_url();?>/cart/update" method="POST">
		<?php if ($this->cart->total_items()>0) : ?>
			<h1>Корзина</h1>
		<?php else : ?>
			<h1>Корзина пуста</h1> 
			<br /><br /><br /><br /><br /><br />
		<?php endif; ?>

		<?php $i = 1; ?>
		<?php foreach ($this->cart->contents() as $items): ?>
			<div class="row">
				<div class="col-sm-2 hidden-xs hidden-sm "><?php echo form_hidden($i.'[rowid]', $items['rowid']); ?></div>
				<div class="col-md-2 hidden-xs hidden-sm "><img  src="http://placehold.it/120x80" alt="prevew"></div>
				<div class="col-sm-4 col-xs-4 col-md-5 col-xl-5"><h3><?=$items['name']?></h3></div>
				<div class="col-sm-2 col-md-1 col-xl-1">
					<input  type = "number" min = "0" max = "500" name="<?php echo $i.'[qty]';?>" value = "<?=$items['qty']?>" maxlength = "3" size = "5" style="margin-top: 20px;">
				</div>
				<div class="col-sm-2 col-md-1 col-xl-1" style="margin-top: 20px;"><?php echo $this->cart->format_number($items['price']); ?> грн.</div>
				<div class="col-sm-2 col-md-1 col-xl-1" style="margin-top: 20px;"><?php echo $this->cart->format_number($items['subtotal']); ?> грн.</div>
			</div>
			<?php $i++; ?>
		<?php endforeach; ?>
		<?php if ($this->cart->total_items()>0) : ?>
			<div class="row">
				<div class="col-md-3 col-md-offset-9">
					<h3>Всего: <?php echo $this->cart->format_number($this->cart->total()); ?> грн. </h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-8">
					<button type="button" class="btn btn-warning" onClick='submit()'> <span class="glyphicon glyphicon-refresh"></span> Пересчитать</button>
					<a type="button" class="btn btn-success btn-lg" href = "<?=site_url()?>/cart/confirm">
						<span class="glyphicon glyphicon-ok"></span>
						Оформить заказ</a>
					</div>
				</div>
			<?php endif; ?>
		</form>


		