
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin_Immo</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Inscription</p>

      <form action="{{ route('register') }}" method="post">
      @csrf
        <div class="input-group mb-3">
        <x-text-input id="firstName" placeholder="prenom" class="form-control" type="text" name="firstName" :value="old('firstName')" required autofocus autocomplete="firstName" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
        </div>
        <div class="input-group mb-3">
          <x-text-input id="lastName" class="form-control" placeholder="nom" type="text" name="lastName" :value="old('lastName')" required autofocus autocomplete="lastName" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
        </div>

        <div class="input-group mb-3">
          <x-text-input id="email" class="form-control" placeholder="Email" type="email" name="email" :value="old('email')" required autocomplete="username" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="input-group mb-3">
          <x-text-input id="password" class="form-control" placeholder="Password"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="input-group mb-3">
          <x-text-input id="password_confirmation" class="form-control" placeholder="Confirm password"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="input-group mb-3">
          <x-text-input id="country_code" class="form-control" placeholder="indcatif" type="text" name="country_code" :value="old('country_code')" required autofocus autocomplete="country_code" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
          <x-input-error :messages="$errors->get('country_code')" class="mt-2" />
        </div>
        <div class="input-group mb-3">
          <x-text-input id="phone_number" class="form-control" placeholder="phone" type="text" name="phone_number" :value="old('phone_number')" required autofocus autocomplete="phone_number" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
          <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               J'accepte les <a href="#">Conditions</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->
    </div>
    <div class="text-center">
    <a href="{{ route('login') }}" class="text-center">Vous avez déjà un compte</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
