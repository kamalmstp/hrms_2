<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3><?= $page; ?> </h3>
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
                        <div class="col-md-12 col-sm-9 col-xs-12">
                            <div class="profile_title">
                                <div class="col-md-6">
                                    <form action="#" method="post" class="form-horizontal form-label-left">

                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="bulan" id="bulan">
                                                    <?php foreach ($periode as $row) : ?>
                                                        <option value="<?= $row['kode'] ?>" <?php if ($aktif->kode == $row['kode']) {
                                                                                                echo 'selected';
                                                                                            } ?>><?= $row['tanggal_mulai']; ?> - <?= $row['tanggal_akhir']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Absensi Pada Periode <strong><?= $aktif->kode; ?> - (<?= $aktif->tanggal_mulai; ?> s/d <?= $aktif->tanggal_akhir; ?>)</strong></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Pulang</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $libur = new \App\Models\LiburModel();
                                $finger = new \App\Models\FingerprintModel();
                                $setting = new \App\Models\AbsenSettingModel();
                                $izin = new \App\Models\IzinModel();
                                ?>
                                <?php $no = 1; ?>
                                <?php
                                for ($i = 0; $i < count($list); $i++) {
                                    if (count($libur->cek_libur($list[$i])->getResultArray()) !== 1) {
                                        $masuk = $finger->masuk($pegawai->sidik_id, date('Y-m-d', strtotime($list[$i])))->getRow();
                                        // dd($masuk);
                                        $id_set = 1;
                                        $pulang = $finger->pulang($pegawai->sidik_id, date('Y-m-d', strtotime($list[$i])))->getRow();
                                        $mesin = $setting->getWhere(array('setting_id' => 1))->getRow();
                                ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $list[$i]; ?></td>
                                            <td><?php if (empty($masuk)) {
                                                    echo '-';
                                                } else {
                                                    echo $masuk->time;
                                                } ?>
                                            </td>
                                            <td><?php if (empty($pulang)) {
                                                    echo '-';
                                                } else {
                                                    echo $pulang->time;
                                                } ?></td>
                                            <td>
                                                <?php if (!empty($masuk->time) && !empty($pulang->time)) {
                                                    echo 'Absen';
                                                } else {
                                                    echo 'Tidak Absen';
                                                } ?>
                                            </td>
                                            <td></td>
                                        </tr>
                                    <?php
                                    } else {
                                        $libur_d = $libur->cek_libur($list[$i])->getRow();
                                    ?>
                                        <tr bgcolor="#ff9999">
                                            <td><?= $no++; ?></td>
                                            <td><?= $list[$i]; ?></td>
                                            <td></td>
                                            <td></td>
                                            <td>Libur</td>
                                            <td><?= $libur_d->keterangan; ?></td>
                                        </tr>
                                <?php    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#fingerprint_table').DataTable({
            "order": [],
            "serverSide": true,
            "ajax": {
                url: "/kepala/isi_detail/<?= $pegawai->sidik_id ?>",
                type: "POST"
            }
        });
    });
</script> -->
<?= $this->endSection(); ?>