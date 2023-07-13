<x-master-layout>
    @section('page-title', __('Ajouter une bannière'))

    @section('page-header-title', __('Ajouter une bannière'))

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form  method="POST" action="{{ route('admin.banners.store') }}" autocomplete="on" enctype="multipart/form-data">
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
                                    <label>{{ __('Titre de la bannière') }}</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="{{ __('Titre ...') }}" required>
                                    @error("title")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Lien de redirection') }}</label>
                                    <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url') }}" placeholder="{{ __('Url ...') }}" required>
                                    @error("url")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Type de Bannière') }}</label>
                                    <select class="form-control @error('parent_id') is-invalid @enderror" name="type_banner">
                                        <option value="">{{ __('Séléctionnez ...') }}</option>
                                        @foreach(config('banners.types') as $key => $value)
                                            <option value="{{ $key }}" @selected(old('type_banner') == $key)>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error("type_banner")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Desktop') }}</label>
                                    <input type="file" name="banner_bg[image]" class="form-control @error('banner_bg[image]') is-invalid @enderror" required>
                                    @error("file")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Mobile') }}</label>
                                    <input type="file" name="mobile_banner_bg[image]" class="form-control @error('banner_bg[image]') is-invalid @enderror" required>
                                    @error("file")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary">{{ __('Ajouter') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master-layout>
