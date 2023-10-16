@php
    $image = $listing->files()->first();
@endphp

<div class="listings-slider__item latest-listing-card__container">
    <div class="latest-listing-card">
        @if( isset($image) && !empty($image))
            <img
                class="latest-listing-card__image__resource"
                src="{{ fullImageUrl('listing-gallery-thumb-640w', $image->path) }}"
                alt="{{ $listing->title }}"
            >
        @else
            <img
                class="latest-listing-card__image__resource"
                src="https://placehold.co/640x475?text=Annonce+Deux"
                alt="{{ $listing->title }}"
            >
        @endif

        <figcaption class="latest-listing-card__details">
            <div class="latest-listing-card__details__inner">
                <h2
                    class="latest-listing-card__title"
                >
                    {{ $listing->title }}
                </h2>

                <p class="latest-listing-card__description">
                    <span class="latest-listing-card__address">
                        @if ($listing->location_title)
                            {{ $listing->location_title }},
                        @endif
                    </span>
                        <span class="latest-listing-card__address">
                        {{ $listing->region_title }}
                    </span>

                        <span class="latest-listing-card__category">
                        {{ $listing->category->title }}
                    </span>
                </p>
            </div>
            <a
                class="latest-listing-card__read-more"
                href="{{ route('listings.show', [
                    'slug' => $listing->slug,
                    'id' => $listing->id,
                ]) }}"
            >
                {{ __('Voir plus') }}
            </a>
        </figcaption>
    </div>
</div>
