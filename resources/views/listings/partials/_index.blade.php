<div class="listings-cards__list w-100">
    @if ( $listings->isNotEmpty() )
        @for ($count = 0; $count < $listings->count();)
            <div class="listings-cards__row row mt-5">
                @for ($i = 0; $count < $listings->count() && $i < 3; $count++, $i++)
                    @include('listings.partials.card', [
                        'listing' => $listings->slice($count, 1)->first()
                    ])
                @endfor
            </div>
        @endfor
    @else

    @endif
</div>
