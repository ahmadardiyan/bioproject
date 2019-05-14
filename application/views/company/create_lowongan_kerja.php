<section id="create-lowongan-pekerjaan">
    <div class="container">
        <div class="row">

            <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 content">

                <div class="row" style="margin:20px 5px;">

                    <h2>Tambah Lowongan Kerja</h2>

                    <hr>
                </div>

                <div class="row" style="margin:20px 5px;">
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="judul">Judul Lowongan Kerja</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="">
                            <small class="form-text text-danger"><?=form_error('judul')?></small>
                        </div>
                        
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Lowongan Kerja</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" cols="30" rows="3"></textarea>
                            <small class="form-text text-danger">
                                <?=form_error('deskripsi')?></small>
                        </div>

                        <!-- <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <div class="radio" style="margin-left:30px">
                                <input  type="radio" name="gender" value="Laki-laki">Laki-laki
                            </div>
                            <div class="radio" style="margin-left:30px">
                                <input  type="radio" name="gender" value="Perempuan">Perempuan
                            </div>
                            <div class="radio" style="margin-left:30px">
                                <input  type="radio" name="gender" value="Semua">Laki-laki atau Perempuan
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="usia_min">Usia Minimal</label>
                            <input type="number" class="form-control" id="usia_min" name="usia_min" value="" min="0"
                                max="100">
                        </div>

                        <div class="form-group">
                            <label for="usia_maks">Usia Maksimal</label>
                            <input type="number" class="form-control" id="usia_maks" name="usia_maks" value="" min="0"
                                max="100">
                        </div> -->

                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <select class="form-control" name="provinsi" id="provinsi"></select>
                            <small class="form-text text-danger">
                                <?=form_error('provinsi')?></small>
                        </div>

                        <div class="form-group">
                            <label for="kabupaten">Kabupaten/Kota</label>
                            <select class="form-control" name="kabupaten" id="kabupaten"></select>
                            <small class="form-text text-danger">
                                <?=form_error('kabupaten')?></small>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_penutupan">Penutupan Pendaftaran</label>
                            <input type="text" class="form-control tanggal mb-2" name="tanggal_penutupan"
                                id="tanggal_penutupan" value="">
                            <small class="form-text text-danger"><?=form_error('tanggal_penutupan')?></small>
                        </div>

                        <div class="form-group">
                            <label for="tipe_kerja">Tipe Pekerjaan</label>

                            <select name="tipe_kerja" class="form-control" id="tipe_kerja">
                                <option value="">Pilih</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Freelanch">Freelanch</option>
                                <option value="Remote">Remote</option>
                            </select>

                            <small class="form-text text-danger"><?=form_error('tipe_kerja')?></small>
                        </div>

                        <hr>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 col-xs-12" style="float: right">

                                    <!-- Keahlian -->

                                    <label>Keahlian</label>

                                    <div id="checkbox-keahlian-member" style="display:inline-block;"></div>

                                </div>

                                <div class="col-md-8 col-xs-12 ">

                                    <label>Daftar Keahlian</label>

                                    <!-- daftar keahlian (select) -->
                                    <div class="row">
                                        <!-- kategori keahlian -->
                                        <div class="col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1">
                                            <select class="form-control" name="kategori-keahlian"
                                                id="kategori-keahlian"></select>
                                        </div>

                                        <!-- list keahlian -->

                                            <div class="col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1"
                                                id="list-keahlian"></div>

                                    </div>

                                    <div class="row text-center">

                                    </div>

                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="detail_lowongan_kerja">Detail Lowongan Pekerjaan</label>
                            <textarea class="form-control" id="ckeditor" name="detail_lowongan_kerja"></textarea>
                            <small class="form-text text-danger">
                                <?=form_error('detail_lowongan_kerja')?></small>
                        </div>


                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>