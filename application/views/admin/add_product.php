<div class="container">
	<div class="row">
		<div class="col-md-4"><?=$links?></div>
		<div class="col-md-8">
			<form class = "form" role="form" method="POST" action="<?=site_url()?>/admin/add_product">
				    <input type="text" class="form-control" name="name" placeholder="Название">
				    <br />
				    <textarea class="form-control" name="description" placeholder="Описание" rows = "3"></textarea>
				    <br />
				    <input type="text" class="form-control" name="last_price" placeholder="Цена">
				    <br />
				    <input type="text" class="form-control" name="amount" placeholder="кол-во">
				    <br />
				    <label class="checkbox-inline">
				        <input type="checkbox" name = "measure" value="л."> л.
			    	</label>
			    	<label class="checkbox-inline">
				        <input type="checkbox" name = "measure" value="шт."> шт.
			    	</label>
			    	<label class="checkbox-inline">
				        <input type="checkbox" name = "measure" value="кг."> кг.
			    	</label>
				    <br />
				    <div class="form-group">
				    	<label>Дата производства</label>
				    	<input type="date" class="form-control" name="prod_date">
				    </div>
				    <div class="form-group">
				    	<label>Срок годности</label>
				    	<input type="date" class="form-control" name="expire_date">
				    </div>
			    	<select multiple class="form-control" style="height: 300px;" name = "category">
				    	<?php foreach ($categories as $id => $name): ?>
						  <option value="<?=$id?>"><?=$name?></option>
				    	<?php endforeach; ?>
						  
					</select>
					<br />
				    <button type="button" class="btn btn-success pull-right" onclick="submit();">Добавить</button>
			</form>
		</div>
	</div>
</div>