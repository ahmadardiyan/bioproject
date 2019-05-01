<section id="update-portofolio">
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1 upload-portofolio " style="margin-top:20px;background-color:white">
                <h2>Edit Portofolio</h2>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id_portofolio" value="<?=$portofolio['id_portofolio'];?>">
                    <input type="hidden" name="foto_lama" value="<?=$portofolio['foto'];?>">

                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul"
                            value="<?= $portofolio['judul']?>">
                        <small class="form-text text-danger"><?=form_error('judul')?></small>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" cols="30"
                            rows="3"> <?=$portofolio['deskripsi']?> </textarea>
                        <small class="form-text text-danger">
                            <?=form_error('deskripsi')?></small>
                    </div>

                    <!-- tambahin input kategori portofolio -->

                    <div class="form-group">
                        <label for="foto">Foto Portofolio</label><br>

                        <img class="img-thumbnail mb-2"
                            src="<?=base_url();?>assets/images/profile/<?=$portofolio['foto']?>" width="100px"
                            height="100px">
                        <input type="file" class="form-control-file" id="foto" name="foto">
                        <small class=" form-text text-danger">
                            <?=form_error('foto')?>
                        </small>
                    </div>

                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>