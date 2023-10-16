<div class="our-deals__row section-item__row align-items-end">
    <div class="our-deals__aside col-3">
        <div class="our-deals__header section-item__header">
            <div class="our-deals__header__inner section-item__header__inner">
                <h2 class="our-deals__header__title section-item__header__title vertical-text">
                    {{ $title }}
                </h2>
            </div>
        </div>
    </div>
    <div class="our-deals__content col-9">
        <div class="listings-featured home__section home__section--listings-featured">
            <div class="listings-featured__inner container">
                <div class="row align-items-start">
                    <div class="listings-slider listings-slider--featured col">
                        <div class="listings-slider__container">
                            @include(
                                'home.partials._premium-listings._list',
                                [
                                    'premiumListings' => $premiumListings,
                                ]
                            )
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
