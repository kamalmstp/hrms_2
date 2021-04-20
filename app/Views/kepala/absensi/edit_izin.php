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
                        <form action="/kepala/izin_pegawai_save" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pegawai
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="pegawai" class="form-control col-md-7 col-xs-12" required id="pegawai">
                                        <option value="">--Pilih Pegawai--</option>
                                        <?php foreach ($pegawai as $row) : ?>
                                            <option value="<?= $row['pegawai_id'] ?>" <?php if ($row['pegawai_id'] == $izin_pegawai->pegawai_id) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $row['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Izin
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="jenis_izin" id="jenis_izin" class="form-control col-md-7 col-xs-12" required>
                                        <option value="">--Pilih Jenis Izin--</option>
                                        <?php foreach ($jenis_izin as $row) : ?>
                                            <option value="<?= $row['izin_jenis_id']; ?>" <?php if ($row['izin_jenis_id'] == $izin_pegawai->izin_jenis_id) {
                                                                                                echo 'selected';
                                                                                            } ?>><?= $row['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Izin
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="nama_izin" class="form-control col-md-7 col-xs-12" required id="nama_izin">
                                        <option value="">--Pilih Nama Izin--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal-awal" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Awal</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="tanggal-awal" class="form-control col-md-7 col-xs-12" value="<?= $izin_pegawai->tanggal_awal ?>" type="date" name="tanggal_awal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal-akhir" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Akhir</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="tanggal-akhir" class="form-control col-md-7 col-xs-12" value="<?= $izin_pegawai->tanggal_akhir ?>" type="date" name="tanggal_akhir">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="status" class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="status" id="status" class="form-control col-md-7 col-xs-12">
                                        <option value="">--Pilih Status--</option>
                                        <option value="Menunggu" <?php if ($izin_pegawai->status == 'Menunggu') {
                                                                        echo 'selected';
                                                                    } ?>>Menunggu</option>
                                        <option value="Diterima" <?php if ($izin_pegawai->status == 'Diterima') {
                                                                        echo 'selected';
                                                                    } ?>>Diterima</option>
                                        <option value="Ditolak" <?php if ($izin_pegawai->status == 'Ditolak') {
                                                                    echo 'selected';
                                                                } ?>>Ditolak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan <br> <small>(misal: tempat, dan lain-lain)</small> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="keterangan" class="form-control col-md-7 col-xs-12" id="keterangan" rows="2"><?= $izin_pegawai->keterangan; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="file" class="control-label col-md-3 col-sm-3 col-xs-12">File <br> <small>(dokumen/surat/bukti)</small> </label>
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

<script type="text/javascript">
    $(document).ready(function() {
        $("#jenis_izin").change(function() {

            // variabel dari nilai combo box kendaraan
            var izin_jenis_id = $("#jenis_izin").val();

            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                url: "/kepala/get_nama_izin",
                method: "POST",
                data: {
                    izin_jenis_id: izin_jenis_id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;

                    html += '<option value="">--Pilih Nama Izin--</option>'
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].izin_id + '>' + data[i].nama + '</option>';
                    }
                    $('#nama_izin').html(html);

                }
            });
        });
    })
</script>


<?= $this->endSection(); ?>