<section id="pengalaman-kerja">
    <div class="container">

        <!-- edit profile -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1 content">
                <h2>Pengalaman Kerja</h2>
                <hr>
                <a id="btn-create-pengalaman-kerja" class="btn btn-primary" style="float:right; margin-top: -66px;">
                    Tambah Pengalaman Kerja </a>

                <div class="row">

                    <?php if (!empty($pengalaman_kerja)) :?>
                    <?php foreach ($pengalaman_kerja as $p) : ?>

                    <div class="col-md-9 col-xs-9">
                        <div class="list-pengalaman-kerja" style="margin-bottom:15px">
                            <h4 style="margin-bottom:0px"> <?=$p['nama_perusahaan']?> <span
                                    style="  font-weight:10">(<?=$p['jabatan']?>)</span>
                            </h4>
                            <p> <?=$p['tahun_mulai']?> - <?=$p['tahun_selesai']?> </p>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-3">

                        <a class="btn btn-sm btn-primary btn-update-pengalaman-kerja" data-toggle="modal"
                            data-target="btn-pengalaman-kerja" data-id="<?=$p['id_pengalaman']?>"> Edit </a>
                        <a href="delete-pengalaman-kerja/<?=$p['id_pengalaman']?>" class="btn btn-sm btn-danger mb-2"
                            onclick="return confirm('Anda yakin ingin menghapus data pengalaman kerja di <?=$p['nama_perusahaan']?>  ?');">
                            Delete </a>
                    </div>

                    <?php endforeach;?>
                    <?php else : ?>

                    <p>Not Found !</p>

                    <?php endif;?>

                </div>

            </div>
        </div>
    </div>
</section>