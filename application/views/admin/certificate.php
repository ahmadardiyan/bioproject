<!-- Begin Page Content -->
<!--<div class="container-fluid"> -->

  <!-- Page Heading -->

  <div class="container-fluid">
    <?= form_error('user', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
      <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newSertifikatModal">
        <i class="fas fa-plus fa-sm text-white-50">
        </i>
        Tambah Sertifikat
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
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending" style="width: 10px;">
                          No
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="ID Sertifikat: activate to sort column ascending" style="width: 10px;">
                          ID Sertifikat
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 43px;">
                          Username
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Nama Sertifikat: activate to sort column ascending" style="width: 74px;">
                          Nama Sertifikat
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Tahun: activate to sort column ascending" style="width: 48px;">
                          Tahun
                        </th>
                        <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 41px;">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=0;
                          foreach($sertifikat as $a):
                            $no++;
                            $id=$a['id_sertifikat'];
                            $username=$a['username'];
                            $nama=$a['nama_sertifikat'];
                            $tahun=$a['tahun'];
                        ?>
                      <tr role="row" class="odd">
                        <td><?= $no;?></td>
                        <td><?= $id;?></td>
                        <td><?= $username;?></td>
                        <td><?= $nama;?></td>
                        <td><?= $tahun;?></td>
                        <td>
                          <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#UpdateSertifikat<?= $id;?>"><i class="fas fa-edit"></i></a>
                          <a class="btn btn-danger btn-sm btn-hapus" href="" data-toggle="modal" data-target="#HapusSertifikat<?= $id;?>"><i class="fas fa-trash"></i></a>
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

<!-- ============ MODAL ADD CERTIFICATE =============== -->
<div class="modal fade" id="newSertifikatModal" tabindex="-1" role="dialog" aria-labelledby="newSertifikatModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSertifikatModalLabel">Add New Education</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url().'admin/simpan_certificate'?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group row">
              <label name="id_user" class="col-sm-2 col-form-label">ID User</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="id_user" name="id_user" placeholder="ID User" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="nama_sertifikat" class="col-sm-2 col-form-label">Nama Sertifikat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_sertifikat" name="nama_sertifikat" placeholder="Nama Sertifikat" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="tahun" class="col-sm-2 col-form-label">Tahun</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" required>
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
    foreach($sertifikat as $a):
      $no++;
      $id=$a['id_sertifikat'];
      $id_user=$a['id_user'];
      $nama=$a['nama_sertifikat'];
      $tahun=$a['tahun'];
  ?>

<!-- ============ MODAL UPDATE SERVICE=============== -->
<div class="modal fade" id="UpdateSertifikat<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateSertifikat">Update Certificate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url().'admin/update_certificate';?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group row">
              <label name="id_user" class="col-sm-2 col-form-label">ID User</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="id_user" name="id_user" placeholder="ID User" value="<?= $id_user; ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="nama_sertifikat" class="col-sm-2 col-form-label">Nama Sertifikat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_sertifikat" name="nama_sertifikat" placeholder="Nama Sertifikat" value="<?= $nama; ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="tahun" class="col-sm-2 col-form-label">Tahun</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" value="<?= $tahun; ?>" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="kode" value="<?= $id;?>">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
    </div>
    </div>
</div>

<?php endforeach;?>

<?php
  $no=0;
    foreach($sertifikat as $a):
      $no++;
      $id=$a['id_sertifikat'];
      $id_user=$a['id_user'];
      $nama=$a['nama_sertifikat'];
      $tahun=$a['tahun'];
  ?>
	<!--Modal Hapus SERTIFIKAT-->
  <div class="modal fade" id="HapusSertifikat<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="HapusSertifikat">Hapus Sertifikat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form class="form-horizontal" action="<?= base_url().'admin/hapus_certificate'?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
               <input type="hidden" name="kode" value="<?= $id;?>"/>
                    <p>Apakah Anda yakin mau menghapus sertifikat ini ?</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
              </div>
              </form>
          </div>
      </div>
  </div>
	<?php endforeach;?>
