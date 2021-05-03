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

        <!-- <div class="row">
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

        </div> -->

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Absensi Pada Periode <strong><?= $aktif->kode; ?> - (<?= $aktif->tanggal_mulai; ?> s/d <?= $aktif->tanggal_akhir; ?>)</strong></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h3>Nama : <?= $pegawai->nama ?></h3>
                        </div>
                        <table class="table table-bordered">
                            <?php
                            ?>
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
                                $izin_j = new \App\Models\IzinJenisModel();
                                $izin_peg = new \App\Models\IzinPegawaiModel();
                                ?>
                                <?php $no = 1; ?>
                                <?php
                                $hadir = 0;
                                $tanket = 0;
                                $tot_izin = 0;
                                for ($i = 0; $i < count($list); $i++) { ?>
                                    <?php if (count($libur->cek_libur($list[$i])->getResultArray()) !== 1) {
                                        $masuk = $finger->masuk($pegawai->sidik_id, date('Y-m-d', strtotime($list[$i])))->getRow();
                                        // dd($masuk);
                                        $id_set = 1;
                                        $pulang = $finger->pulang($pegawai->sidik_id, date('Y-m-d', strtotime($list[$i])))->getRow();
                                        $mesin = $setting->getWhere(array('setting_id' => 1))->getRow(); ?>
                                        <?php if (!empty($masuk->time) && !empty($pulang->time)) {
                                            $hadir = $hadir + 1;
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $list[$i]; ?></td>
                                                <td><?= $masuk->time; ?>
                                                </td>
                                                <td><?= $pulang->time; ?></td>
                                                <td>Hadir</td>
                                                <td></td>
                                            </tr>
                                        <?php } else { ?>
                                            <?php $absen_libur = $izin_peg->absensi_libur($pegawai->pegawai_id, $list[$i])->getRow(); ?>
                                            <?php if (empty($absen_libur->izin_jenis_id)) {
                                                $tanket = $tanket + 1;
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
                                                    <td>Tidak Hadir</td>
                                                    <td></td>
                                                </tr>
                                            <?php } else {
                                                $tot_izin = $tot_izin + 1;
                                            ?>
                                                <tr bgcolor="#f2cf77">
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
                                                    <td></td>
                                                    <td><?php
                                                        $izin_cek = $izin->getData($absen_libur->izin_id)->getRow();
                                                        echo $izin_cek->nama; ?></td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>

                                    <?php } else {
                                        $libur_d = $libur->cek_libur($list[$i])->getRow(); ?>
                                        <tr bgcolor="#ff9999">
                                            <td><?= $no++; ?></td>
                                            <td><?= $list[$i]; ?></td>
                                            <td></td>
                                            <td></td>
                                            <td>Libur</td>
                                            <td><?= $libur_d->keterangan; ?></td>
                                        </tr>
                                    <?php    } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Wajib Hadir</th>
                                    <th><?php echo $wajib_hadir ?></th>
                                </tr>
                                <tr>
                                    <th>Hadir</th>
                                    <th bgcolor="#77f277"><?= $hadir ?></th>
                                </tr>
                                <tr>
                                    <th>Tanpa Keterangan</th>
                                    <th bgcolor="#ff9999"><?= $tanket ?></th>
                                </tr>
                                <tr>
                                    <th>Izin/Cuti/Sakit</th>
                                    <th bgcolor="#f2cf77"><?= $tot_izin ?></th>
                                </tr>
                            </table>
                        </div>
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
                url: "/admin/isi_detail/<?= $pegawai->sidik_id ?>",
                type: "POST"
            }
        });
    });
</script> -->
<?= $this->endSection(); ?>