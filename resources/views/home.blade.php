<x-app-layout>

    @section('header-styles')
        @parent

        <link href="{{ asset('/plugins/slick-1.8.1/slick.min.css') }}" rel="stylesheet">
    @endsection

    <div class="about-us section-item">
        <div class="about-us__inner section-item__inner">
            <div class="about-us__row section-item__row">
                <div class="about-us__aside">
                    <img src="https://placehold.co/800x400" class="d-block w-100">
                </div>
                <div class="about-us__content d-flex flex-column justify-content-between">
                    <div class="about-us__header section-item__header">
                        <div class="about-us__header__inner section-item__header__inner">
                            <h2 class="about-us__header__title section-item__header__title">
                                {{ __('A propos') }}
                            </h2>
                            <hr>
                        </div>
                    </div>
                    <div class="about-us_description">
                        @if ( isset($_setting->about) && !empty($_setting->about) )
                            <p>{{ $_setting->about }}</p>
                        @else
                            <p>{{ __('Lorem ipsum dolor sit amet consectetur adipiscing elit ante aenean, parturient tristique integer non nam lacinia ultrices vestibulum scelerisque ultricies, pellentesque turpis in sociosqu ad dis facilisis arcu. Cum aenean tortor velit penatibus ultricies proin duis, ridiculus dignissim nullam torquent libero urna lectus, venenatis mi non at risus ad.') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="our-deals section-item">
        <div class="our-deals__inner section-item__inner">
            <div class="our-deals__row section-item__row align-items-end">
                <!--<div class="row d-flex align-items-center">-->
                <div class="our-deals__aside col-3">
                    <div class="our-deals__header section-item__header">
                        <div class="our-deals__header__inner section-item__header__inner">
                            <h2 class="our-deals__header__title section-item__header__title">
                                {{ __('Nos bons plans') }}
                            </h2>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="our-deals__content col-9">
                    <div class="listings-featured home__section home__section--listings-featured">
                        <div class="listings-featured__inner container">
                            <div class="row align-items-start">
                                <div class="listings-slider listings-slider--featured col">
                                    <div class="listings-slider__container">
                                        <div class="featured-listings-slider__row row justify-content-start my-3">
                                            <?php for ($i=0; $i < 5; $i++) { ?>
                                            <div class="listings-slider__item border-transparent">
                                                <div class="listings-slider__item__inner bg-light">
                                                    <a href="">
                                                        <img src="https://placehold.co/400x300?text=Featured" class="d-block w-100" alt="...">
                                                    </a>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="our-properties section-item">
        <div class="our-properties__inner section-item__inner">
            <div class="our-properties__row section-item__row align-items-end">
                <div class="our-properties__aside col-12 col-sm-3 mb-sm-0 mb-3">
                    <div class="our-deals__header section-item__header">
                        <div class="our-deals__header__inner section-item__header__inner">
                            <h2 class="our-deals__header__title section-item__header__title">
                                {{ __('Nos biens immobiliers') }}
                            </h2>
                            <hr>
                        </div>

                        {{-- dd($_categories) --}}

                        @if ( isset($_categories) && !empty($_categories) )
                            <nav
                                class="categories-nav"
                            >
                                <div class="categories-nav__inner-container">
                                    <ul class="categories-nav__inner">
                                        @foreach ($_categories as $category)
                                            <li class="categories-nav__inner__item">
                                                <a
                                                    href="{{ route('listings.category', [
                                                        'dbCategory' => $category['slug']
                                                    ]) }}"
                                                    class="header-nav__inner__item__link"
                                                >
                                                    {{ $category['title'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </nav>
                        @else
                            <p class="text-muted mt-5">{{ __('Aucune catégorie à afficher.') }}</p>
                        @endif

                        <div class="mt-3">
                            <a
                                class="btn btn-primary"
                                href="{{ route('listings.index') }}"
                            >
                                {{ __('Tous les biens') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="our-properties__content col-12 col-sm-9">
                    <div class="latest-listings home__section home__section--latest-listings">
                        <div class="latest-listings__inner container">
                            <div class="row align-items-start">
                                <div class="listings-slider listings-slider--featured col">
                                    <div class="listings-slider__container">
                                        <div class="latest-listings-slider__row row justify-content-start my-3">
                                            <?php for ($i=0; $i < 8; $i++) { ?>
                                                <div class="listings-slider__item border-transparent">
                                                    <div class="listings-slider__item__inner bg-light">
                                                        <a href="">
                                                            <img src="https://placehold.co/300x400?text=Annonce+Deux" class="d-block w-100" alt="...">
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('footer-scripts')
        @parent

        <script src="{{ asset('/plugins/slick-1.8.1/slick.min.js') }}"></script>

        <script type="text/javascript">
            var $_featured_items = $('.featured-listings-slider__row'),
                $_latest_items = $('.latest-listings-slider__row');

            if ( $_featured_items.length ) {
                $_featured_items.slick({
                    lazyLoad: 'ondemand',
                    dots: false,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    prevArrow: '<span class="listings-slider__nav listings-slider__nav--prev"><i class="fas fa-chevron-left"></i></span>',
                    nextArrow: '<span class="listings-slider__nav listings-slider__nav--next"><i class="fas fa-chevron-right"></i></span>',
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 5,
                                slidesToScroll: 5,
                                infinite: true,
                                dots: true
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            }

            if ( $_latest_items.length ) {
                $_latest_items.slick({
                    lazyLoad: 'ondemand',
                    dots: false,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    prevArrow: '<span class="listings-slider__nav listings-slider__nav--prev"><i class="fas fa-chevron-left"></i></span>',
                    nextArrow: '<span class="listings-slider__nav listings-slider__nav--next"><i class="fas fa-chevron-right"></i></span>',
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 5,
                                slidesToScroll: 5,
                                infinite: true,
                                dots: true
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            }
        </script>
    @endsection
</x-app-layout>
