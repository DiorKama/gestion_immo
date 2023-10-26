@php
    $image = $listing->files()->first();
@endphp

<div class="latest-listings-swiper__item swiper-slide border-transparent">
    <div class="latest-listings-swiper__item__inner bg-light">
        <div class="latest-listings-swiper__item__aside">
            <a
                class="latest-listings-swiper__item__image"
                href="{{ route('listings.show', [
                    'slug' => $listing->slug,
                    'id' => $listing->id,
                ]) }}"
            >
                @if( isset($image) && !empty($image))
                    <img
                        class="latest-listings-swiper__item__image__resource d-block w-100"
                        src="{{ fullImageUrl('listing-gallery-thumb-640w', $image->path) }}"
                        alt="{{ $listing->title }}"
                    >
                @else
                    <img
                        class="latest-listings-swiper__item__image__resource d-block w-100"
                        src="https://placehold.co/640x475?text=Annonce+Deux"
                        alt="{{ $listing->title }}"
                    >
                @endif
            </a>
        </div>
        <div class="latest-listings-swiper__item__content text-center p-2">
            <div class="latest-listings-swiper__item__content__inner">
                <div class="latest-listings-swiper__item__header mb-2">
                    <h2
                        class="latest-listings-swiper__item__title mb-1"
                    >
                        <a
                            href="{{ route('listings.show', [
                                'slug' => $listing->slug,
                                'id' => $listing->id,
                            ]) }}"
                        >
                            {{ $listing->title }}
                        </a>
                    </h2>

                    <div class="latest-listings-swiper__item__body">
                        <span class="latest-listings-swiper__item__address">
                            @if ($listing->location_title)
                                {{ $listing->location_title }},
                            @endif
                        </span>
                        <span class="latest-listings-swiper__item__address">
                            {{ $listing->region_title }}
                        </span>
                    </div>

                    <div class="latest-listings-swiper__item__category text-muted">
                        {{ $listing->category->title }}
                    </div>
                </div>

                <div class="latest-listings-swiper__item__footer">
                    <h4 class="latest-listings-swiper__item__price font-weight-bold text-uppercase mt-0 mb-2 mt-sm-4 mb-sm-0">
                        {!! listing_price($listing) !!}
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
