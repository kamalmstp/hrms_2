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
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>TTL</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pegawai as $row) : ?>
                                    <tr>
                                        <td width="2%"><?= $i++ ?></td>
                                        <td><?= $row['gelar_depan'] . ' ' . $row['nama'] . ' ' . $row['gelar_belakang'] ?></td>
                                        <td><?php if ($row['jenis_kelamin'] == 'L') {
                                                echo "Laki-Laki";
                                            } else {
                                                echo "Perempuan";
                                            } ?>
                                        </td>
                                        <td><?= $row['tempat_lahir'] . ', ' . $row['tanggal_lahir'] ?></td>
                                        <td>
                                            <a href="/admin/kelola_pendidikan/<?= $row['pegawai_id']; ?>" class="btn btn-primary" type="button"><i class="fa fa-edit"></i> Kelola Pendidikan</a>
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
</div>

<?= $this->endSection(); ?>