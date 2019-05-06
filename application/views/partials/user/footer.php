<!-- Footer -->
<footer id="footer" class="sm-padding bg-dark">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <div class="col-md-12">

                <!-- footer logo -->
                <div class="footer-logo">
                    <a href="index.html"><img src="<?=base_url()?>assets/images/logo-alt.png" alt="logo"></a>
                </div>
                <!-- /footer logo -->

                <!-- footer follow -->
                <ul class="footer-follow">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>
                <!-- /footer follow -->

                <!-- footer copyright -->
                <div class="footer-copyright">
                    <p>Copyright © 2017. All Rights Reserved. Designed by <a href="https://colorlib.com"
                            target="_blank">Colorlib</a></p>
                </div>
                <!-- /footer copyright -->

            </div>

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</footer>
<!-- /Footer -->

<!-- Back to top -->
<div id="back-to-top"></div>
<!-- /Back to top -->

<!-- Preloader -->
<!-- <div id="preloader">
    <div class="preloader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div> -->
<!-- /Preloader -->

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

<!-- Modal Sertifikat -->
<div class="modal fade" id="modal-sertifikat" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Edit Sertifikat</h3>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id_sertifikat" id="id-sertifikat">

                    <div class="form-group">
                        <label for="nama-sertifikat">Nama Sertifikat</label>
                        <input type="text" class="form-control" id="nama-sertifikat" name="nama_sertifikat">
                        <small class="form-text text-danger"><?=form_error('nama-sertifikat')?></small>
                    </div>

                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <select class="form-control tahun" name="tahun" id="tahun"></select>
                            <small class="form-text text-danger"><?=form_error('tahun')?></small>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>

    </div>
</div>

<!-- Modal Pendidikan -->
<div class="modal fade" id="modal-pendidikan" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Edit Pendidikan</h3>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id_pendidikan" id="id-pendidikan">

                    <div class="form-group">
                        <label for="nama-univ">Nama Universitas</label>
                        <input type="text" class="form-control" id="nama-univ" name="nama_univ">
                        <small class="form-text text-danger"><?=form_error('nama-univ')?></small>
                    </div>

                    <div class="form-group">
                        <label for="gelar">Gelar</label>
                        <input type="text" class="form-control" id="gelar" name="gelar">
                        <small class="form-text text-danger"><?=form_error('gelar')?></small>
                    </div>
                    
                    <div class="form-group">
                        <label for="prodi">Program Studi</label>
                        <input type="text" class="form-control" id="prodi" name="prodi">
                        <small class="form-text text-danger"><?=form_error('prodi')?></small>
                    </div>

                    <div class="form-group">
                        <label for="tahun-masuk">Tahun Masuk</label>
                        <select class="form-control tahun" name="tahun_masuk" id="tahun-masuk"></select>
                            <small class="form-text text-danger"><?=form_error('tahun-masuk')?></small>
                    </div>
                    
                    <div class="form-group">
                        <label for="tahun-selesai">Tahun Selesai</label>
                        <select class="form-control tahun" name="tahun_selesai" id="tahun-selesai"></select>
                            <small class="form-text text-danger"><?=form_error('tahun-selesai')?></small>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>

    </div>
</div>

<!-- jQuery Plugins -->
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.magnific-popup.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/main.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/script.js"></script>


<!-- Datepicker -->
<script src="<?= base_url() ?>assets/datepicker/bootstrap-datepicker.min.js"></script>


</body>

</html>