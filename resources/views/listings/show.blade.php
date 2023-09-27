<x-app-layout>
    @section('page-title', $listing->title)

    @section('header-styles')
        @parent

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/default-skin/default-skin.min.css">
        <link href="{{ asset('/plugins/slick-1.8.1/slick.min.css') }}" rel="stylesheet">

        <style>
            /*.pswp__caption__center {
                text-align: center;
            }
            figure {
                display: inline-block;
                width: 33.333%;
                float: left;
            }
            img {

                width: 100%;
            }*/
        </style>
    @endsection

    @section('header-section')
        @include('listings.partials._show._item._gallery')
    @endsection

    <div class="listing-item section-item">
        <div class="listing-item__inner">
            <div class="listing-item__details">
                <div class="listing-item__details__inner p-3">
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

                    <div class="listing-item__share-bar mt-3">
                        @include('listings.partials._show._contact._share')
                    </div>
                </div>
            </div>

            <div class="listing-item__sidebar mt-3 mt-sm-0">
                <div class="listing-item__sidebar__inner p-2">
                    <div class="listing-item__sidebar__header">
                        <div class="listing-item__sidebar__logo">
                            <img src="{{ asset('images/logo.png') }}" class="listing-item__sidebar__logo__img">
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

    @include('listings.partials._related-listings')

    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <!-- Background of PhotoSwipe.
                 It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>
        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">
            <!-- Container that holds slides.
                      PhotoSwipe keeps only 3 of them in the DOM to save memory.
                      Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <!--  Controls are self-explanatory. Order can be changed. -->
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
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

    @section('footer-scripts')
        @parent

        <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe-ui-default.min.js"></script>
        <script src="{{ asset('/plugins/slick-1.8.1/slick.min.js') }}"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                var $_similar_items = $('.listings-slider__row');
                if ( $_similar_items.length ) {
                    $_similar_items.slick({
                        dots: false,
                        infinite: true,
                        speed: 300,
                        slidesToShow: 4,
                        slidesToScroll: 2,
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

                /*var initPhotoSwipeFromDOM = function(gallerySelector) {
                    var parseThumbnailElements = function (el) {
                        var thumbElements = el.querySelectorAll('.gallery-item');

                        //console.log(el);

                        var items = [];

                        for (var i = 0; i < thumbElements.length; i++) {
                            var figureEl = thumbElements[i];

                            if (figureEl.nodeType !== 1) {
                                continue;
                            }

                            var linkEl = figureEl.children[0];
                            var size = linkEl.getAttribute('data-size').split('x');
                            var item = {
                                src: linkEl.getAttribute('href'),
                                w: parseInt(size[0], 10),
                                h: parseInt(size[1], 10)
                            };
                            if (figureEl.children.length > 1) {
                                item.title = figureEl.children[1].innerHTML;
                            }
                            items.push(item);
                        }
                        return items;
                    }

                    var onThumbnailsClick = function(e) {
                        //console.log(e);

                        e = e || window.event;
                        e.preventDefault ? e.preventDefault() : (e.returnValue = false);
                        var eTarget = e.target || e.srcElement;
                        var clickedListItem = closest(eTarget, function(el) {
                            return el.tagName && el.tagName.toUpperCase() === 'FIGURE';
                        });
                        if (!clickedListItem) {
                            return;
                        }

                        console.log(clickedListItem);

                        //var clickedGallery = clickedListItem.parentNode;

                        var clickedGallery = clickedListItem.closest('.gallery');

                        console.log(clickedGallery);

                        var index = Array.prototype.indexOf.call(clickedGallery.children, clickedListItem);

                        console.log(index);

                        if (index >= 0) {
                            openPhotoSwipe(index, clickedGallery);
                        }
                        return false;
                    }

                    var openPhotoSwipe = function(index, galleryElement, disableAnimation) {
                        var pswpElement = document.querySelectorAll('.pswp')[0];
                        var items = parseThumbnailElements(galleryElement);

                        var options = {
                            index: index,
                            galleryUID: galleryElement.getAttribute('data-pswp-uid'),
                            //pinchToClose: false,
                            //zoomEl: false,
                            //tapToToggleControls: false,

                            //initialZoomLevel: 'fill',
                            //secondaryZoomLevel: 'fit',

                            closeOnScroll: !1
                        };
                        if (disableAnimation) {
                            options.showAnimationDuration = 0;
                        }
                        var gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);


                        gallery.init();
                    }

                    var closest = function closest(el, fn) {
                        return el && (fn(el) ? el : closest(el.parentNode, fn));
                    };

                    var galleryElements = $(gallerySelector);

                    console.log(galleryElements);

                    galleryElements.each(function(index) {
                        $(this).on('click', onThumbnailsClick);
                    });
                };

                initPhotoSwipeFromDOM('.gallery');*/

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


            });
        </script>
    @endsection
</x-app-layout>
