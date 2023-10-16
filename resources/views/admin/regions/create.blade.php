<x-master-layout>
    @section('page-title', __('Créer une région'))

    @section('page-header-title', __('Créer une région'))

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('admin.regions.store') }}" method="post">
                            @csrf

                            <div class="card-header">
                                <h3 class="card-title">{{ __('Ajouter une region') }}</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        Erreur survenue. Merci de réessayer !
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>{{ __('Pays') }}</label>
                                    <input type="text" class="form-control form-control-sm js-autocomplete" name="country_id" data-url="{{ route('admin.ajax.countries.autocomplete') }}" data-value="{{ Request::input('country_id_autocomplete') }}" data-parameter="q" placeholder="Pays ...">

                                    @error("title")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Nom de la region') }}</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="{{ __('Region ...') }}" required>
                                    @error("title")
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
