<section id="blog-full-width">
    <div class="container">
        <div class="row">
           <?php //$this->load->view('partials/user/sidebar');?>

            <!-- edit profile -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1 ">
                    <div class="content">
                        <h2>Detail Profile</h2>
                        <hr>
                        <a href="<?=base_url()?>update-profile-company" class="btn btn-primary" style="float:right; margin-top: -66px;">
                            Edit Profile </a>

                        <div class="row">
                            <div class="col-xs-5">
                                <label>Nama</label>
                            </div>
                            <div class="col-xs-7">
                                <p><?=': ' .$company['nama_perusahaan'];?></p>
                            </div>

                            <div class="col-xs-5">
                                <label>Tentang Perusahaan</label>
                            </div>
                            <div class="col-xs-7">
                                <p><?=': ' .$company['deskripsi_perusahaan'];?></p>
                            </div>

                            <div class="col-xs-5">
                                <label>Website</label>
                            </div>
                            <div class="col-xs-7">
                                <p><?=': ' .$company['website_perusahaan'];?></p>
                            </div>

                            <div class="col-xs-5">
                                <label>Telephone</label>
                            </div>
                            <div class="col-xs-7">
                                <p><?=': ' .$company['phone'];?></p>
                            </div>

                            <div class="col-xs-5">
                                <label>Alamat</label>
                            </div>
                            <div class="col-xs-7">
                                <p><?=': ' .$company['alamat_perusahaan'];?></p>
                            </div>

                            <div class="col-xs-5">
                                <label>Kecamatan</label>
                            </div>
                            <div class="col-xs-7">
                                <p><?=': ' .$company['nama_kec'];?></p>
                            </div>

                            <div class="col-xs-5">
                                <label>Kabupaten/Kota</label>
                            </div>
                            <div class="col-xs-7">
                                <p><?=': ' .$company['nama_kab'];?></p>
                            </div>

                            <div class="col-xs-5">
                                <label>Provinsi</label>
                            </div>
                            <div class="col-xs-7">
                                <p><?=': ' .$company['nama_prov'];?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>