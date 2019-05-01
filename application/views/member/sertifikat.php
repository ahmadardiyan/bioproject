<section id="sertifikat">
    <div class="container">

        <!-- edit profile -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1 content">
                <h2>Sertifikat</h2>
                <hr>

                <div class="row">

                    <?php if (!empty($sertifikat)) :?>
                    <?php foreach ($sertifikat as $s) : ?>

                    <div class="col-md-8 col-xs-8">
                        <h4><?= $s['nama_sertifikat']?></h4>

                    </div>
                    <div class="col-md-2 col-xs-2">
                        <p><?= $s['tahun']?></p>

                    </div>
                    <div class="col-md-2 col-xs-2">
                        <a class="btn btn-xs btn-primary"> Edit </a>
                        <a class="btn btn-xs btn-danger mb-2"
                            onclick="return confirm('Anda yakin ingin menghapus data produk ?');"> Delete </a>
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