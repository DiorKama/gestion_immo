<x-app-layout>
    @section('header-styles')
        @parent

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/default-skin/default-skin.min.css">
        <link href="{{ asset('/plugins/slick-1.8.1/slick.min.css') }}" rel="stylesheet">

        <style>
            .pswp__caption__center {
                text-align: center;
            }
            figure {
                display: inline-block;
                width: 33.333%;
                float: left;
            }
            img {

                width: 100%;
            }
        </style>
    @endsection

    @section('header-section')
        <div class="listing-item__gallery">
            <div class="listing-item__gallery__container">
                <div class="listing-item__gallery__inner">
                    <div class="pswp-gallery pswp-gallery--single-column" id="gallery--getting-started">
                        <div class="row">
                            <div class="col-7">
                                <figure class="w-100">
                                    <a class="gallery-item__link" href="https://placehold.co/300x400?text=Annonce+Deux""
                                       data-width="1669"
                                       data-height="2500"
                                       data-caption="Image 1">
                                        <img src="https://placehold.co/500x280?text=Annonce+Deux"" alt="" />
                                    </a>
                                </figure>
                            </div>
                            <div class="col-5">
                                <figure class="w-100">
                                    <a class="gallery-item__link" href="https://placehold.co/300x400?text=Annonce+Deux""
                                    data-width="1669"
                                    data-height="2500"
                                    data-caption="Image 1">
                                    <img src="https://placehold.co/500x280?text=Annonce+Deux"" alt="" />
                                    </a>
                                </figure>

                                <figure class="w-100">
                                    <a class="gallery-item__link" href="https://placehold.co/300x400?text=Annonce+Deux""
                                    data-width="1669"
                                    data-height="2500"
                                    data-caption="Image 1">
                                    <img src="https://placehold.co/500x280?text=Annonce+Deux"" alt="" />
                                    </a>
                                </figure>
                            </div>
                        </div>

                        https://placehold.co/300x400?text=Annonce+Deux"

                        <div class="c">

                        </div>

                        <!--<figure>
                            <a class="gallery-item__link" href="https://cdn.photoswipe.com/photoswipe-demo-images/photos/2/img-2500.jpg"
                               data-width="1669"
                               data-height="2500"
                               data-caption="Image 1">
                                <img src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/2/img-200.jpg" alt="" />
                            </a>
                        </figure>

                        <figure>
                            <a class="gallery-item__link" href="https://cdn.photoswipe.com/photoswipe-demo-images/photos/3/img-2500.jpg"
                               data-width="1875"
                               data-height="2500"
                               data-caption="Image 2">
                                <img src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/3/img-200.jpg" alt="" />
                            </a>
                        </figure>

                        <figure>
                            <a class="gallery-item__link" href="https://cdn.photoswipe.com/photoswipe-demo-images/photos/6/img-2500.jpg"
                               data-width="2500"
                               data-height="1667"
                               data-caption="Image 3">
                                <img src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/6/img-200.jpg" alt="" />
                            </a>
                        </figure>-->
                    </div>
                </div>
            </div>
        </div>
    @endsection

    <div class="listing-item section-item">
        <div class="listing-item__inner">
            <div class="listing-item__details">
                <div class="listing-item__details__inner p-3">
                    <div class="listing-item__header mb-5">
                        <h5 class="listing-item__category font-weight-lighter mb-1">
                            Appartements meublés
                        </h5>

                        <h1 class="listing-item__title mb-0">
                            Appartement F4 à louer
                        </h1>

                        <h4 class="listing-item__address">
                            <span class="town-suburb d-inline-block">
                                @if ($listing->location_title)
                                            {{ $listing->location_title }},
                                        @endif
                            </span>
                                    <span class="province font-weight-bold d-inline-block">
                                {{ $listing->region_title }}
                            </span>
                        </h4>

                        <h4 class="listing-item__price font-weight-bold text-uppercase mt-4 mb-2">
                            10 550 000 F <span class="font-weight-lighter">CFA</span>
                        </h4>

                        <h6 class="listing-item__date">
                            Publié, il ya 12 jours
                        </h6>
                    </div>
                    <div class="listing-item__content">
                        <div class="listing-item__section">
                            <div class="listing-item__section__header">
                                <h5 class="listing-item__section__title">
                                    Description
                                </h5>
                                <hr>
                            </div>
                            <div class="listing-item__section__content listing-item__description">
                                Appartement de bon standing à louer aux Mamelles à la cité Mbackiou FAYE.
                                Immeuble neuf avec groupe électrogène, ascenseur, gardiennage et terrasse accessible.
                            </div>
                        </div>

                        <div class="listing-item__section">
                            <div class="listing-item__section__header">
                                <h5 class="listing-item__section__title">
                                    Critères
                                </h5>
                                <hr>
                            </div>
                            <div class="listing-item__section__content">
                                Appartement de bon standing à louer aux Mamelles à la cité Mbackiou FAYE.
                                Immeuble neuf avec groupe électrogène, ascenseur, gardiennage et terrasse accessible.
                            </div>
                        </div>

                        <div class="listing-item__section">
                            <div class="listing-item__section__header">
                                <h5 class="listing-item__section__title">
                                    Commodité
                                </h5>
                                <hr>
                            </div>
                            <div class="listing-item__section__content">
                                Appartement de bon standing à louer aux Mamelles à la cité Mbackiou FAYE.
                                Immeuble neuf avec groupe électrogène, ascenseur, gardiennage et terrasse accessible.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="listing-item__sidebar mt-3 mt-sm-0">
                <div class="listing-item__sidebar__inner p-2">
                    <div class="listing-item__sidebar__header">
                        <div class="listing-item__sidebar__logo">
                            @if( file_exists(public_path('logo.png')) )
                                <img src="{{ asset('logo.png') }}" class="listing-item__sidebar__logo__img">
                            @endif
                        </div>
                    </div>
                    <div class="listing-item__sidebar__contact">
                        <div class="listing-item__sidebar__company">
                            <h4 class="listing-item__sidebar__company-name">
                                {{ __('Azimuts Immobilier') }}
                            </h4>

                            <p class="listing-item__sidebar__company-address">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ __('Km 2.5 Bd du Centenaire de la commune de Dakar') }}
                            </p>
                        </div>

                        <div class="listing-item__sidebar__contact listing-item__sidebar__contact--phone">
                            <a href="javascript:void(0)" class="listing-item__contact-item listing-item__contact-item--phone" data-toggle="modal" data-target="#phone_display">
                                <i class="fas fa-phone-alt"></i>
                            </a>

                            <!-- Phone view start -->
                            <div class="modal fade listing-item__contact--phone-modal" id="phone_display" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                {{ __('Azimuts Immobilier') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Phone view end -->

                            <a href="" class="listing-item__contact-item listing-item__contact-item--whatsapp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>

                        <div class="listing-item__sidebar__contact listing-item__sidebar__contact--email">
                            <form class="listing-item__contact-form" action="">
                                <div class="listing-item__contact-form__group mb-2 text required">
                                    <input type="text" name="name" placeholder="{{ __('Nom & Prénom') }}" class="listing-item__contact-form__input" required="required" id="username">
                                    <span class="listing-item__contact-form__focus-input"></span>
                                    <span class="listing-item__contact-form__icon"><i class="fa fa-user"></i></span>
                                </div>

                                <div class="listing-item__contact-form__group mb-2 text required">
                                    <input type="email" name="email" placeholder="{{ __('E-mail') }}" class="listing-item__contact-form__input" required="required" id="username">
                                    <span class="listing-item__contact-form__focus-input"></span>
                                    <span class="listing-item__contact-form__icon"><i class="fas fa-envelope"></i></span>
                                </div>

                                <div class="listing-item__contact-form__group mb-2 text required">
                                    <input type="text" name="phone" placeholder="{{ __('Votre téléphone') }}" class="listing-item__contact-form__input" required="required" id="username">
                                    <span class="listing-item__contact-form__focus-input"></span>
                                    <span class="listing-item__contact-form__icon"><i class="fas fa-phone fa-rotate-90"></i></span>
                                </div>

                                <div class="listing-item__contact-form__group mb-2 text required">
                                    <textarea class="listing-item__contact-form__input listing-item__contact-form__focus-input--textarea" id="exampleFormControlTextarea1" rows="3" placeholder="{{ __('Votre message ici') }}"></textarea>
                                    <span class="listing-item__contact-form__focus-input"></span>
                                    <span class="listing-item__contact-form__icon"><i class="fas fa-envelope-open-text"></i></span>
                                </div>

                                <button type="submit" class="btn btn-block btn-primary">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="listings-related">
        <div class="listings-related__inner">
            <div class="row align-items-start mt-3 mb-0 mb-md-4">
                <div class="listings-slider listings-slider--related col">
                    <div class="listings-slider__container">
                        <div class="listings-slider__header">
                            <div class="about-us__header section-item__header">
                                <div class="about-us__header__inner section-item__header__inner">
                                    <h2 class="about-us__header__title section-item__header__title">
                                        {{ __('Ces annonces peuvent vous intéresser') }}
                                    </h2>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="listings-slider__row row justify-content-start my-3">
                            <?php for ($i=0; $i < 10; $i++) { ?>
                                <div class="listings-slider__item">
                                    <div class="listings-slider__item__inner">
                                        <div class="listings-slider__item__thumbnail">
                                            <a href="">
                                                <img src="https://placehold.co/250x200?text=Image" class="listing-card__image__resource d-block w-100" alt="...">
                                            </a>
                                        </div>
                                        <div class="listings-slider__item__details py-2">
                                            <h2 class="listings-slider__item__title mb-md-1 mb-0">
                                                <a href="">
                                                    {{ __('Appartements F4 à louer') }}
                                                </a>
                                            </h2>

                                            <div class="listings-slider__item__address mb-1">
                                                <span class="town-suburb d-inline-block">Grand-Yoff,</span>
                                                <span class="province font-weight-bold d-inline-block">Dakar</span>
                                            </div>

                                            <h3 class="listings-slider__item__price text-uppercase font-weight-bold mb-1">
                                                35 000 000 F <span class="font-weight-lighter">CFA</span>
                                            </h3>

                                            <div class="listings-slider__item__footer">
                                                <div class="listings-slider__item__date">
                                                    <p class="time m-0">Passée, il y a 2 jours</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                // Init empty gallery array
                var container = [];

                // Loop over gallery items and push it to the array
                $('#gallery--getting-started').find('figure').each(function() {
                    var $link = $(this).find('a'),
                        item = {
                            src: $link.attr('href'),
                            w: $link.data('width'),
                            h: $link.data('height'),
                            title: $link.data('caption')
                        };
                    container.push(item);
                });

                // Define click event on gallery item
                $('.gallery-item__link').click(function(event) {

                    // Prevent location change
                    event.preventDefault();

                    // Define object and gallery options
                    var $pswp = $('.pswp')[0],
                        options = {
                            index: $(this).parent('figure').index(),
                            bgOpacity: 0.85,
                            showHideOpacity: true
                        };

                    // Initialize PhotoSwipe
                    var gallery = new PhotoSwipe($pswp, PhotoSwipeUI_Default, container, options);
                    gallery.init();
                });

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
            });
        </script>
    @endsection
</x-app-layout>
