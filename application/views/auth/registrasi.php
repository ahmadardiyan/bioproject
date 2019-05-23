<div class="jumbotron jumbotron-fluid">
	<div class="container">

		<div class="row justify-content-center">
			<div class="col-md-4 col-md-offset-4 content text-left">
				<form action="" method="post">
					<h3 class="text-center ">Registrasi</h3>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email"
							value="<?=set_value('email')?>">
						<small class="form-text text-danger"><?=form_error('email')?></small>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username"
							value="<?=set_value('username')?>">
						<small class="form-text text-danger"><?=form_error('username')?></small>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password">
						<small class="form-text text-danger"><?=form_error('password')?></small>
					</div>
					<div class="form-group">
						<label for="confrimpassword">Konfirmasi Password</label>
						<input type="password" class="form-control" id="confrimpassword" name="confrimpassword">
						<small class="form-text text-danger"><?=form_error('confrimpassword')?></small>
					</div>
					<div class="form-group">
                            <label for="gender_member">Daftar Sebagai</label> 
                            <div class="radio" style="margin-left:30px">
                                <input  type="radio" name="level" value="member" >Member
                            </div>
                            <div class="radio" style="margin-left:30px">
                                <input  type="radio" name="level" value="company" >Company
                            </div>
                            <small class="form-text text-danger"><?=form_error('level')?></small>
                        </div>
					<div class="form-group form-check" style="margin-top:40px;">
						<input type="checkbox" class="form-check-input" id="checkbox" name="checkbox">
						<label class="form-check-label" for="checkbox" style="font-size:14px">Setuju dengan syarat dan aturan yang
							berlaku</label>
						<small class="form-text text-danger"><?=form_error('checkbox')?></small>
					</div>
					<div class="text-center">
						<button type="submit" name="register" class="btn btn-primary tombol">Submit</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>