<div class="our-properties__row section-item__row">
    <div class="our-properties__aside section-item__aside">
        <div class="our-deals__header section-item__header">
            @include('home.partials._latest-listings._category-nav', [
                '_categories' => $_categories,
                'title' => $title,
            ])
        </div>
    </div>
    <div class="our-properties__content section-item__content">
        <div class="latest-listings home__section home__section--latest-listings">
            @include('home.partials._latest-listings._list', [
                'latestListings' => $latestListings
            ])
        </div>
    </div>
</div>
