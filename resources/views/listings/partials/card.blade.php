@include('listings.partials._card._phone')
@include('listings.partials._card._whatsapp')

<div class="listings-cards__list-item">
    <div class="listing-card">
        @include('listings.partials._card._image')

        <div class="listing-card__content py-2">
            <div class="listing-card__content__inner">
                <h2 class="listing-card__header__title">
                    <a
                        href="{{ route('listings.show', [
                            'slug' => $listing->slug,
                            'id' => $listing->id,
                        ]) }}"
                        id="listing-{{ $listing->id }}"
                    >
                        {{ $listing->title }}
                    </a>
                </h2>
                <div class="listing-card__properties">
                    <ul class="listing-card__attribute-list list-inline mb-0">
                        <li class="listing-card__attribute list-inline-item">
                            Ref. 123456
                        </li>
                        <li class="listing-card__attribute list-inline-item">
                            Ref. 123456
                        </li>
                        <li class="listing-card__attribute list-inline-item">
                            Ref. 123456
                        </li>
                        <li class="listing-card__attribute list-inline-item">
                            Ref. 123456
                        </li>
                    </ul>
                </div>
                <div class="listing-card__address">
                    <span class="town-suburb d-inline-block">Grand-Yoff,</span>
                    <span class="province font-weight-bold d-inline-block">Dakar</span>
                </div>
                <h3 class="listing-card__price font-weight-bold text-uppercase my-2">
                    {!! listing_price($listing) !!}
                </h3>
                <div class="listing-card__date">
                    <p class="time m-0">{{ shortRelativeDate($listing->display_date) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
