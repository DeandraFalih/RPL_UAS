<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lupa Password</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../skd/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../skd/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../skd/dist/css/adminlte.min.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Inventaris Sekolah Vokasi</b></a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Lupa Password</p>

      <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
          <div class="col-0">
            <button type="submit" class="btn btn-primary btn-block">
                {{ __('Send Password Reset Link') }}
            </button>
            <a href="{{ url ('/login') }}" class="btn btn-secondary btn-block">Batal</a>
          </div>
        </div>
      </form>
    <br/>
    </div>
  </div>
</div>

<script src="../skd/plugins/jquery/jquery.min.js"></script>
<script src="../skd/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../skd/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../skd/dist/js/adminlte.js"></script>

<script src="../skd/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../skd/plugins/raphael/raphael.min.js"></script>
<script src="../skd/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../skd/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<script src="../skd/plugins/chart.js/Chart.min.js"></script>

<script src="../skd/dist/js/pages/dashboard2.js"></script>
</body>
</html>