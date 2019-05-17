<!-- Begin Page Content -->
<!--<div class="container-fluid"> -->

  <!-- Page Heading -->

  <div class="container-fluid">
    <?= form_error('user', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
      <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newMemberModal">
        <i class="fas fa-plus fa-sm text-white-50">
        </i>
        Tambah Member
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
                          #
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending" style="width: 10px;">
                          ID
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 43px;">
                          Nama
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" style="width: 74px;">
                          Gender
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Tempat Lahir: activate to sort column ascending" style="width: 50px;">
                          Tempat Lahir
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Tanggal Lahir: activate to sort column ascending" style="width: 85px;">
                          Tanggal Lahir
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Alamat: activate to sort column ascending" style="width: 48px;">
                          Alamat
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Kecamatan: activate to sort column ascending" style="width: 48px;">
                          Kecamatan
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Foto: activate to sort column ascending" style="width: 48px;">
                          Foto
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Deskripsi: activate to sort column ascending" style="width: 48px;">
                          Deskripsi
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Member Since: activate to sort column ascending" style="width: 48px;">
                          Member Since
                        </th>
                        <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 41px;">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=0;
                          foreach($member as $a):
                            $no++;
                            $id=$a['id_user'];
                            $nama=$a['nama_member'];
                            $gender=$a['gender_member'];
                            $tempat=$a['tempat_lahir'];
                            $tanggal=$a['tanggal_lahir'];
                            $alamat=$a['alamat'];
                            $kec=$a['id_kec'];
                            $foto=$a['foto'];
                            $deskripsi=$a['deskripsi_member'];
                            $ms=$a['modified_at']
                        ?>
                      <tr role="row" class="odd">
                        <td><?= $no;?></td>
                        <td><?= $a['id_user'];?></td>
                        <td><?= $a['nama_member'];?></td>
                        <td><?= $a['gender_member'];?></td>
                        <td><?= $a['tempat_lahir'];?></td>
                        <td><?= $a['tanggal_lahir'];?></td>
                        <td><?= $a['alamat'];?></td>
                        <td><?= $a['id_kec']; ?></td>
                        <td><img src="<?= base_url('assets/images/profile/').$foto;?>" class="img-profile rounded-circle" style="width:60px;"></td>
                        <td><?= $a['deskripsi_member'];?></td>
                        <td><?= $a['modified_at'];?></td>
                        <td>
                          <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#ModalUpdate<?= $id;?>"><i class="fas fa-edit"></i></a>
                          <a class="btn btn-danger btn-sm btn-hapus" href="" data-toggle="modal" data-target="#ModalHapus<?= $id;?>"><i class="fas fa-trash"></i></a>
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
<!-- ============ MODAL ADD MEMBER =============== -->
<div class="modal fade" id="newMemberModal" tabindex="-1" role="dialog" aria-labelledby="newMemberModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMemberModalLabel">Add New Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url().'admin/simpan_member'?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group row">
              <label name="nama_member" class="col-sm-2 col-form-label">Nama Member</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_member" name="nama_member" placeholder="Nama Member" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="gender_member" class="col-sm-2 col-form-label">Gender Member</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="gender_member" name="gender_member" placeholder="Gender Member" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="deskripsi_member" class="col-sm-2 col-form-label">Deskripsi Member</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="deskripsi_member" name="deskripsi_member" placeholder="Deskripsi Member" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="alamat" class="col-sm-2 col-form-label">Alamat Member</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Member" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">Foto</div>
              <div class="col-sm-10">
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('assets/images/profile/')?>" class="img-thumbnail">
                  </div>
                  <div class="col-sm-9">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" >
                      <label class="custom-file-label">Choose File<label>
                    </div>
                  </div>
                </div>
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
    foreach($member as $a):
      $no++;
      $id=$a['id_user'];
      $nama=$a['nama_member'];
      $gender=$a['gender_member'];
      $tempat=$a['tempat_lahir'];
      $tanggal=$a['tanggal_lahir'];
      $deskripsi=$a['deskripsi_member'];
      $alamat=$a['alamat'];
      $kec=$a['id_kec'];
      $foto=$a['foto'];
?>

<!-- ============ MODAL UPDATE MEMBER=============== -->
<div class="modal fade" id="ModalUpdate<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalUpdate">Update Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url().'admin/update_member'?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group row">
              <label name="nama_member" class="col-sm-2 col-form-label">Nama Member</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_member" name="nama_member" value="<?= $nama; ?>" placeholder="Nama Member" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="gender_member" class="col-sm-2 col-form-label">Gender Member</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="gender_member" name="gender_member" value="<?= $gender; ?>" placeholder="Gender Member" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $tempat; ?>" placeholder="Tempat Lahir" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $tanggal; ?>" placeholder="Tanggal Lahir" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="deskripsi_member" class="col-sm-2 col-form-label">Deskripsi Member</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="deskripsi_member" name="deskripsi_member" value="<?= $deskripsi; ?>" placeholder="Deskripsi Member" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="alamat" class="col-sm-2 col-form-label">Alamat Member</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat; ?>" placeholder="Alamat Member" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $kec; ?>" placeholder="Alamat Member" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">Foto</div>
              <div class="col-sm-10">
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('/assets/images/profile/'). $foto; ?>" class="img-thumbnail">
                  </div>
                  <div class="col-sm-9">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" >
                      <label class="custom-file-label" for="foto">Choose File<label>
                    </div>
                  </div>
                </div>
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
      foreach($member as $a):
        $no++;
        $id=$a['id_user'];
        $nama=$a['nama_member'];
        $gender=$a['gender_member'];
        $tempat=$a['tempat_lahir'];
        $tanggal=$a['tanggal_lahir'];
        $deskripsi=$a['deskripsi_member'];
        $alamat=$a['alamat'];
        $foto=$a['foto'];
  ?>
	<!--Modal Hapus Post-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ModalHapus">Hapus Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <form class="form-horizontal" action="<?= base_url().'admin/hapus_member'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							       <input type="hidden" name="kode" value="<?= $id;?>"/>
                          <p>Apakah Anda yakin mau menghapus member <b><?= $nama;?></b> ?</p>
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
  <script>
  $(document).ready( function () {
      $('#myTable').DataTable();
  } );
  </script>
