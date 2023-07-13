<div class="header__container">
    <div class="header__inner">
        <div class="header__aside">
            <h2 class="header__title" style="">
                {{ __('Rejoignez-nous') }}
            </h2>

            <div class="header__social">
                <ul class="header__list-social">
                    <li class="header__list-social-item">
                        <a href="" class="header__list-social-item__link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="header__list-social-item">
                        <a href="" class="header__list-social-item__link">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="header__list-social-item">
                        <a href="" class="header__list-social-item__link">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li class="header__list-social-item">
                        <a href="" class="header__list-social-item__link">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="header__content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="header-logo navbar-brand" href="#">
                    <img src="{{ asset('images/logo.png') }}" class="header-logo__img" height="30">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-phone"></i>
                                {{__('Appelez nous')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                {{ __('Obtenir un devis') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            @hasSection('header-section')
                @yield('header-section')
            @else
                @include('layouts.partials._header._carousel')
            @endif
        </div>
    </div>
</div>
