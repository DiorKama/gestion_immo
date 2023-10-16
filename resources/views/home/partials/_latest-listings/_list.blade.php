<div class="latest-listings__inner container">
    <div class="row align-items-start">
        <div class="listings-slider listings-slider--featured col">
            <div class="listings-slider__container">
                <div class="latest-listings-slider__row justify-content-start my-3">
                    @foreach($latestListings as $listing)
                        @include('home.partials._latest-listings._card', [
                            'listing' => $listing
                        ])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
