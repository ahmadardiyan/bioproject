<!-- Begin Page Content -->
<!--<div class="container-fluid"> -->

  <!-- Page Heading -->

  <div class="container-fluid">
    <?= form_error('user', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
      <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newCompanyModal">
        <i class="fas fa-plus fa-sm text-white-50">
        </i>
        Tambah Company
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
                          Nama Perusahaan
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Website Perusahaan: activate to sort column ascending" style="width: 74px;">
                          Website Perusahaan
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Alamat Perusahaan: activate to sort column ascending" style="width: 74px;">
                          Alamat Perusahaan
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Tagline: activate to sort column ascending" style="width: 74px;">
                          Tagline
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Deskripsi: activate to sort column ascending" style="width: 74px;">
                          Deskripsi
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Since: activate to sort column ascending" style="width: 74px;">
                          Since
                        </th>
                        <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 41px;">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=0;
                          foreach($perusahaan as $a):
                            $no++;
                            $id=$a['id_user'];
                            $nama=$a['nama_perusahaan'];
                            $website=$a['website_perusahaan'];
                            $alamat=$a['alamat_perusahaan'];
                            $tagline=$a['tagline'];
                            $deskripsi=$a['deskripsi_perusahaan'];
                            $ms=$a['created_at'];
                        ?>
                      <tr role="row" class="odd">
                        <td><?= $no;?></td>
                        <td><?= $id;?></td>
                        <td><?= $nama;?></td>
                        <td><?= $website;?></td>
                        <td><?= $alamat;?></td>
                        <td><?= $tagline;?></td>
                        <td><?= $deskripsi;?></td>
                        <td><?= $ms;?></td>
                        <td>
                          <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#UpdateCompany<?= $id;?>"><i class="fas fa-edit"></i></a>
                          <a class="btn btn-danger btn-sm btn-hapus" href="" data-toggle="modal" data-target="#HapusCompany<?= $id;?>"><i class="fas fa-trash"></i></a>
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

<!-- ============ MODAL ADD COMPANY =============== -->
<div class="modal fade" id="newCompanyModal" tabindex="-1" role="dialog" aria-labelledby="newCompanyModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMemberModalLabel">Tambahkan Perusahaan Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url().'admin/simpan_company'?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group row">
              <label name="nama_perusahaan" class="col-sm-2 col-form-label">Nama Company</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Nama Perusahaan" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="website_perusahaan" class="col-sm-2 col-form-label">Website Perusahaan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="website_perusahaan" name="website_perusahaan" placeholder="Website Perusahaan" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="alamat_perusahaan" class="col-sm-2 col-form-label">Alamat Perusahaan</label>
              <div class="col-sm-10">
                <textarea type="text" cols="20" rows="3" class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" placeholder="Alamat Perusahaan" required></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label name="tagline" class="col-sm-2 col-form-label">Tagline</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tagline" name="tagline" placeholder="Tagline" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="deskripsi_perusahaan" class="col-sm-2 col-form-label">Deskripsi Perusahaan</label>
              <div class="col-sm-10">
                <textarea type="text" cols="30" rows="6" class="form-control" id="deskripsi_perusahaan" name="deskripsi_perusahaan" placeholder="Deskripsi Perusahaan" required></textarea>
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
    foreach($perusahaan as $a):
      $no++;
      $id=$a['id_user'];
      $nama=$a['nama_perusahaan'];
      $website=$a['website_perusahaan'];
      $alamat=$a['alamat_perusahaan'];
      $tagline=$a['tagline'];
      $deskripsi=$a['deskripsi_perusahaan'];
      $ms=$a['created_at'];
  ?>

<!-- ============ MODAL UPDATE COMPANY=============== -->
<div class="modal fade" id="UpdateCompany<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateCompany">Update Perusahaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url().'admin/update_company'?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group row">
              <label name="nama_perusahaan" class="col-sm-2 col-form-label">Nama Perusahaan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?= $nama; ?>" placeholder="Nama Perusahaan" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="website_perusahaan" class="col-sm-2 col-form-label">Website Perusahaan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="website_perusahaan" name="website_perusahaan" value="<?= $website; ?>" placeholder="Website Perusahaan" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="alamat_perusahaan" class="col-sm-2 col-form-label">Alamat Perusahaan</label>
              <div class="col-sm-10">
                <textarea type="text" cols="20" rows="3" class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" placeholder="Alamat Perusahaan" required><?= $alamat; ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label name="tagline" class="col-sm-2 col-form-label">Tagline</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tagline" name="tagline" value="<?= $tagline; ?>" placeholder="Tagline" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="deskripsi_perusahaan" class="col-sm-2 col-form-label">Deskripsi Perusahaan</label>
              <div class="col-sm-10">
                <textarea type="text" cols="30" rows="6" class="form-control" id="deskripsi_perusahaan" name="deskripsi_perusahaan" placeholder="Deskripsi Perusahaan" required><?= $deskripsi; ?></textarea>
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
    foreach($perusahaan as $a):
      $no++;
      $id=$a['id_user'];
      $nama=$a['nama_perusahaan'];
      $website=$a['website_perusahaan'];
      $alamat=$a['alamat_perusahaan'];
      $tagline=$a['tagline'];
      $deskripsi=$a['deskripsi_perusahaan'];
      $ms=$a['created_at'];
  ?>
  <!--Modal Hapus Company-->
        <div class="modal fade" id="HapusCompany<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog ">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="HapusCompany">Hapus Perusahaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <form class="form-horizontal" action="<?= base_url().'admin/hapus_company'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							       <input type="hidden" name="kode" value="<?= $id;?>"/>
                          <p>Apakah Anda yakin mau menghapus perusahaan <b><?= $nama;?></b> ?</p>
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
