<div>
    <form
        action=""
        method="GET"
        class="search-form"
    >
        <div class="search-form__filters mb-2">
            <div class="search-form__filters__inner row">
                <div class="col">
                    <input type="text" class="form-control form-control-sm" name="q" placeholder="Recherchez ..." value="{{ Request::input('q') }}">
                </div>

                @yield('customFilters')
            </div>
        </div>

        <div class="search-form__actions">
            <div class="search-form__col--action d-inline-block">
                <button type="submit" class="btn btn-primary btn-sm">
                    {{ __('Rechercher') }}
                </button>
            </div>

            <div class="search-formh__col--action d-inline-block">
                <a
                    class="btn btn-default btn-sm"
                    href="{{ Request::url() }}"
                >
                    {{ __('Réinitialiser') }}
                </a>
            </div>
        </div>
    </form>
</div>
