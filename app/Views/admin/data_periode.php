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
                    <h3 class="card-title">Data Periode</h3>
                  </div>
                  <div class="col-md-6">
                    <button href="/add_periode" type="button" data-toggle="modal" data-target="#modal-periode" class="btn btn-primary float-sm-right">Add Periode</button>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                    <th>Total Hari</th>
                    <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no = 1; 
                      foreach ($periode as $row): ?>
                    <tr>
                      <td><?=$no++;?></td>
                      <td><?=$row['kode']?></td>
                      <td><?=$row['date_start']?></td>
                      <td><?=$row['date_end']?></td>
                      <td><?=$row['total']?></td>
                      <td>
                          <a data-toggle="modal" data-target="#modal-edit<?=$row['periode_id']?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                          <a data-toggle="modal" data-target="#modal-del<?=$row['periode_id']?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
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

    <div class="modal fade" id="modal-periode">
        <div class="modal-dialog">
          <div class="modal-content">
          <?=form_open_multipart('save_periode', array('method'=>'post'));?>
            <div class="modal-header">
              <h4 class="modal-title">Add Periode</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="namaperiode">Kode Periode</label>
                    <input type="text" class="form-control" name="kode" id="namaperiode" required>
                </div>
                <div class="form-group">
                    <label for="datestart">Tanggal Mulai</label>
                    <input type="date" class="form-control" name="date_start" id="datestart">
                </div>
                <div class="form-group">
                    <label for="dateend">Tanggal Berakhir</label>
                    <input type="date" class="form-control" name="date_end" id="dateend">
                </div>
                <div class="form-group">
                    <label for="total">Total Hari Kerja</label>
                    <input type="number" class="form-control" name="total" id="total">
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
      
      <?php foreach ($periode as $data): ?>
    <div class="modal fade" id="modal-edit<?=$data['periode_id']?>">
        <div class="modal-dialog">
          <div class="modal-content">
          <?=form_open_multipart('update_periode', array('method'=>'post'));?>
            <div class="modal-header">
              <h4 class="modal-title">Edit Periode</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="namaperiode">Kode Periode</label>
                    <input type="text" class="form-control" name="kode" id="namaperiode" value="<?=$data['kode'] ?>">
                </div>
                <div class="form-group">
                    <label for="datestart">Tanggal Mulai</label>
                    <input type="date" name="date_start" class="form-control" id="datestart" value="<?=$data['date_start'] ?>">
                </div>
                <div class="form-group">
                    <label for="dateend">Tanggal Berakhir</label>
                    <input type="date" name="date_end" class="form-control" id="dateend" value="<?=$data['date_end'] ?>">
                </div>
                <div class="form-group">
                    <label for="total">Total Hari Kerja</label>
                    <input type="number" name="total" class="form-control" id="total" value="<?=$data['total'] ?>">
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

    <div class="modal fade" id="modal-del<?=$data['periode_id']?>">
        <div class="modal-dialog">
          <div class="modal-content">
              <form action="del_periode" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Periode</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin Menghapus <strong><?=$data['kode']; ?></strong>
                <input type="hidden" name="periode_id" value="<?=$data['periode_id']; ?>">
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