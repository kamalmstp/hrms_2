<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$title;?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/AdminLTE/dist/css/adminlte.min.css">
  <link rel="icon" href="/favicon.ico">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="/img/logo.png" width="30%" alt="">
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><b>Login</b></p>
      <?php if(session()->getFlashdata('msg')):?>
          <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
      <?php endif;?>
      <form action="/login/login" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email')?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" id="InputForPassword">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>
      
      <p class="mb-1">
        <a href="/login/forgot">I forgot my password</a>
      </p>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
