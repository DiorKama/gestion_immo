@php
    $files = $listing->files;
    $firstFile = collect();
    $otherFiles = collect();
@endphp

<div class="listings-slider__item premium-listing-card bg-light border-transparent">
    <a
        class="listings-slider__item__inner premium-listing-card__inner text-decoration-none"
        href="{{ route('listings.show', [
            'slug' => $listing->slug,
            'id' => $listing->id,
        ]) }}"
        id="listing-{{ $listing->id }}"
    >
        <div class="premium-listing-card__content premium-listing-card__content--body">
            <div class="premium-listing-card__aside">
                <div class="premium-listing-card__image">
                    @if( $files->count() )
                        @php
                            $firstFile = $files->first();
                            $otherFiles = $files->skip(1)->take(2);
                        @endphp

                        <img
                            class="premium-listing-card__image__resource d-block w-100"
                            src="{{ fullImageUrl('listing-gallery-thumb-1920w', $firstFile->path) }}"
                            alt="{{ $listing->title }}"
                        >
                    @else
                        <img
                            class="premium-listing-card__image__resource d-block w-100"
                            src="https://placehold.co/1920x1440?text=Image"
                            alt="{{ $listing->title }}"
                        >
                    @endif
                </div>
            </div>
            <div class="premium-listing-card__details pt-3">
                <h5 class="premium-listing-card__category font-weight-lighter mb-1">
                    <span class="text-muted">
                        {{ $listing->category->title }}
                    </span>
                </h5>

                <h1 class="premium-listing-card__title mb-2">
                    {{ $listing->title }}
                </h1>

                <h4 class="premium-listing-card__address">
                    <span class="town-suburb d-inline-block">
                        @if ($listing->location_title)
                            {{ $listing->location_title }},
                        @endif
                    </span>
                    <span class="province font-weight-bold d-inline-block">
                        {{ $listing->region_title }}
                    </span>
                </h4>

                <h4 class="premium-listing-card__price font-weight-bold text-uppercase mt-0 mb-2 mt-sm-4 mb-sm-0">
                    {!! listing_price($listing) !!}
                </h4>

                <h6 class="premium-listing-card__date text-capitalize">
                    <p class="time m-0">{{ shortRelativeDate($listing->display_date) }}</p>
                </h6>
            </div>
        </div>
        <div class="premium-listing-card__content premium-listing-card__content--footer align-items-start mt-3">
            <div class="premium-listing-card__aside">
                <div class="premium-listing-card__gallery premium-listing-card__gallery--thumb">
                    @for($i = 1; $i < 4; $i++)
                        @if($otherFiles->offsetExists($i))
                            @php
                                $item = $otherFiles[$i]
                            @endphp

                            <div class="premium-listing-card__gallery__image premium-listing-card__gallery__image--thumb">
                                <div class="premium-listing-card__gallery__image__inner">
                                    <img
                                        class="premium-listing-card__gallery__image__resource w-100"
                                        src="{{ fullImageUrl('listing-gallery-thumb-192w', $item->path) }}"
                                        alt="{{ $listing->title }}"
                                    >
                                </div>
                            </div>
                        @else
                            <div class="premium-listing-card__gallery__image premium-listing-card__gallery__image--thumb">
                                <div class="premium-listing-card__gallery__image__inner">
                                    <img
                                        class="premium-listing-card__gallery__image__resource w-100"
                                        src="https://placehold.co/192x144?text=Image"
                                        alt="{{ $listing->title }}"
                                    >
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
            <div class="premium-listing-card__details">
                <div class="premium-listing-card__description">
                    {{ Str::limit($listing->description, 120) }}
                </div>
            </div>
        </div>
    </a>
</div>
