<x-app-layout>

    @section('header-styles')
        @parent

        <link href="{{ asset('/plugins/slick-1.8.1/slick.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/plugins/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    @endsection

    <div class="about-us section-item">
        <div class="about-us__inner section-item__inner">
            <div class="about-us__row section-item__row">
                <div class="about-us__aside section-item__aside">
                    <img src="https://placehold.co/800x400" class="d-block w-100">
                </div>
                <div class="about-us__content section-item__content">
                    <div class="about-us__content__inner">
                        <div class="about-us__header section-item__header">
                            <div class="about-us__header__inner section-item__header__inner">
                                <h2 class="about-us__header__title section-item__header__title vertical-text">
                                    {{ __('A propos') }}
                                    <hr>
                                </h2>
                            </div>
                        </div>
                        <div class="about-us_description">
                            @if ( isset($_setting->about) && !empty($_setting->about) )
                                <p class="mb-0">{{ $_setting->about }}</p>
                            @else
                                <p class="mb-0">{{ __('Lorem ipsum dolor sit amet consectetur adipiscing elit ante aenean, parturient tristique integer non nam lacinia ultrices vestibulum scelerisque ultricies, pellentesque turpis in sociosqu ad dis facilisis arcu. Cum aenean tortor velit penatibus ultricies proin duis, ridiculus dignissim nullam torquent libero urna lectus, venenatis mi non at risus ad.') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="our-deals section-item">
        <div class="our-deals__inner section-item__inner">
            @include(
                'home.partials._premium-listings',
                [
                    'title' => __('Nos bons plans'),
                    'premiumListings' => $premiumListings,
                ]
            )
        </div>
    </div>

    <div class="our-properties section-item">
        <div class="our-properties__inner section-item__inner">
            @include('home.partials._latest-listings', [
                'title' => __('Nos biens immobiliers '),
                'latestListings' => $latestListings,
            ])
        </div>
    </div>

    @section('footer-scripts')
        @parent

        <script src="{{ asset('/plugins/slick-1.8.1/slick.min.js') }}"></script>
        <script src="{{ asset('/plugins/swiper/swiper-bundle.min.js') }}"></script>

        <script type="text/javascript">
            var $_featured_items = $('.featured-listings-slider__row'),
                $_latest_items = $('.latest-listings-slider__row'),
                $_swiper_container = $('.swiper-container');

            if ( $_featured_items.length ) {
                $_featured_items.slick({
                    lazyLoad: 'ondemand',
                    dots: false,
                    infinite: false,
                    speed: 300,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    prevArrow: '<span class="listings-slider__nav listings-slider__nav--prev"><i class="fas fa-chevron-left"></i></span>',
                    nextArrow: '<span class="listings-slider__nav listings-slider__nav--next"><i class="fas fa-chevron-right"></i></span>',
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                infinite: true,
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                arrows: false,
                                dots: true
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                arrows: false,
                                dots: true
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
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    prevArrow: '<span class="listings-slider__nav listings-slider__nav--prev--latest"><i class="fas fa-chevron-left"></i></span>',
                    nextArrow: '<span class="listings-slider__nav listings-slider__nav--next--latest"><i class="fas fa-chevron-right"></i></span>',
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                infinite: true,
                                dots: true
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                dots: true,
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                dots: true,
                            }
                        }
                    ]
                });
            }

            if( $_swiper_container.length ) {
                const swiper = new Swiper('.swiper-container', {
                    direction: 'horizontal',
                    loop: false,
                    slidesPerView: 'auto'
                });
            }
        </script>
    @endsection
</x-app-layout>
