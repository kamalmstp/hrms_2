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
                        <form action="/admin/peminjaman_save" enctype="multipart/form-data" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <?php $inputs = session()->getFlashdata('inputs'); ?>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pegawai
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="pegawai" class="form-control col-md-7 col-xs-12" id="pegawai">
                                        <option value="">--Pilih Pegawai--</option>
                                        <?php foreach ($pegawai as $row) : ?>
                                            <option value="<?= $row['pegawai_id'] ?>" <?php if ($inputs['pegawai'] == $row['pegawai_id']) {
                                                                                            echo 'selected';
                                                                                        } else {
                                                                                        } ?>><?= $row['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Barang
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="inventaris" id="inventaris" class="form-control col-md-7 col-xs-12">
                                        <option value="">--Pilih Nama Barang--</option>
                                        <?php foreach ($inventaris as $row) : ?>
                                            <option value="<?= $row['inventaris_id']; ?>" <?php if ($inputs['inventaris'] == $row['inventaris_id']) {
                                                                                                echo 'selected';
                                                                                            } else {
                                                                                            } ?>><?= $row['nama_barang']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal-pinjam" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Pinjam</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="tanggal-pinjam" class="form-control col-md-7 col-xs-12" type="date" value="<?= $inputs['tanggal_pinjam'] ?>" name="tanggal_pinjam">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keperluan" class="control-label col-md-3 col-sm-3 col-xs-12">Keperluan <br></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="keperluan" class="form-control col-md-7 col-xs-12" id="keperluan" rows="2"><?= $inputs['keperluan'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jumlah" class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="jumlah" class="form-control col-md-7 col-xs-12" type="number" value="<?= $inputs['jumlah'] ?>" name="jumlah">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lokasi_pinjam" class="control-label col-md-3 col-sm-3 col-xs-12">Lokasi Peminjaman</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="lokasi_pinjam" class="form-control col-md-7 col-xs-12" value="<?= $inputs['lokasi_pinjam'] ?>" type="text" name="lokasi_pinjam">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="status" id="status" class="form-control col-md-7 col-xs-12">
                                        <option value="">--Pilih Status--</option>
                                        <option value="Menunggu" <?php if ($inputs['status'] == 'Menunggu') {
                                                                        echo 'selected';
                                                                    } else {
                                                                    } ?>>Menunggu</option>
                                        <option value="Diterima" <?php if ($inputs['status'] == 'Diterima') {
                                                                        echo 'selected';
                                                                    } else {
                                                                    } ?>>Diterima</option>
                                        <option value="Ditolak" <?php if ($inputs['status'] == 'Ditolak') {
                                                                    echo 'selected';
                                                                } else {
                                                                } ?>>Ditolak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="file" class="control-label col-md-3 col-sm-3 col-xs-12">Foto <br> <small>(dokumen/surat/bukti)</small> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="file" class="form-control col-md-7 col-xs-12" type="file" name="file">
                                    <small>*) File yang diupload boleh file foto (jpg,jpeg,png,gif) <br> File document yang diperbolehkan (pdf, doc, docx) <br> dengan ukuran maksimal 2MB</small>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="/admin/riwayat_peminjaman" class="btn btn-primary" type="button">Cancel</a>
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