<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="skd/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="skd/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="skd/dist/css/adminlte.min.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Inventaris Sekolah Vokasi</b></a>
  </div>
  <div class="card">
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login</p>

      <form method="POST" action="{{ route('login') }}">
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
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-8">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            <div class="icheck-primary">
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">
                {{ __('Login') }}
            </button>
          </div>
        </div>
      </form>
    <br/>
      <p class="mb-0">
        Belum Memiliki Akun? <a href="{{ url ('/register') }}" class="text-center">Daftar Disini</a>
      </p>
    </div>
  </div>
</div>

<script src="skd/plugins/jquery/jquery.min.js"></script>
<script src="skd/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="skd/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="skd/dist/js/adminlte.js"></script>

<script src="skd/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="skd/plugins/raphael/raphael.min.js"></script>
<script src="skd/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="skd/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<script src="skd/plugins/chart.js/Chart.min.js"></script>

<script src="skd/dist/js/pages/dashboard2.js"></script>
</body>
</html>