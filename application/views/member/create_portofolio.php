<section id="create-portofolio">
    <div class="container">

        <!-- edit profile -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1 upload-portofolio">
                <h2>Tambah Portofolio</h2>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id_user" value="<?=$member['id_user'];?>">

                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?=set_value('judul')?>">
                        <small class="form-text text-danger"><?=form_error('judul')?></small>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" cols="30"
                            rows="3"> <?=set_value('deskripsi')?> </textarea>
                        <small class="form-text text-danger">
                            <?=form_error('deskripsi')?></small>
                    </div>

                    <!-- tambahin input kategori portofolio -->

                    <div class="form-group">
                        <label for="foto">Foto Portofolio</label><br>

                        <input type="file" class="form-control-file" id="foto" name="foto"
                            value="<?=set_value('foto')?>">
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