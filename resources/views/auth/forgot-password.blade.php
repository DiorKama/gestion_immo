<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('page-title', 'Mot de passe oublié')</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('/assets/core-admin/styles/app.css') }}">
    </head>
    <body class="hold-transition login-page">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="auth-widget__header">
                        <div class="auth-widget__header__avatar mb-3">
                            <div class="aspect-square-ratio-box">
                                <div class="aspect-ratio-box-inside text-center">
                                    <div class="flexbox-centering">
                                        <div class="viewport-sizing">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h1 class="auth-widget__header__title text-uppercase mb-4">
                            {{ __('Mot de passe oublié') }}
                        </h1>

                        <p class="login-box-msg">{{ __("Vous avez oublié votre mot de passe ? Indiquez-nous votre adresse électronique et nous vous enverrons un lien de réinitialisation du mot de passe qui vous permettra d'en choisir un nouveau.") }}</p>
                    </div>

                    <div class="auth-widget__content">
                        <div class="auth-form__group mb-2 text">
                            <input type="email" name="email" placeholder="{{ __('E-mail') }}" class="auth-form__input" required="required" value="{{ old('email') }}">
                            <span class="auth-form__focus-input"></span>
                            <span class="auth-form__icon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                        </div>

                        <div class="form-submit-btn-container mt-3">
                            <button type="submit" class="btn auth-form__btn btn-block">{{ __('Reininitialiser') }}</button>
                        </div>
                    </div>

                    @if (Route::has('login'))
                        <div class="auth-widget__footer">
                            <div class="auth-widget__footer__col text-center mt-3">
                                <a class="auth-widget__footer__link" href="{{ route('login') }}">{{ __('Se connecter ?') }}</a>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

        <script src="../../plugins/jquery/jquery.min.js"></script>
        <script src="{{ asset('assets/core-admin/scripts/app.js')}}"></script>
    </body>
</html>
