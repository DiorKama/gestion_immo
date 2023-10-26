<div class="header__container">
    <div class="header__inner">
        <div class="header__aside">
            <h2 class="header__title" style="">
                {{ __('Rejoignez-nous') }}
            </h2>

            <div class="header__social">
                <ul class="header__list-social">
                    @if ( isset($_setting->facebook_url) && !empty($_setting->facebook_url) )
                        <li class="header__list-social-item">
                            <a
                                class="header__list-social-item__link"
                                href="{{ $_setting->facebook_url }}"
                                target="_blank"
                            >
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                    @endif

                    @if ( isset($_setting->twitter_url) && !empty($_setting->twitter_url) )
                        <li class="header__list-social-item">
                            <a
                                class="header__list-social-item__link"
                                href="{{ $_setting->twitter_url }}"
                                target="_blank"
                            >
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                    @endif

                    @if ( isset($_setting->instagram_url) && !empty($_setting->instagram_url) )
                        <li class="header__list-social-item">
                            <a
                                class="header__list-social-item__link"
                                href="{{ $_setting->instagram_url }}"
                                target="_blank"
                            >
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    @endif

                    @if ( isset($_setting->linkedin_url) && !empty($_setting->linkedin_url) )
                        <li class="header__list-social-item">
                            <a
                                class="header__list-social-item__link"
                                href="{{ $_setting->linkedin_url }}"
                                target="_blank"
                            >
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="header__content">
            <nav class="header__navbar navbar navbar-expand-lg navbar-light bg-light">
                @if( file_exists(public_path('logo.png')) )
                    <a class="header__logo navbar-brand" href="/">
                        <img src="{{ asset('logo.png') }}" class="header-logo__img" height="30">
                    </a>
                @else
                    <a class="header__brand navbar-brand" href="/">
                        {{ isset($_setting->name) && !empty($_setting->name) ? $_setting->name : __('Company Name') }}
                    </a>
                @endif

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="header__menu navbar-nav ml-auto">
                        @if(
                            isset($_navCategories[config('listings.listing-types.for-sale')])
                            && !empty($_navCategories[config('listings.listing-types.for-sale')])
                        )
                            <li class="header__menu-item nav-item dropdown">
                                <a class="header__menu-link nav-link dropdown-toggle" href="javascript:;" role="button" data-toggle="dropdown">
                                    {{ __('Acheter') }}
                                </a>

                                <div class="dropdown-menu">
                                    @foreach( $_navCategories[config('listings.listing-types.for-sale')] as $category )
                                        <a
                                            href="{{ route('listings.category', [
                                            'dbCategory' => $category['slug']
                                        ]) }}"
                                            class="header__menu-link--dropdown-item dropdown-item"
                                        >
                                            {{ $category['title'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                        @endif

                        @if(
                            isset($_navCategories[config('listings.listing-types.to-rent')])
                            && !empty($_navCategories[config('listings.listing-types.to-rent')])
                        )
                            <li class="header__menu-item nav-item dropdown">
                                <a class="header__menu-link nav-link dropdown-toggle" href="javascript:;" role="button" data-toggle="dropdown">
                                    {{ __('Louer') }}
                                </a>

                                <div class="dropdown-menu">
                                    @foreach( $_navCategories[config('listings.listing-types.to-rent')] as $category )
                                        <a
                                            href="{{ route('listings.category', [
                                            'dbCategory' => $category['slug']
                                        ]) }}"
                                            class="header__menu-link--dropdown-item dropdown-item"
                                        >
                                            {{ $category['title'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a
                                class="header__menu-link nav-link header__menu-link--call-us"
                                href="tel:{{ isset($_setting->phone_number) && !empty($_setting->phone_number) ?
                                    $_setting->phone_number :
                                    config('core.contact.default-customer-service') }}"
                            >
                                <i class="fas fa-phone"></i>
                                {{ __('Appelez nous') }}
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
