<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3><?= $page; ?></h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?= $title; ?></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <?= $validation->listErrors(); ?>
                        <form action="/pegawai/peminjaman_save" enctype="multipart/form-data" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pegawai
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="nama_pegawai" value="<?= $pegawai->nama ?>" class="form-control col-md-7 col-xs-12" disabled>
                                    <input type="hidden" name="pegawai" value="<?= $pegawai->pegawai_id ?>" class="form-control col-md-7 col-xs-12" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Barang
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="inventaris" id="inventaris" class="form-control col-md-7 col-xs-12" required>
                                        <option value="">--Pilih Nama Barang--</option>
                                        <?php foreach ($inventaris as $row) : ?>
                                            <option value="<?= $row['inventaris_id']; ?>"><?= $row['nama_barang']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal-pinjam" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Pinjam</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="tanggal-pinjam" class="form-control col-md-7 col-xs-12" type="date" name="tanggal_pinjam">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keperluan" class="control-label col-md-3 col-sm-3 col-xs-12">Keperluan <br></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="keperluan" class="form-control col-md-7 col-xs-12" id="keperluan" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jumlah" class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="jumlah" class="form-control col-md-7 col-xs-12" type="number" name="jumlah">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lokasi_pinjam" class="control-label col-md-3 col-sm-3 col-xs-12">Lokasi Peminjaman</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="lokasi_pinjam" class="form-control col-md-7 col-xs-12" type="text" name="lokasi_pinjam">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="file" class="control-label col-md-3 col-sm-3 col-xs-12">Foto <br> <small>(dokumen/surat/bukti)</small> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="file" class="form-control col-md-7 col-xs-12" type="file" name="file">
                                    <small>*) File yang diupload hanya boleh file foto (jpg,jpeg,png,gif) <br> dengan ukuran maksimal 2MB</small>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>