<x-app-layout>
    @section('page-title', $listing->title)

    @section('header-styles')
        @parent

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/default-skin/default-skin.min.css">
        <link href="{{ asset('/plugins/slick-1.8.1/slick.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/plugins/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    @endsection

    @section('header-section')
        @include('listings.partials._show._item._gallery')
    @endsection

    <div class="listing-item section-item">
        <div class="listing-item__inner">
            <div class="listing-item__details">
                <div class="listing-item__details__inner p-sm-3 p-0">
                    @include('listings.partials._show._item._header', [
                        'title' => $listing->title,
                        'categoryUrl' => route('listings.category', [
                            'dbCategory' => $listing->category->slug
                        ]),
                        'categoryTitle' => $listing->category->title,
                        'price' => listing_price($listing),
                        'createdAt' => shortRelativeDate($listing->display_date),
                    ])

                    <div class="listing-item__content">
                        @include('listings.partials._show._item._description', [
                            'description' => $listing->description
                        ])
                    </div>

                    @unless( $agent->isMobile() )
                        <div class="listing-item__share-bar mt-3">
                            @include('listings.partials._show._contact._share')
                        </div>
                    @endunless
                </div>
            </div>

            <div class="listing-item__sidebar mt-3 mt-sm-0">
                <div class="listing-item__sidebar__inner p-sm-2 p-3">
                    <div class="listing-item__sidebar__header">
                        <div class="listing-item__sidebar__logo">
                            @if( file_exists(public_path('logo.png')) )
                                <img src="{{ asset('logo.png') }}" class="listing-item__sidebar__logo__img">
                            @endif
                        </div>
                    </div>
                    <div class="listing-item__sidebar__body">
                        @include('listings.partials._show._sidebar._company', [
                            'companyName' => isset($_setting->name) && !empty($_setting->name) ? $_setting->name : __('Company Name'),
                            'companyAddress' => isset($_setting->address) && !empty($_setting->address) ? $_setting->address : __('Km 2.5 Bd du Centenaire de la commune de Dakar'),
                        ])

                        <div class="listing-item__sidebar__contact">
                            @include('listings.partials._show._sidebar._contact')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if( $agent->isMobile() )
        <div class="listing-item__share-bar mt-3">
            @include('listings.partials._show._contact._share')
        </div>
    @endif

    @include('listings.partials._related-listings')

    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>

    @section('floating-buttons')
        @if( $agent->isMobile() )
            <div class="floating-btn__actions py-1">
                @include('listings.partials._show._item._floating-contact')
            </div>
        @endif
    @show

    @section('footer-scripts')
        @parent

        <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe-ui-default.min.js"></script>
        <script src="{{ asset('/plugins/slick-1.8.1/slick.min.js') }}"></script>
        <script src="{{ asset('/plugins/swiper/swiper-bundle.min.js') }}"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                var $_similar_items = $('.listings-slider__row'),
                    $_swiper_container = $('.swiper-container--related');

                if ( $_similar_items.length ) {
                    $_similar_items.slick({
                        dots: false,
                        infinite: false,
                        speed: 300,
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        prevArrow: '<span class="listings-slider__nav listings-slider__nav--prev"><i class="fas fa-chevron-left"></i></span>',
                        nextArrow: '<span class="listings-slider__nav listings-slider__nav--next"><i class="fas fa-chevron-right"></i></span>',
                        responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 5,
                                    slidesToScroll: 1,
                                    infinite: false,
                                    dots: true
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
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

                $(document).on('submit', '[data-listing-show-phone]', function (e) {
                    e.preventDefault();

                    var $el = $(e.currentTarget),
                        $container = $el.parents($el.data('listing-show-phone-container'));

                    $.ajax($el.attr('action'), {
                        method: $el.attr('method'),
                        data: $el.serialize(),
                    });

                    var $modal = $container.find($el.data('listing-show-phone-modal'));

                    $modal
                        .modal({
                            keyboard: false,
                            backdrop: 'static'
                        }, 'show');
                });

                $(document).on('click', '[data-whatsapp]', function (e) {
                    var $this = $(e.currentTarget);

                    if ($this.data('whatsapp-track')) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax($this.data('whatsapp-track'), {
                            method: 'POST',
                        });
                    }

                    if (isMobile) {
                        return;
                    }

                    e.preventDefault();

                    window.open($this.data('whatsapp'));
                });

                var initPhotoSwipeFromDOM = function (gallerySelector) {
                    var parseThumbnailElements = function (el) {
                        var thumbElements = el.querySelectorAll('.gallery-item');

                        var items = [];

                        for (var i = 0; i < thumbElements.length; i++) {
                            var figureEl = thumbElements[i];

                            if (figureEl.nodeType !== 1) {
                                continue;
                            }

                            var linkEl = figureEl.querySelector('.gallery-item__link');
                            var size = linkEl.getAttribute('data-size').split('x');
                            var item = {
                                src: linkEl.getAttribute('href'),
                                w: parseInt(size[0], 10),
                                h: parseInt(size[1], 10)
                            };

                            var captionEl = figureEl.querySelector('.gallery__image__resource');
                            if (captionEl) {
                                item.title = captionEl.getAttribute('alt');
                            }

                            items.push(item);
                        }
                        return items;
                    };

                    var openPhotoSwipe = function (index, galleryElement, disableAnimation) {
                        var pswpElement = document.querySelectorAll('.pswp')[0];
                        var items = parseThumbnailElements(galleryElement);

                        var options = {
                            index: index,
                            galleryUID: galleryElement.getAttribute('data-pswp-uid'),
                            closeOnScroll: false
                        };

                        if (disableAnimation) {
                            options.showAnimationDuration = 0;
                        }

                        var gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);

                        gallery.init();
                    };

                    var galleryElements = document.querySelectorAll(gallerySelector);

                    galleryElements.forEach(function (galleryElement) {
                        galleryElement.addEventListener('click', function (e) {
                            e.preventDefault();
                            openPhotoSwipe(0, galleryElement); // Start with the first image
                        });
                    });
                };

                initPhotoSwipeFromDOM('.gallery');

                if( $_swiper_container.length ) {
                    const swiper = new Swiper('.swiper-container--related', {
                        slideClass: 'listings-swiper__item',
                        direction: 'horizontal',
                        loop: false,
                        slidesPerView: 'auto'
                    });
                }
            });
        </script>
    @endsection
</x-app-layout>
