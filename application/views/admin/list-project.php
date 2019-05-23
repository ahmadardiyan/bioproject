<!-- Begin Page Content -->
<!--<div class="container-fluid"> -->

  <!-- Page Heading -->

  <div class="container-fluid">
    <?= form_error('user', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
      <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newListProjectModal">
        <i class="fas fa-plus fa-sm text-white-50">
        </i>
        Tambah List Project
      </a>
    </div>

    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-bordered dataTable no-footer" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="font-size: 13px;">
                    <thead>
                      <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="No: activate to sort column ascending" style="width: 10px;">
                          No
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="ID Lowongan Kerja: activate to sort column ascending" style="width: 10px;">
                          ID Lowongan Kerja
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 10px;">
                          Username
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Judul: activate to sort column ascending" style="width: 43px;">
                          Judul
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" style="width: 10px;">
                          Gender
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Deskripsi: activate to sort column ascending" style="width: 10px;">
                          Deskripsi
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Tanggal Penutupan: activate to sort column ascending" style="width: 10px;">
                          Tanggal Penutupan
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Tipe Kerja: activate to sort column ascending" style="width: 10px;">
                          Tipe Kerja
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Detail Lowongan Kerja: activate to sort column ascending" style="width: 10px;">
                          Detail Lowongan Kerja
                        </th>
                        <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 41px;">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=0;
                          foreach($list_lowongan_kerja as $a):
                            $no++;
                            $id_p=$a['id_lowongan_kerja'];
                            $username=$a['username'];
                            $judul=$a['judul'];
                            $gender=$a['gender'];
                            $deskripsi=$a['deskripsi'];
                            $tgl=$a['tanggal_penutupan'];
                            $tipe=$a['tipe_kerja'];
                            $detail=$a['detail_lowongan_kerja'];
                        ?>
                      <tr role="row" class="odd">
                        <td><?= $no;?></td>
                        <td><?= $id_p;?></td>
                        <td><?= $username;?></td>
                        <td><?= $judul;?></td>
                        <td><?= $gender;?></td>
                        <td><?= $deskripsi;?></td>
                        <td><?= $tgl;?></td>
                        <td><?= $tipe;?></td>
                        <td><?= $detail;?></td>
                        <td>
                          <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#UpdateListProject<?= $id_p;?>"><i class="fas fa-edit"></i></a>
                          <a class="btn btn-danger btn-sm btn-hapus" href="" data-toggle="modal" data-target="#HapusListProject<?= $id_p;?>"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->

<!-- Modal -->

<!-- ============ MODAL ADD LIST PROJECT =============== -->
<div class="modal fade" id="newListProjectModal" tabindex="-1" role="dialog" aria-labelledby="newListProjectModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newListProjectModalLabel">Add New List Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url().'admin/simpan_list_project'?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group row">
              <label name="id_user" class="col-sm-2 col-form-label">ID Perusahaan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="id_user" name="id_user" placeholder="ID Perusahaan" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="judul" class="col-sm-2 col-form-label">Judul</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="gender" class="col-sm-2 col-form-label">Gender</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="gender" name="gender" placeholder="Gender" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="tanggal_penutupan" class="col-sm-2 col-form-label">Tanggal Penutupan</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="tanggal_penutupan" name="tanggal_penutupan" placeholder="Tanggal Penutupan" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="tipe_kerja" class="col-sm-2 col-form-label">Tipe Kerja</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tipe_kerja" name="tipe_kerja" placeholder="Tipe Kerja" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="detail_lowongan_kerja" class="col-sm-2 col-form-label">Detail Lowongan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="detail_lowongan_kerja" name="detail_lowongan_kerja" placeholder="Detail Lowongan" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
  $no=0;
    foreach($list_lowongan_kerja as $a):
      $no++;
      $id_p=$a['id_lowongan_kerja'];
      $id_u=$a['id_user'];
      $judul=$a['judul'];
      $gender=$a['gender'];
      $deskripsi=$a['deskripsi'];
      $tgl=$a['tanggal_penutupan'];
      $tipe=$a['tipe_kerja'];
      $detail=$a['detail_lowongan_kerja'];
  ?>

<!-- ============ MODAL UPDATE LIST PROJECT =============== -->

<div class="modal fade" id="UpdateListProject<?= $id_p; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateListProjectK">Update List Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url().'admin/simpan_list_project'?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group row">
              <label name="id_lowongan_kerja" class="col-sm-2 col-form-label">ID Lowongan Kerja</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="id_lowongan_kerja" name="id_lowongan_kerja" placeholder="ID Lowongan Kerja" value="<?= $id_p; ?>"required>
              </div>
            </div>
            <div class="form-group row">
              <label name="id_user" class="col-sm-2 col-form-label">Nama Perusahaan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="id_user" name="id_user" placeholder="Nama Perusahaan" value="<?= $id_u; ?>"required>
              </div>
            </div>
            <div class="form-group row">
              <label name="judul" class="col-sm-2 col-form-label">Judul</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="gender" class="col-sm-2 col-form-label">Gender</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="gender" name="gender" placeholder="Gender" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="tanggal_penutupan" class="col-sm-2 col-form-label">Tanggal Penutupan</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="tanggal_penutupan" name="tanggal_penutupan" placeholder="Tanggal Penutupan" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="tipe_kerja" class="col-sm-2 col-form-label">Tipe Kerja</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tipe_kerja" name="tipe_kerja" placeholder="Tipe Kerja" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="detail_lowongan_kerja" class="col-sm-2 col-form-label">Detail Lowongan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="detail_lowongan_kerja" name="detail_lowongan_kerja" placeholder="Detail Lowongan" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="kode" value="<?= $id_p;?>">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php endforeach; ?>


<?php
  $no=0;
    foreach($list_lowongan_kerja as $a):
      $no++;
      $id_p=$a['id_lowongan_kerja'];
      $id_u=$a['id_user'];
      $judul=$a['judul'];
      $gender=$a['gender'];
      $deskripsi=$a['deskripsi'];
      $tgl=$a['tanggal_penutupan'];
      $tipe=$a['tipe_kerja'];
      $detail=$a['detail_lowongan_kerja'];
  ?>

	<!--Modal Hapus LIST PROJECT-->
  <div class="modal fade" id="HapusListProject<?= $id_p;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="HapusListProject">Hapus List Project</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form class="form-horizontal" action="<?= base_url().'admin/hapus_list_project'?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
               <input type="hidden" name="kode" value="<?= $id_p;?>"/>
                    <p>Apakah Anda yakin mau menghapus list project <b><?= $judul;?></b> ?</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
              </div>
              </form>
          </div>
      </div>
  </div>

<?php endforeach; ?>
