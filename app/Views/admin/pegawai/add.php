<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= $page ?></h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?= $title ?></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />

                        <form action="/admin/pegawai_save" id="demo-form" data-parsley-validate method="post">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap *:</label>
                                    <input type="text" id="nama" class="form-control" name="nama" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik">NIK :</label>
                                    <input type="number" id="nik" class="form-control" name="nik" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gelar_depan">Gelar Depan :</label>
                                    <input type="text" id="gelar_depan" class="form-control" name="gelar_depan" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gelar_belakang">Gelar Belakang :</label>
                                    <input type="text" id="gelar_belakang" class="form-control" name="gelar_belakang" />
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin :</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                        <option value="P">Perempuan</option>
                                        <option value="L">Laki-laki</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="status_perkawinan">Status Perkawinan :</label>
                                    <select name="status_perkawinan" id="status_perkawinan" class="form-control">
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Janda Cerai">Janda Cerai</option>
                                        <option value="Janda Mati">Janda Mati</option>
                                        <option value="Duda Cerai">Duda Cerai</option>
                                        <option value="Duda Mati">Duda Mati</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir :</label>
                                    <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir :</label>
                                    <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="single_cal3" placeholder="Tanggal Lahir" name="tanggal_lahir">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="telepon">Nomor Telpon * :</label>
                                    <input type="number" id="telepon" class="form-control" name="telepon" required />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Email *:</label>
                                    <input type="email" id="email" class="form-control" name="email" required />
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="provinsi">Provinsi :</label>
                                    <select name="provinsi" class="form-control" id="provinsi">
                                        <option value="">--Pilih Provinsi--</option>
                                        <?php foreach($provinsi as $prov): ?>
                                        <option value="<?=$prov['id']?>"><?=$prov['name']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kabupaten">Kabupaten/Kota :</label>
                                    <select name="kabupaten" id="kabupaten" class="form-control">
                                        <option value="">--Pilih Kabupaten--</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat">Alamat :</label>
                                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan :</label>
                                    <select name="kecamatan" id="kecamatan" class="form-control">
                                        <option value="">--Pilih Kecamatan--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kelurahan">Kelurahan/Desa :</label>
                                    <select name="kelurahan" id="kelurahan" class="form-control">
                                        <option value="">--Pilih Kelurahan--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="jenis_pegawai">Jenis Pegawai :</label>
                                    <select name="jenis_pegawai" id="jenis_pegawai" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <?php foreach ($jenis_peg as $row) : ?>
                                            <option value="<?= $row['jenis_pegawai_id'] ?>"><?= $row['jenis_pegawai'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tanggal_masuk">Tanggal Masuk :</label>

                                    <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="single_cal2" placeholder="Tanggal Masuk">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                        <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="status_pegawai">Status Pegawai :</label>
                                    <select name="status_pegawai" class="form-control" id="status_pegawai">
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rekening">Nomor Bank Kalsel :</label>
                                    <input type="number" id="rekening" class="form-control" name="rekening" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username *:</label>
                                    <input type="text" id="username" class="form-control" name="username" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar">Foto</label>
                                    <input type="file" name="gambar" id="gambar">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button type="submit" class="btn btn-success">Save Pegawai</button>
                                    </div>
                                </div>

                            </div>

                            <br />

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>