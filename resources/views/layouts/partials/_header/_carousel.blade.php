<div id="carousel-controls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @if( $_banners->isNotEmpty() )
            @foreach($_banners as $banner)
                @if ($loop->first)
                    <div class="carousel-item active">
                        <img src="{{ fullImageUrl('banner-thumb-1240w', $banner['image']) }}" class="d-block w-100" alt="{{ $banner['title'] }}">
                    </div>
                @else
                    <div class="carousel-item">
                        <img src="{{ fullImageUrl('banner-thumb-1240w', $banner['mobile_image']) }}" class="d-block w-100" alt="{{ $banner['title'] }}">
                    </div>
                @endif
            @endforeach
        @else
            <div class="carousel-item active">
                <img src="https://placehold.co/1240x620?text=Image+Une" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://placehold.co/1240x620?text=Image+Deux" class="d-block w-100" alt="...">
            </div>
        @endif
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carousel-controls" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">{{ __('Précedent') }}</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carousel-controls" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">{{__('Suivant')}}</span>
    </button>
</div>
