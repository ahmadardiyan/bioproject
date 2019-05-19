<!-- Begin Page Content -->
<!--<div class="container-fluid"> -->

  <!-- Page Heading -->

  <div class="container-fluid">
    <?= form_error('user', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
      <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newServiceModal">
        <i class="fas fa-plus fa-sm text-white-50">
        </i>
        Tambah Service
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
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Icon: activate to sort column ascending" style="width: 43px;">
                          Icon
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Title: activate to sort column ascending" style="width: 74px;">
                          Title
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Deskripsi: activate to sort column ascending" style="width: 48px;">
                          Deskripsi
                        </th>
                        <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 41px;">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=0;
                          foreach($service as $a):
                            $no++;
                            $id=$a['id'];
                            $icon=$a['icon'];
                            $title=$a['title'];
                            $deskripsi=$a['deskripsi'];
                        ?>
                      <tr role="row" class="odd">
                        <td><?= $no;?></td>
                        <td><?= $id;?></td>
                        <td><?= $icon;?></td>
                        <td><?= $title?></td>
                        <td><?= $deskripsi;?></td>
                        <td>
                          <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#UpdateService<?= $id;?>"><i class="fas fa-edit"></i></a>
                          <a class="btn btn-danger btn-sm btn-hapus" href="" data-toggle="modal" data-target="#HapusService<?= $id;?>"><i class="fas fa-trash"></i></a>
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
<!-- ============ MODAL ADD SERVICE =============== -->
<div class="modal fade" id="newServiceModal" tabindex="-1" role="dialog" aria-labelledby="newServiceModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newServiceModalLabel">Add New Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url().'admin/simpan_service'?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group row">
              <label name="icon" class="col-sm-2 col-form-label">Icon</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="title" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
              <div class="col-sm-10">
                <textarea type="text" cols="30" rows="6" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required></textarea>
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
    foreach($service as $a):
      $no++;
      $id=$a['id'];
      $icon=$a['icon'];
      $title=$a['title'];
      $deskripsi=$a['deskripsi'];
  ?>

<!-- ============ MODAL UPDATE SERVICE=============== -->
<div class="modal fade" id="UpdateService<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateService">Update Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url().'admin/update_service'?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group row">
              <label name="icon" class="col-sm-2 col-form-label">Icon</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="icon" name="icon" value="<?= $icon; ?>" placeholder="Icon" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="title" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" value="<?= $title; ?>" placeholder="Title" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
              <div class="col-sm-10">
                <textarea type="text" cols="30" rows="6" class="form-control" id="deskripsi" name="deskripsi" value="<?= $deskripsi; ?>" placeholder="Deskripsi" required></textarea>
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
    foreach($service as $a):
      $no++;
      $id=$a['id'];
      $icon=$a['icon'];
      $title=$a['title'];
      $deskripsi=$a['deskripsi'];
  ?>
	<!--Modal Hapus SERVICE-->
        <div class="modal fade" id="HapusService<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="HapusService">Hapus Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <form class="form-horizontal" action="<?= base_url().'admin/hapus_service'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							       <input type="hidden" name="kode" value="<?= $id;?>"/>
                          <p>Apakah Anda yakin mau menghapus service <b><?= $title;?></b> ?</p>
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
