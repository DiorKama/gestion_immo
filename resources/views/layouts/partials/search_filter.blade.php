<div>
    <form
        action=""
        method="GET"
        class="search-form"
    >
        <div class="search-form__filters mb-2">
            <div class="search-form__filters__inner row">
                <div class="col">
                    <input type="text" class="form-control form-control-sm" name="q" placeholder="Recherchez ...">
                </div>

                <div class="col">
                    <input type="text" class="form-control form-control-sm js-autocomplete" name="category_id" data-url="{{ route('admin.ajax.categories.autocomplete') }}" data-value="{{ Request::input('category_id_autocomplete') }}" data-parameter="q" placeholder="Catégorie ...">
                </div>

                <div class="col">
                    <input type="text" class="form-control form-control-sm js-autocomplete" name="user_id" data-url="{{ route('admin.ajax.users.autocomplete') }}" data-value="{{ Request::input('user_id_autocomplete') }}" data-parameter="q" placeholder="Utilisateur ...">
                </div>
            </div>
        </div>

        <div class="search-form__actions">
            <div class="search-form__col--action d-inline-block">
                <button type="submit" class="btn btn-primary btn-sm">
                    {{ __('Rechercher') }}
                </button>

                @yield('customFilters')
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
