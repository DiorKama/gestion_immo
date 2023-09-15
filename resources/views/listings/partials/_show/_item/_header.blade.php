<div class="listing-item__header mb-5">
    <h5 class="listing-item__category font-weight-lighter mb-1">
        <a
            href="{{ $categoryUrl }}"
        >
            {{ $categoryTitle }}
        </a>
    </h5>

    <h1 class="listing-item__title mb-0">
        {{ $title }}
    </h1>

    <h4 class="listing-item__address">
        3 Pièces · 200 m² · Mamelles · Cité Mbackiou FAYE
    </h4>

    <h4 class="listing-item__price font-weight-bold text-uppercase mt-4 mb-2">
        {!! $price !!}
    </h4>

    <h6 class="listing-item__date text-capitalize">
        {{ $createdAt }}
    </h6>
</div>
