<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$title?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active"><?=$title?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                    <h3 class="card-title">Data Bidang</h3>
                  </div>
                  <div class="col-md-6">
                    <button href="/add_bidang" type="button" data-toggle="modal" data-target="#modal-bidang" class="btn btn-primary float-sm-right">Add Bidang</button>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no = 1; 
                      foreach ($bidang as $row): ?>
                    <tr>
                      <td><?=$no++;?></td>
                      <td><?=$row['nama']?></td>
                      <td><?=$row['ket']?></td>
                      <td>
                          <a data-toggle="modal" data-target="#modal-edit<?=$row['bidang_id']?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                          <a data-toggle="modal" data-target="#modal-del<?=$row['bidang_id']?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" id="modal-bidang">
        <div class="modal-dialog">
          <div class="modal-content">
          <?=form_open_multipart('save_bidang', array('method'=>'post'));?>
            <div class="modal-header">
              <h4 class="modal-title">Add Bidang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="namabidang">Bidang</label>
                    <input type="text" class="form-control" name="bidang" id="namabidang" required>
                </div>
                <div class="form-group">
                    <label for="ketbidang">Keterangan</label>
                    <textarea name="keterangan" id="ketbidang" class="form-control" cols="30" rows="2"></textarea>
                    <!-- <input type="text" name="keterangan" id="ketbidang"> -->
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?=form_close();?>
          </div>
        </div>
      </div>
      
      <?php foreach ($bidang as $data): ?>
    <div class="modal fade" id="modal-edit<?=$data['bidang_id']?>">
        <div class="modal-dialog">
          <div class="modal-content">
          <?=form_open_multipart('update_bidang', array('method'=>'post'));?>
            <div class="modal-header">
              <h4 class="modal-title">Edit Bidang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="namabidang">Bidang</label>
                    <input type="hidden" name="bidang_id" value="<?=$data['bidang_id'] ?>">
                    <input type="text" class="form-control" name="bidang" id="namabidang" value="<?=$data['nama']?>" required>
                </div>
                <div class="form-group">
                    <label for="ketbidang">Keterangan</label>
                    <textarea name="keterangan" id="ketbidang" class="form-control" cols="30" rows="2"><?=$data['ket']?></textarea>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
            <?=form_close();?>
          </div>
        </div>
    </div>

    <div class="modal fade" id="modal-del<?=$data['bidang_id']?>">
        <div class="modal-dialog">
          <div class="modal-content">
              <form action="del_bidang" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Bidang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin Menghapus <strong><?=$data['nama']; ?></strong>
                <input type="hidden" name="bidang_id" value="<?=$data['bidang_id']; ?>">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Delete</button>
            </div>
            </form>
          </div>
        </div>
    </div>
    <?php endforeach; ?>