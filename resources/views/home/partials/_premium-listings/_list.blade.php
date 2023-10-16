<div class="featured-listings-slider__row row justify-content-start my-3">
    @foreach ($premiumListings->shuffle() as $listing)
        @include('home.partials._premium-listings._card', [
            'listing' => $listing
        ])
    @endforeach
</div>
