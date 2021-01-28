<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$title?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pegawai</a></li>
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
                <?=form_open_multipart('save_pegawai', array('method'=>'post'));?>
                    <div class="card-header">
                        <h3 class="card-title"><?=$title;?></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama" class="form-control" />
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. KTP</label>
                                <div class="col-sm-9">
                                    <input type="number" name="no_ktp" class="form-control" />
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text" name="tempat_lahir" class="form-control" />
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="dd/mm/yyyy" />
                                </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select name="jenis_kelamin" class="form-control">
                                    <option disabled selected>-- Pilih --</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status Perkawinan</label>
                                <div class="col-sm-9">
                                    <select name="status_perkawinan" class="form-control">
                                    <option disabled selected>-- Pilih --</option>
                                    <option value="Belum kawin">Belum kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Cerai mati">Cerai mati</option>
                                    <option value="Cerai hidup">Cerai hidup</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status Pegawai</label>
                                    <div class="col-sm-9">
                                        <select name="status_pegawai" class="form-control">
                                        <option disabled selected>-- Pilih --</option>
                                        <option value="Karyawan tetap">Karyawan tetap</option>
                                        <option value="Karyawan kontrak">Karyawan kontrak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Jabatan</label>
                                    <div class="col-sm-9">
                                        <select name="id_jabatan" class="form-control">
                                        <option disabled selected>-- Pilih --</option>
                                        <?php foreach ($jabatan as $row):?>
                                            <option value="<?=$row['jabatan_id']?>"><?=$row['nama']?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Alamat Rumah</label>
                                <div class="col-sm-9">
                                    <textarea name="alamat" class="form-control" rows="3"/></textarea>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Bidang</label>
                            <div class="col-sm-9">
                                <select name="id_bidang" class="form-control">
                                <option disabled selected>-- Pilih --</option>
                                <?php foreach ($bidang as $row):?>
                                    <option value="<?=$row['bidang_id']?>"><?=$row['nama']?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Pengangkatan</label>
                            <div class="col-sm-9">
                                <input type="date" name="tanggal_pengangkatan" class="form-control" placeholder="dd/mm/yyyy" />
                            </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                                <div class="col-sm-9">
                                    <select name="pendidikan_terakhir" class="form-control">
                                    <option disabled selected>-- Pilih --</option>
                                    <option value="SMP/SMA">SMP/SMA</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No. Handphone</label>
                                <div class="col-sm-9">
                                    <input type="number" name="no_hp" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" />
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Foto</label>
                                <div class="col-sm-9">
                                    <input type="file" name="foto">
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-sm-right">Simpan</button>
                        <a href="/data_pegawai" class="btn btn-secondary" type="button">Batal</a>
                    </div>
                <?=form_close();?>
                </div>
              </div>
          </div>
      </div>
    </section>