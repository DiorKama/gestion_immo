<x-master-layout>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('listings.store') }}" method="post">
                            @csrf

                            <div class="card-header">
                                <h3 class="card-title">{{ __('Ajouter une annonce') }}</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        Erreur survenue. Merci de réessayer !
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>{{ __('Titre Annonce') }}</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="{{ __('Titre Annonce...') }}" required>
                                    @error("title")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Categories') }}</label>
                                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">{{ __('Sélectionnez') }}</option>
                                        @foreach($_categories as $categoryID => $categoryTitle)
                                            <option value="{{ $categoryID }}" @selected(old('category_id') == $categoryID)>{{ $categoryTitle }}</option>
                                        @endforeach
                                    </select>
                                    @error("category_id")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Localités') }}</label>
                                    <select name="location_id" class="form-control @error('location_id') is-invalid @enderror">
                                        <option value="">{{ __('Sélectionnez') }}</option>
                                        @foreach($_locations as $locationID => $locationTitle)
                                            <option value="{{ $locationID }}" @selected(old('location_id') == $locationID)>{{ $locationTitle }}</option>
                                        @endforeach
                                    </select>
                                    @error("location_id")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Ajouter') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master-layout>