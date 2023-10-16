<div class="our-properties__row section-item__row align-items-end">
    <div class="our-properties__aside col-12 col-sm-3 mb-sm-0 mb-3">
        <div class="our-deals__header section-item__header">
            @include('home.partials._latest-listings._category-nav', [
                '_categories' => $_categories,
                'title' => $title,
            ])
        </div>
    </div>
    <div class="our-properties__content col-12 col-sm-9">
        <div class="latest-listings home__section home__section--latest-listings">
            @include('home.partials._latest-listings._list', [
                'latestListings' => $latestListings
            ])
        </div>
    </div>
</div>
