<!DOCTYPE html>
<html>
<title>Login</title>

<body>
	<div>
		<?php
if (validation_errors()) {
    ?>
		<div>
			<?=validation_errors();?>
		</div>
		<?php
}

if ($this->session->flashdata('message')) {
    ?>
		<div>
			<?=$this->session->flashdata('message');?>
		</div>
		<?php
}
?>
		<h3 class="text-center">Login</h3>
		<form method="POST" action="<?=base_url() . 'auth/checkLogin';?>">
			<div>
				<label for="email">Email:</label>
				<input type="text" id="email" name="email" value="<?=set_value('email');?>">
			</div>
			<div>
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" value="<?=set_value('password');?>">
			</div>
			<button type="submit">Login</button>
			<hr>
			<a href="<?=base_url('register');?>">Create an Account</a>
		</form>
	</div>
</body>

</html>