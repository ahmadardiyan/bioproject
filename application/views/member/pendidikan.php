<section id="pendidikan">
    <div class="container">

        <!-- edit profile -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1 content">
                <h2>Pendidikan</h2>
                <hr>
                <a id="btn-create-pendidikan" class="btn btn-primary" style="float:right; margin-top: -66px;">
                    Tambah Pendidikan </a>

                <div class="row">

                    <?php if (!empty($pendidikan)) :?>
                    <?php foreach ($pendidikan as $p) : ?>

                    <div class="col-md-9 col-xs-9">
                        <div class="list-pendidikan" style="margin-bottom:15px">
                            <h4 style="margin-bottom:0px"> <?= $p['nama_univ']?> <span style="font-weight:10">(<?= $p['gelar']?> <?= $p['prodi']?>)</span>
                            </h4>
                            <p> <?= $p['tahun_masuk']?> - <?= $p['tahun_selesai']?> </p>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-3">
            
                        <a class="btn btn-sm btn-primary btn-update-pendidikan" data-toggle="modal" data-target="btn-pendidikan" data-id="<?= $p['id_pendidikan']?>"> Edit </a>
                        <a href="delete-pendidikan/<?=$p['id_pendidikan']?>" class="btn btn-sm btn-danger mb-2"
                            onclick="return confirm('Anda yakin ingin menghapus data pendidikan di <?= $p['nama_univ']?> ?');"> Delete </a>
                    </div>


                    <hr>

                    <?php endforeach;?>
                    <?php else : ?>

                    <p>Not Found !</p>

                    <?php endif;?>

                    <!-- <?php if (!empty($pendidikan)) :?>
                    <?php foreach ($pendidikan as $p) : ?>

                    <div class="col-md-7 col-xs-7">
                        <h4><?= $s['nama_sertifikat']?></h4>

                    </div>
                    <div class="col-md-2 col-xs-2">
                        <p><?= $s['tahun']?></p>

                    </div>
                    <div class="col-md-3 col-xs-3">
            
                        <a class="btn btn-xs btn-primary btn-update-sertifikat" data-toggle="modal" data-target="btn-sertifikat" data-id="<?=$s['id_sertifikat']?>"> Edit </a>
                        <a href="delete-sertifikat/<?=$s['id_sertifikat']?>" class="btn btn-xs btn-danger mb-2"
                            onclick="return confirm('Anda yakin ingin menghapus data sertifikat <?= $s['nama_sertifikat']?> ?');"> Delete </a>
                    </div>

                    <hr>

                    <?php endforeach;?>
                    <?php else : ?>

                    <p>Not Found !</p>

                    <?php endif;?> -->

                </div>

            </div>
        </div>
    </div>
</section>