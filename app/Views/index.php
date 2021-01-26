
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$title?></title>
  <?= $this->include('template/include_top.php');?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?=$this->include('template/header.php');?>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <img src="/img/Logo.png" alt="Al-Mazaya Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HRMS</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <?=$this->include($role.'/menu.php');?>
    </div>
  </aside>
  
  <div class="content-wrapper">
    <?=$this->include($role.'/'.$page);?>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>

</div>
  <?=$this->include('template/include_bottom.php');?>
</body>
</html>
