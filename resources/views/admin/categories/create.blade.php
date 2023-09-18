<x-master-layout>
    @section('page-title', __('Créer une catégorie'))

    @section('page-header-title', __('Créer une catégorie'))

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form  method="POST" action="{{ route('admin.categories.store') }}" autocomplete="on">
                            @csrf

                            <div class="card-header">
                                <h3 class="card-title">{{ __('Ajouter une catégorie') }}</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        Erreur survenue. Merci de réessayer !
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>{{ __('Titre de la catégorie') }}</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="{{ __('Catégorie ...') }}" required>
                                    @error("title")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Catégorie parent') }}</label>
                                    <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id">
                                        <option value="">{{ __('Séléctionnez ...') }}</option>
                                        @foreach($_categoriesList as $categoryID => $categoryTitle)
                                            <option value="{{ $categoryID }}" @selected(old('parent_id') == $categoryID)>{{ $categoryTitle }}</option>
                                        @endforeach
                                    </select>
                                    @error("parent_id")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Description') }}</label>
                                    <textarea
                                        name="description"
                                        class="form-control @error('description') is-invalid @enderror"
                                    >{{ old('description') }}</textarea>
                                    @error("description")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Ordre') }}</label>
                                    <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order') }}" required>
                                    @error("sort_order")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary">{{ __('Enregistrer') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master-layout>
