<!DOCTYPE html>
<html>

<body>

	<div>
		<?php if(validation_errors()){ ?>
		<div>
			<?= validation_errors(); ?>
		</div>
		<?php }
				if($this->session->flashdata('message')){
		?>
		<div>
			<?= $this->session->flashdata('message'); ?>
		</div>
		<?php	} ?>
		<h3>Signup</h3>
		<form method="POST" action="<?= base_url();?>register">
			<div>
				<label for="email">First Name :</label>
				<input type="text" id="first_name" name="first_name" value="<?= set_value('first_name'); ?>">
			</div>
			<div>
				<label for="email">Last Name :</label>
				<input type="text" id="last_name" name="last_name" value="<?= set_value('last_name'); ?>">
			</div>
			<div>
				<label for="email">Email:</label>
				<input type="text" id="email" name="email" value="<?= set_value('email'); ?>">
			</div>
			<div>
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" value="<?= set_value('password'); ?>">
			</div>
			<div>
				<label for="password_confirm">Password:</label>
				<input type="password" id="password_confirm" name="password_confirm" value="<?= set_value('password_confirm'); ?>">
			</div>
			<button type="submit">Register</button>
			<hr><a href="<?= base_url(); ?>login">Already have an account?</a>

		</form>
	</div>
</body>

</html>