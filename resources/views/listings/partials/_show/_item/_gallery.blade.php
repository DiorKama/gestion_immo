<div class="listing-item__gallery mt-2">
    <div class="gallery__inner">
        @if( $listing->files()->count() )
            @php
                $files = $listing->files;
                $firstFile = $files->first();
                $otherFiles = $files->skip(1);
            @endphp

            <div class="gallery w-100" data-pswp-uid="{{ $listing->id }}">
                <div class="gallery__content {{ $otherFiles->count() ? '' : 'gallery__content--alone' }}">
                    <figure class="gallery-item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        <a
                            class="gallery-item__link"
                            href="{{ fullImageUrl('listing-gallery-full-1920w', $firstFile->path) }}"
                            itemprop="contentUrl"
                            data-size="1920x1440"
                        >
                            <img
                                class="gallery__image__resource w-100"
                                src="{{ fullImageUrl('listing-gallery-thumb-1280w', $firstFile->path) }}"
                                itemprop="thumbnail"
                                alt="{{ $listing->title }}"
                            />
                        </a>
                    </figure>

                    @if( $listing->files()->count() > 1 )
                        <div class="gallery__images-count text-center d-inline-block position-absolute">
                        <span class="gallery__images-count__inner">
                            <i class="fas fa-camera"></i>
                            <span class="listing-card__images-count px-1">{{ $listing->files()->count() }}</span>
                        </span>
                        </div>
                    @endif
                </div>

                @if( $otherFiles->count() )
                    <div class="gallery__aside">
                        @foreach( $otherFiles as $file)
                            @if( $loop->iteration < 3)
                                <figure class="gallery-item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                    <a
                                        class="gallery-item__link"
                                        href="{{ fullImageUrl('listing-gallery-full-1920w', $file->path) }}"
                                        itemprop="contentUrl"
                                        data-size="933x645"
                                    >
                                        <img
                                            class="gallery__image__resource w-100"
                                            src="{{ fullImageUrl('listing-gallery-thumb-640w', $file->path) }}"
                                            itemprop="thumbnail"
                                            alt="{{ $listing->title }}"
                                        />
                                    </a>
                                </figure>

                                @if ($loop->first)
                                    <div class="gallery-item__separator"></div>
                                @endif
                            @else
                                <figure class="gallery-item d-none" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                    <a
                                        class="gallery-item__link"
                                        href="{{ fullImageUrl('listing-gallery-full-1920w', $file->path) }}"
                                        itemprop="contentUrl"
                                        data-size="933x645"
                                    >
                                        <img
                                            class="gallery__image__resource"
                                            src="{{ fullImageUrl('listing-gallery-thumb-100w', $file->path) }}"
                                            itemprop="thumbnail"
                                            alt="{{ $listing->title }}"
                                        />
                                    </a>
                                </figure>
                            @endif
                        @endforeach
                    </div>
                @else
                    <div class="gallery__aside">
                        <figure class="gallery-item--inactive">
                            <img class="gallery__image__resource w-100" src="https://placehold.co/640x475?text=Image" itemprop="thumbnail" alt="Image 1">
                        </figure>
                        <figure class="gallery-item--inactive">
                            <img class="gallery__image__resource w-100" src="https://placehold.co/640x475?text=Image" itemprop="thumbnail" alt="Image 1">
                        </figure>
                    </div>
                @endif
            </div>
        @else
            <div class="gallery--inactive w-100">
                <div class="gallery__content">
                    <figure class="gallery-item">
                        <img class="gallery__image__resource w-100" src="https://placehold.co/1280x960?text=Image" itemprop="thumbnail" alt="Image 1">
                    </figure>
                </div>
                <div class="gallery__aside">
                    <figure class="gallery-item">
                        <img class="gallery__image__resource w-100" src="https://placehold.co/640x475?text=Image" itemprop="thumbnail" alt="Image 1">
                    </figure>
                    <figure class="gallery-item">
                        <img class="gallery__image__resource w-100" src="https://placehold.co/640x475?text=Image" itemprop="thumbnail" alt="Image 1">
                    </figure>
                </div>
            </div>
        @endif
    </div>
</div>

