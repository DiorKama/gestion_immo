<div class="our-deals__header__inner section-item__header__inner">
    <h2 class="our-deals__header__title section-item__header__title">
        {{ $title }}
    </h2>
    <hr>
</div>

@unless( $agent->isMobile() )
    @if ( isset($_categories) && !empty($_categories) )
        <nav
            class="category-nav"
        >
            <div class="category-nav__inner-container">
                <ul class="category-nav__list">
                    @foreach ($_categories as $category)
                        <li class="category-nav__list-item">
                            <a
                                href="{{ route('listings.category', [
                                'dbCategory' => $category['slug']
                            ]) }}"
                                class="category-nav__list-link text-decoration-none"
                            >
                                {{ $category['title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </nav>
    @else
        <p class="text-muted mt-5">{{ __('Aucune catégorie à afficher.') }}</p>
    @endif

    <div class="mt-3">
        <a
            class="btn btn-block btn-primary"
            href="{{ route('listings.index') }}"
        >
            {{ __('Tous les biens') }}
        </a>
    </div>
@endunless
