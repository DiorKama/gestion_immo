<x-master-layout>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('countries.store') }}" method="post">
                            @csrf

                            <div class="card-header">
                                <h3 class="card-title">{{ __('Ajouter un pays') }}</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        Erreur survenue. Merci de réessayer !
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>{{ __('Nom du pays') }}</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="{{ __('Pays ...') }}" required>
                                    @error("title")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Code du pays') }}</label>
                                    <input type="text" name="iso" class="form-control @error('iso') is-invalid @enderror" value="{{ old('iso') }}" placeholder="{{ __('Code ...') }}" required>
                                    @error("iso")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Indicatif du pays') }}</label>
                                    <input type="text" name="area_code" class="form-control @error('area_code') is-invalid @enderror" value="{{ old('area_code') }}" placeholder="{{ __('+Indicatif ...') }}" required>
                                    @error("area_code")
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
