    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/admin" class="nav-link <?php $val = ($page == 'dashboard') ? 'active' : '' ; echo $val?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item <?php $val = ($page == 'data_pegawai' || $page == 'data_pelamar') ? 'menu-open' : '' ; echo $val?>">
            <a href="#" class="nav-link <?php $val = ($page == 'data_pegawai' || $page == 'data_pelamar') ? 'active' : '' ; echo $val?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pegawai
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/data_pegawai" class="nav-link <?php $val = ($page == 'data_pegawai') ? 'active' : '' ; echo $val?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link <?php $val = ($page == 'data_pelamar') ? 'active' : '' ; echo $val?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pelamar</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item <?php $val = ($page == 'data_jabatan' || $page == 'data_bidang') ? 'menu-open' : '' ; echo $val?>">
            <a href="#" class="nav-link <?php $val = ($page == 'data_jabatan' || $page == 'data_bidang') ? 'active' : '' ; echo $val?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/data_jabatan" class="nav-link <?php $val = ($page == 'data_jabatan') ? 'active' : '' ; echo $val?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Jabatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/data_bidang" class="nav-link <?php $val = ($page == 'data_bidang') ? 'active' : '' ; echo $val?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Bidang</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
        </ul>
      </nav>