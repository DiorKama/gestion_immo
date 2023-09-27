<x-app-layout>
    @section('page-title', 'Retrouvez tous biens immobiliers')

    <div class="listings-cards section-item">
        <div class="listings-cards__inner section-item__inner">
            <div class="listings-cards__row section-item__row">
                @include('listings.partials._header')

                <div class="listings-cards__content d-flex flex-column align-items-start">
                    @include('listings.partials._index', [
                        'listings' => $listings
                    ])

                    @include('listings.partials._pagination')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
