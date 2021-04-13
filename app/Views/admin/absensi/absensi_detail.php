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
                        <!-- <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                            <h3>Samuel Doe</h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                                </li>

                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-external-link user-profile-icon"></i>
                                    <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                                </li>
                            </ul>
                        </div> -->
                        <div class="col-md-12 col-sm-9 col-xs-12">
                            <div class="profile_title">
                                <div class="col-md-6">
                                    <form action="/admin/jns_pegawai_save" method="post" class="form-horizontal form-label-left">

                                        <div class="form-group">
                                            <div class="col-md-3 col-sm-3">
                                                <select class="form-control" name="bulan" id="bulan">
                                                    <option value="">Januari</option>
                                                    <option value="">Februari</option>
                                                    <option value="">Maret</option>
                                                    <option value="">April</option>
                                                    <option value="">Mei</option>
                                                    <option value="">Juni</option>
                                                    <option value="">Juli</option>
                                                    <option value="">Agustus</option>
                                                    <option value="">September</option>
                                                    <option value="">Oktober</option>
                                                    <option value="">November</option>
                                                    <option value="">Desember</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <select class="form-control" name="tahun" id="tahun">
                                                    <?php for ($i = 2010; $i < 2030; $i++) {
                                                        echo '<option value="">' . $i . '</option>';
                                                    } ?>
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
                        <h2>Daftar Absensi Pada Bulan <strong><?= $bulan; ?> - <?= $tahun; ?></strong></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Waktu Masuk</th>
                                    <th>Status Masuk</th>
                                    <th>Waktu Pulang</th>
                                    <th>Status Pulang</th>
                                </tr>
                            </thead>
                            <tbody id="show_data">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        tampil_data_tentor();

        function tampil_data_tentor() {
            $.ajax({
                url: '/admin/isi_detail',
                method: 'GET',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].sidik_id + '</td>' +
                            '<td>' + data[i].date + '</td>' +
                            '<td>' + data[i].time + '</td>' +
                            '<td>' + data[i].state + '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }
    });
</script>
<?= $this->endSection(); ?>