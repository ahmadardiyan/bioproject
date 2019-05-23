<div class="jumbotron jumbotron-fluid">
	<div class="container">

		<div class="row justify-content-center" style="margin-top:130px;">
			<div class="col-md-4 col-md-offset-4 content text-left">
				<form action="" method="post">
					<h3 class="text-center ">Lupa Password</h3>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email"
							value="<?=set_value('email')?>">
						<small class="form-text text-danger"><?= form_error('email'); ?></small>
					</div>
					<div class="text-center">
						<button type="submit" name="forgotPassword" class="btn btn-primary tombol">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>