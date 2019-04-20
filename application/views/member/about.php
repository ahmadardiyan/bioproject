<section id="blog-full-width">
    <div class="container">
        <div class="row">

            <?php $this->load->view('partials/user/sidebar');?>

            <!-- edit profile -->
            <div class="row">
                <div class="col-md-6 col-xs-10 col-md-offset-1 col-xs-offset-1">

                    <h1 style="padding-bottom:10px">About</h1>

                    <h3>Personal Information</h3>
                    <a class="btn btn-default" href="<?=base_url()?>update-profile">
                        Edit Profile
                    </a>
                    <hr>

                    <div class="row">
                        <div class="col-xs-4">
                            <label>Nama</label>
                        </div>
                        <div class="col-xs-8">
                            <p><?=': ' .$member['nama_member'];?></p>
                        </div>

                        <div class="col-xs-4">
                            <label>Tentang Saya</label>
                        </div>
                        <div class="col-xs-8">
                            <p><?=': ' .$member['deskripsi_member'];?></p>
                        </div>

                        <div class="col-xs-4">
                            <label>Jenis Kelamin</label>
                        </div>
                        <div class="col-xs-8">
                            <p><?=': ' .$member['gender_member'];?></p>
                        </div>

                        <div class="col-xs-4">
                            <label>Tempat & Tanggal Lahir</label>
                        </div>
                        <div class="col-xs-8">
                            <p><?=': ' .$member['tempat_lahir'] .', '. date('d-m-Y' , strtotime($member['tanggal_lahir']));?>
                            </p>
                        </div>

                        <div class="col-xs-4">
                            <label>Telephone</label>
                        </div>
                        <div class="col-xs-8">
                            <p><?=': ' .$member['phone_member'];?></p>
                        </div>

                        <div class="col-xs-4">
                            <label>Alamat</label>
                        </div>
                        <div class="col-xs-8">
                            <p><?=': ' .$member['alamat'];?></p>
                        </div>

                        <div class="col-xs-4">
                            <label>Kecamatan</label>
                        </div>
                        <div class="col-xs-8">
                            <p><?=': ' .$member['nama_kec'];?></p>
                        </div>

                        <div class="col-xs-4">
                            <label>Kabupaten/Kota</label>
                        </div>
                        <div class="col-xs-8">
                            <p><?=': ' .$member['nama_kab'];?></p>
                        </div>

                        <div class="col-xs-4">
                            <label>Provinsi</label>
                        </div>
                        <div class="col-xs-8">
                            <p><?=': ' .$member['nama_prov'];?></p>
                        </div>
                    </div>

                    <h3>Skills</h3>
                    <a class="btn btn-default" href="<?=base_url()?>update-skills">
                        Edit Skills
                    </a>
                    <hr>
                    <div class="row">

                        <?php foreach ($skills as $skill) : ?>
                        <div class="col-xs-6">
                            <p><?=$skill['nama_keahlian'];?></p>
                        </div>
                        <?php endforeach;?>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>