<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$title?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pegawai</a></li>
              <li class="breadcrumb-item active"><?=$title;?></li>
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
                    <h3 class="card-title">Data Pegawai</h3>
                  </div>
                  <div class="col-md-6">
                    <a href="/add_pegawai" type="button" class="btn btn-primary float-sm-right">Add Pegawai</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Pegawai</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Akun</th>
                    <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach($pegawai as $row): ?>
                    <tr>
                      <td><?=$no++; ?></td>
                      <td>
                        <?php if (!empty($row['foto'])) { ?>
                          <div class="user-panel">
                            <div class="image">
                              <img src="/img/pegawai/<?=$row['foto'] ?>" class="img-circle elevation-2">
                            </div>
                          </div>
                          <?php } else { ?>
                          <div class="user-panel">
                            <div class="image">
                              <img src="/img/pegawai/user.jpg" class="img-circle elevation-2">
                            </div>
                          </div>
                        <?php } ?>
                      </td>
                      <td><?=$row['nama'] ?></td>
                      <td><?php if ($row['jenis_kelamin'] == 'L') {
                          echo 'Laki-Laki';
                        }else {
                          echo 'Perempuan';
                        } ?>
                      </td>
                      <td><?=$row['tempat_lahir'].", ".$row['tanggal_lahir'] ?></td>
                      <td><?=$row['alamat'] ?></td>
                      <td><button type="button" class="btn btn-success"><i class="fa fa-key"></i> Buat</button></td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#"><i class="fa fa-pen"></i> Edit</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fa fa-trash"></i> Delete</a>
                          </div>
                        </div>
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