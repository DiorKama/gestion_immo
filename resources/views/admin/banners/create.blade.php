<x-master-layout>
@section('page-title', __('Créer une Bannière'))

@section('page-header-title', __('Créer une Bannière'))
<section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('admin.banners.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="card-header">
                                <h3 class="card-title">{{ __('Ajouter une bannière') }}</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        Erreur survenue. Merci de réessayer !
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>{{ __('Nom Bannière') }}</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="{{ __('Titre ...') }}" required>
                                    @error("title")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Url') }}</label>
                                    <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url') }}" placeholder="{{ __('Url ...') }}" required>
                                    @error("url")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Tye de Bannière') }}</label>
                                    <select  aria-label="Default select example" name="type_banner" class="form-control @error('type_banner') is-invalid @enderror" value="{{ old('type_banner') }}" placeholder="{{ __('Type bannière ...') }}" required>
                                    <option>Séléctionnez</option>
                                    @foreach(config('banners.types') as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                    </select>
                                    @error("type_banner")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('File') }}</label>
                                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" value="{{ old('file') }}" placeholder="{{ __('File ...') }}" required>
                                    @error("file")
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