<div class="jumbotron jumbotron-fluid">
	<div class="container">

		<div class="row justify-content-center mt-2">
			<div class="col-md-4 col-md-offset-4 content text-left">
				<form action="" method="post">
					<h3 class="text-center ">Perbarui Password</h3>
					<div class="form-group">
						<label for="password">Password Baru</label>
						<input type="password" class="form-control" id="password" name="password">
						<small class="form-text text-danger"><?= form_error('password'); ?></small>
					</div>
					<div class="form-group">
						<label for="confrimpassword">Konfirmasi Password</label>
						<input type="password" class="form-control" id="confrimpassword" name="confrimpassword">
						<small class="form-text text-danger"><?= form_error('confrimpassword'); ?></small>
					</div>
					<div class="text-center">
						<button type="submit" name="newPassword" class="btn btn-primary tombol">Save</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>