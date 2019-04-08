<footer id="footer">
	<div class="container">
		<div class="col-md-8">
			<p class="copyright">Copyright: <span>
					<script>
						document.write(new Date().getFullYear())
					</script>
				</span> Design and Developed by <a href="http://www.Themefisher.com" target="_blank">Themefisher</a>.
				<br>
				Get More
				<a href="https://themefisher.com/free-bootstrap-templates/" target="_blank">
					Free Bootstrap Templates
				</a>
			</p>
		</div>
		<div class="col-md-4">
			<!-- Social Media -->
			<ul class="social">
				<li>
					<a href="http://wwww.fb.com/themefisher" class="Facebook">
						<i class="ion-social-facebook"></i>
					</a>
				</li>
				<li>
					<a href="http://wwww.twitter.com/themefisher" class="Twitter">
						<i class="ion-social-twitter"></i>
					</a>
				</li>
				<li>
					<a href="#" class="Linkedin">
						<i class="ion-social-linkedin"></i>
					</a>
				</li>
				<li>
					<a href="http://wwww.fb.com/themefisher" class="Google Plus">
						<i class="ion-social-googleplus"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
</footer>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?=base_url()?>login">Logout</a>
			</div>
		</div>
	</div>
</div>

<!-- Logout Delete Confirmation -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
			</div>
		</div>
	</div>
</div>

<!-- jquery -->
<script src="<?= base_url() ?>assets/jquery/jquery.min.js"></script>
<!-- Form Validation -->
<script src="<?= base_url() ?>assets/form-validation/jquery.form.js"></script>
<script src="<?= base_url() ?>assets/form-validation/jquery.validate.min.js"></script>
<!-- owl carouserl js -->
<script src="<?= base_url() ?>assets/owl-carousel/owl.carousel.min.js"></script>
<!-- bootstrap js -->
<script src="<?= base_url() ?>assets/bootstrap/bootstrap.min.js"></script>
<!-- wow js -->
<script src="<?= base_url() ?>assets/wow-js/wow.min.js"></script>
<!-- slider js -->
<script src="<?= base_url() ?>assets/slider/slider.js"></script>
<!-- Fancybox -->
<script src="<?= base_url() ?>assets/facncybox/jquery.fancybox.js"></script>
<!-- template main js -->
<script src="<?= base_url() ?>assets/js/main.js"></script>
<!-- datepicker -->
<script src="<?= base_url() ?>assets/datepicker/bootstrap-datepicker.min.js"></script>

<script src="<?= base_url() ?>assets/js/script.js"></script>

</body>

</html>