<section id="sertifikat">
    <div class="container">

        <!-- edit profile -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1 content">
                <h2>Sertifikat</h2>
                <hr>
                <a id="btn-create-sertifikat" class="btn btn-primary" style="float:right; margin-top: -66px;">
                    Tambah Sertifikat </a>
            
                <div class="row">

                    <?php if (!empty($sertifikat)) :?>
                    <?php foreach ($sertifikat as $s) : ?>

                    <div class="col-md-7 col-xs-7">
                        <h4><?= $s['nama_sertifikat']?></h4>

                    </div>
                    <div class="col-md-2 col-xs-2">
                        <p><?= $s['tahun']?></p>

                    </div>
                    <div class="col-md-3 col-xs-3">
                        <!-- <a class="btn btn-xs btn-primary" id="btn-update-sertifikat"> Edit </a> -->
                        <a class="btn btn-xs btn-primary btn-update-sertifikat" data-toggle="modal" data-target="btn-sertifikat" data-id="<?=$s['id_sertifikat']?>"> Edit </a>
                        <a href="delete-sertifikat/<?=$s['id_sertifikat']?>" class="btn btn-xs btn-danger mb-2"
                            onclick="return confirm('Anda yakin ingin menghapus data sertifikat <?= $s['nama_sertifikat']?> ?');"> Delete </a>
                    </div>

                    <hr>

                    <?php endforeach;?>
                    <?php else : ?>

                    <p>Not Found !</p>

                    <?php endif;?>

                </div>

            </div>
        </div>
    </div>
</section>