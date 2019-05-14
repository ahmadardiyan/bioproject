<section id="detail-lowongan-pekerjaan">
    <div class="container">
        <div class="row">

            <div class="col-md-3 col-xs-12 ">
                <div class="content">

                    <div class="text-center" style="margin-bottom:50px">
                        <h3><?= $loker['judul'];?></h3>
                        <p><?= $loker['deskripsi'];?></p>
                        <button type="button" class="btn btn-primary">Daftar Kerja</button>
                    </div>

                    <div style="margin-bottom:50px">
                        <h5 style="margin-bottom:5px">Tipe Kerja</h5>
                        <p style="margin-bottom:20px"><?= $loker['tipe_kerja'];?></p>

                        <h5 style="margin-bottom:5px">Lokasi</h5>
                        <p style="margin-bottom:20px"><?= $loker['nama_kab'];?> , <?= $loker['nama_prov'];?> </p>

                        <h5 style="margin-bottom:5px">Pendaftaran ditutup</h5>
                        <p style="margin-bottom:20px"><?= date('d-m-Y' , strtotime($loker['tanggal_penutupan'])) ?></p>

                        <h5 style="margin-bottom:5px">Keahlian</h5>
                        <?php foreach($keahlian as $k):?>
                        <p class="label label-default"
                            style="margin-right:10px; margin-bottom:20px; display:inline-block"><?=$k['nama_keahlian']?>
                        </p>
                        <?php endforeach;?>
                    </div>

                </div>
            </div>

            <div class="col-md-6 col-xs-12">
                <div class="content">
                   

                    <?= $loker['detail_lowongan_kerja']?>

                    <button type="button" class="btn btn-primary" style="margin-top:30px">Daftar Kerja</button>
                </div>
            </div>

            <div class="col-md-3 col-xs-12 ">
                <div class="content text-center">
                    <h3>Pendaftar</h3>
                </div>
            </div>

        </div>
    </div>
</section>