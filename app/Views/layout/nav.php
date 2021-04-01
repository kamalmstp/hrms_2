<?php $session = session() ?>
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?= base_url(); ?>" class="site_title"><i class="fa fa-paw"></i> <span>HRMS</span></a>
        </div>

        <div class="clearfix"></div>

        <?php if ($session->get('pegawai_id') == NULL) { ?>
            <div class="profile clearfix">
                <div class="profile_pic">
                    <img src="<?= base_url() ?>/images/img.jpg" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>Administrator</h2>
                </div>
            </div>
        <?php } else { ?>
            <div class="profile clearfix">
                <div class="profile_pic">
                    <img src="<?= base_url() ?>/images/img.jpg" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>John Doe</h2>
                </div>
            </div>
        <?php } ?>
        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="/"><i class="fa fa-home"></i> Home </a>
                    </li>
                    <li><a><i class="fa fa-users"></i> Pegawai <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/admin/data_pegawai">Data Pegawai</a></li>
                            <li><a href="/admin/add_pegawai">Tambah Pegawai</a></li>
                            <li><a href="#">Jabatan Pegawai</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-calendar"></i> Absensi <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Absensi Pegawai</a></li>
                            <li><a href="#">Import Absensi</a></li>
                            <li><a href="#">Kelola Izin</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i> Inventaris <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Inventaris Pegawai</a></li>
                            <li><a href="#">Data Inventaris</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-gears"></i> Data Master <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/admin/jns_pegawai">Jenis Pegawai</a></li>
                            <li><a href="/admin/hub_keluarga">Hubungan Keluarga</a></li>
                            <li><a href="/admin/jen_pend">Jenjang Pendidikan</a></li>
                            <li><a href="/admin/jns_pend">Jenis Pendidikan</a></li>
                            <li><a href="#">Data Jabatan</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>