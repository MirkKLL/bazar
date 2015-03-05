<div class="container">
	<div class="row">
		<?php echo validation_errors(); ?>
		<?php echo form_open('login/verifylogin'); ?>
		<label for="phone">Phone +38</label>
		<input type="text" size="10" id="phone" name="phone" placeholder = "0938888888"/>
		<br/>
		<label for="password">Password:</label>
		<input type="password" size="20" id="passowrd" name="password" placeholder = "*******"/>
		<br/>
		<input type="submit" value="Login"/>
	</form>
</div>
</div>