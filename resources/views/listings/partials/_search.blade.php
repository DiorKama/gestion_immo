<div class="search__filter__container">
    <div class="search__filter__inner">
        <form
            action="{{ route('listings.search') }}"
            method="GET"
            class="search__filter__row"
        >
            <div class="search__filter__col">
                <div class="filter__row">
                    <div class="filter__col filter__col--category">
                        <div class="form-group mb-0">
                            <select class="form-control filter-group @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="">{{ __('Séléctionnez ...') }}</option>
                                @foreach($_searchCategories as $_category)
                                    @if ( isset($_category['children']) && !empty($_category['children']) )
                                        <optgroup label="{{ $_category["category"]->title }}">
                                            @foreach($_category['children'] as $child)
                                                <option value="{{ $child["category"]->id }}" @selected(old('category_id', request()->query('category_id')) == $child["category"]->id)>{{ $child["category"]->title }}</option>
                                            @endforeach
                                        </optgroup>
                                    @else
                                        <option value="{{ $_category["category"]->id }}">{{ $_category["category"]->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="filter__col filter__col--location">
                        <div class="form-group mb-0">
                            <select class="form-control filter-group @error('location_id') is-invalid @enderror" name="location_id">
                                <option value="">{{ __('Séléctionnez ...') }}</option>
                                @foreach($_searchLocations as $_location)
                                    @if ( isset($_location['children']) && !empty($_location['children']) )
                                        <optgroup label="{{ $_location["title"] }}">
                                            @foreach($_location['children'] as $child)
                                                <option value="{{ $child["id"] }}" @selected(old('location_id', request()->query('location_id')) == $child["id"])>{{ $child["title"] }}</option>
                                            @endforeach
                                        </optgroup>
                                    @else
                                        <option value="{{ $_location["id"] }}">{{ $_location["title"] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="filter__col filter__col--budget">
                        <div class="form-group mb-0">
                            <div class="input-group">
                                <input type="number" name="budget" class="form-control filter-group" value="{{ request()->query('budget') }}" placeholder="Votre budget max ?">
                                <div class="input-group-append">
                                    <div class="input-group-text">Frs CFA</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter__col filter__col--submit">
                        <button type="submit filters__submit mb-0" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
