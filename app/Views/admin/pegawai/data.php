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
                        <div class="nav navbar-right panel_toolbox">
                            <a href="/admin/add_pegawai" type="button" class="btn btn-success"><i class="fa fa-plus"></i> Add </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jabatan</th>
                                    <th>TTL</th>
                                    <th>Akun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pegawai as $row) : ?>
                                    <tr>
                                        <td width="2%"><?= $i++ ?></td>
                                        <td><img src="/images/user/<?= $row['gambar'] ?>" class="avatar" alt="avatar"></td>
                                        <td><?= $row['gelar_depan'] . ' ' . $row['nama'] . ' ' . $row['gelar_belakang'] ?></td>
                                        <td><?php if ($row['jenis_kelamin'] == 'L') {
                                                echo "Laki-Laki";
                                            } else {
                                                echo "Perempuan";
                                            } ?>
                                        </td>
                                        <td></td>
                                        <td><?= $row['tempat_lahir'] . ', ' . $row['tanggal_lahir'] ?></td>
                                        <td>
                                            <?php if ($row['id'] == NULL) { ?>
                                                <button type="button" class="btn btn-round btn-success btn-xs" data-toggle="modal" data-target=".modal-akun<?= $row['pegawai_id'] ?>"><i class="fa fa-key"></i> Aktif </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-round btn-danger btn-xs" data-toggle="modal" data-target=".modal-akundel<?= $row['user_id'] ?>"><i class="fa fa-key"></i> Non-aktif </button>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-xs">Aksi</button>
                                                <button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a target="_blank" href="/admin/kelola_jabatan/<?= $row['pegawai_id'] ?>"><i class="fa fa-child"></i> Jabatan</a>
                                                    </li>
                                                    <li><a target="_blank" href="/admin/kelola_pendidikan/<?= $row['pegawai_id'] ?>"><i class="fa fa-graduation-cap"></i> Pendidikan</a>
                                                    </li>
                                                    <li><a target="_blank" href="/admin/kelola_keluarga/<?= $row['pegawai_id'] ?>"><i class="fa fa-users"></i> Keluarga</a>
                                                    </li>
                                                    <li><a href="/admin/absensi_detail/<?= $row['pegawai_id'] ?>"><i class="fa fa-calendar"></i> Absensi</a>
                                                    </li>
                                                    <li><a target="_blank" href="/admin/pegawai_izin_view/<?= $row['pegawai_id'] ?>"><i class="fa fa-table"></i> Izin</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li><a href="#"><i class="fa fa-folder"></i> View</a>
                                                    </li>
                                                </ul>
                                                <a href="/admin/edit_pegawai/<?= $row['pegawai_id']; ?>" class="btn btn-warning btn-xs" type="button"><i class="fa fa-pencil"></i> Edit</a>
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".modal-del<?= $row['pegawai_id'] ?>"><i class="fa fa-trash-o"></i> Delete </button>
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
</div>

<?php foreach ($pegawai as $row) : ?>
    <div class="modal fade modal-akun<?= $row['pegawai_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <form action="/admin/pegawai_akun_create" method="post" class="form-horizontal form-label-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Buat Akun</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role">Level Akun<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" required name="role" id="role">
                                    <option value="">--Pilih--</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Kepala">Kepala</option>
                                    <option value="Pegawai">Pegawai</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="hidden" name="pegawai_id" value="<?= $row['pegawai_id'] ?>">
                                <input type="text" id="username" name="username" value="<?= $row['email'] ?>" class="form-control col-md-7 col-xs-12" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="password" name="password" value="<?= $row['nik'] ?>" class="form-control col-md-7 col-xs-12" />
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade modal-akundel<?= $row['user_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <form action="/admin/pegawai_akun_delete" method="post" class="form-horizontal form-label-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Akun</h4>
                    </div>
                    <div class="modal-body">

                        <p>Apakah anda yakin ingin menghapus akun <strong><?= $row['nama'] ?></strong>?</p>
                        <input type="hidden" name="user_id" value="<?= $row['user_id'] ?>">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade modal-del<?= $row['pegawai_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <form action="/admin/pegawai_del" method="post" class="form-horizontal form-label-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Delete</h4>
                    </div>
                    <div class="modal-body">

                        <p>Apakah anda yakin ingin menghapus <strong><?= $row['nama'] ?></strong>?</p>
                        <input type="hidden" name="pegawai_id" value="<?= $row['pegawai_id'] ?>">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php endforeach; ?>
<?= $this->endSection(); ?>