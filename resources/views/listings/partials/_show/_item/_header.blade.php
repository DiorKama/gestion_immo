<div class="listing-item__header mb-5">
    <h5 class="listing-item__category font-weight-lighter mb-1">
        <a
            class="text-decoration-none text-muted"
            href="{{ $categoryUrl }}"
        >
            {{ $categoryTitle }}
        </a>
    </h5>

    <h1 class="listing-item__title mb-2">
        {{ $title }}
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
        {!! $price !!}
    </h4>

    <h6 class="listing-item__date text-capitalize">
        {{ $createdAt }}
    </h6>
</div>
