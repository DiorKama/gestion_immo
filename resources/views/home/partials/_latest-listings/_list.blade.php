<div class="latest-listings__inner container">
    <div class="row align-items-start">
        <div class="listings-slider listings-slider--featured col">
            <div class="listings-slider__container">
                @if( $agent->isMobile() )
                    <div class="latest-listings-swiper__row row justify-content-start my-3">
                        <div class="latest-listings-swiper__col swiper-container col-12">
                            <div class="latest-listings-swiper__wrapper swiper-wrapper">
                                @foreach($latestListings as $listing)
                                    @include('home.partials._latest-listings._swiper-card', [
                                        'listing' => $listing
                                    ])
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <div class="latest-listings-slider__row justify-content-start my-3">
                        @foreach($latestListings as $listing)
                            @include('home.partials._latest-listings._card', [
                                'listing' => $listing
                            ])
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
