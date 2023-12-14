<div class="listing-card__aside">
    <a
        href="{{ $url }}"
        class="listing-card__image"
    >
        @if( isset($image) && ! empty($image) )
            <img src="{{ fullImageUrl('listing-thumb-360w', $image->path) }}" class="listing-card__image__resource d-block w-100">
        @else
            <img src="https://placehold.co/360x270?text=Image" class="listing-card__image__resource d-block w-100" alt="...">
        @endif
    </a>
</div>
