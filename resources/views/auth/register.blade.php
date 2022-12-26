<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="skd/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="skd/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="skd/dist/css/adminlte.min.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Inventaris Sekolah Vokasi</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Pendaftaran Akun Inventaris Sekolah Vokasi</p>

      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Lengkap" name="name" value="{{ old('name') }}" required autocomplete="name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" name="email" value="{{ old('email') }}" required autocomplete="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password" name="password" required autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"  placeholder="Konfirmasi Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
           <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
           @if($errors->has('g-recaptcha-response'))
             <span class="invalid-feedback" style="display:block">
              <strong>{{$errors->first('g-recaptcha-response')}}</strong>
             </span>
           @endif
         </div>
        <div class="row">
          <div class="col-8">
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">
                {{ __('Register') }}
            </button>
          </div>
        </div>
      </form>

      <br/>
      Sudah Memiliki Akun? <a href="{{ url ('/login') }}" class="text-center">Login Disini</a>
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
