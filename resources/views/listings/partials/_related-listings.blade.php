@inject('listingService', 'App\Services\ListingService')

@php
    $listings = $listingService->relatedListings($listing);
@endphp

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
                        @foreach($listings as $listing)
                            @include('listings.partials._related-listings._list-item', [
                                'title' => $listing->title,
                                'listingUrl' => route('listings.show', [
                                    'slug' => $listing->slug,
                                    'id' => $listing->id,
                                ]),
                                'price' => listing_price($listing),
                                'displayDate' => shortRelativeDate($listing->display_date),
                            ])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
