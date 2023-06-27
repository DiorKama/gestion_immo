<x-master-layout>
    @section('page-title', __('Modifier une annonce'))

    @section('page-header-title', __('Modifier :listing', [
        'listing' => $listing->title
    ]))

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('listings.update', $listing) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="card-header">
                                <h3 class="card-title">{{ __('Modifier :listingTitle', [
                                    'listingTitle' => $listing->title
                                ]) }}</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        Erreur survenue. Merci de réessayer !
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>{{ __('Titre Annonce') }}</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $listing->title) }}" placeholder="{{ __('Titre Annonce...') }}" required>
                                    @error("title")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Catégorie parent') }}</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                        <option value="">{{ __('Séléctionnez ...') }}</option>
                                        @foreach($_categories as $_category)
                                            @if ( isset($_category['children']) && !empty($_category['children']) )
                                                <optgroup label="{{ $_category["category"]->title }}">
                                                    @foreach($_category['children'] as $child)
                                                        <option value="{{ $child["category"]->id }}" @selected(old('category_id', $listing->category_id) == $child["category"]->id)>{{ $child["category"]->title }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @else
                                                <option value="{{ $_category["category"]->id }}">{{ $_category["category"]->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error("category_id")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Localité') }}</label>
                                    <select class="form-control @error('location_id') is-invalid @enderror" name="location_id">
                                        <option value="">{{ __('Séléctionnez ...') }}</option>
                                        @foreach($_locations as $_location)
                                            @if ( isset($_location['children']) && !empty($_location['children']) )
                                                <optgroup label="{{ $_location["title"] }}">
                                                    @foreach($_location['children'] as $child)
                                                        <option value="{{ $child["id"] }}" @selected(old('location_id', $listing->location_id) == $child["id"])>{{ $child["title"] }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @else
                                                <option value="{{ $_location["id"] }}">{{ $_location["title"] }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error("location_id")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Description') }}</label>
                                    <textarea
                                        name="description"
                                        class="form-control @error('description') is-invalid @enderror"
                                    >{{ old('description', $listing->description) }}</textarea>
                                    @error("description")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Prix') }}</label>
                                    <div class="input-group mb-2">
                                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $listing->price) }}" placeholder="Prix du bien ...">
                                        <div class="input-group-append">
                                            <div class="input-group-text">{{ __('Frs CFA') }}</div>
                                        </div>
                                    </div>
                                    @error("price")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Modifier') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master-layout>
