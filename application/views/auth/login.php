<div class="jumbotron jumbotron-fluid">
<div class="container">
	
	<div class="row justify-content-center mt-5" style="">
		<div class="col-md-4 col-md-offset-4 content text-left">
				<h3 class="text-center " >Login</h3>
			<form action="" method="post">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" id="email" name="email"
						value="<?=set_value('email')?>">
					<small id="email" class="form-text text-danger">
						<?=form_error('email')?></small>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password"
						value="<?=set_value('password')?>">
				</div>
				<small id="password" class="form-text text-danger">
					<?=form_error('password')?></small>

				<div class="form-group text-center">
					<a href="<?php base_url();?>forgotPassword">Lupa password ?</a> <br>
					<a href="<?php base_url();?>registrasi">Buat Akun</a>
				</div>
				<div class="text-center">
					<button type="submit" name="login" class="btn btn-primary tombol">LogIn</button>
				</div>
			</form>
		</div>
	</div>

</div>

</div>