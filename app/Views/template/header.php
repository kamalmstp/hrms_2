<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
      <li class="profile-info dropdown pull-right">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="" alt="" class="img-circle" width="44">
					<?=session()->get('role');?>
					<div style="margin-top: -15px;
							    font-size: 10px;
							    text-align: left;
							    padding-left: 53px;
							    color: #707696;">
						<p style="margin-top: 0px"><?=session()->get('role');?></p>
					</div>
				</a>

				<ul class="dropdown-menu">
					<li class="caret"></li>
					<li>
						<a href="#">
							<i class="flaticon-rotate"></i>Edit Profile
						</a>
					</li>
					<li>
						<a href="#">
							<i class="flaticon-lock"></i>Change Password
						</a>
					</li>
					<li>
						<a href="logout">
							<i class="flaticon-paper-plane-1"></i>Logout
						</a>
					</li>
				</ul>
			</li>
    </ul>
  </nav>