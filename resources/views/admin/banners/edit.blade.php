<x-master-layout>
    @section('page-title', __('Modifier une bannière'))

    @section('page-header-title', __('Modifier :banner', [
        'banner' => $banner->title
    ]))

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('admin.banners.update', [
                            'banner' => $banner->id
                        ]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-header">
                                <h3 class="card-title">{{ __('Modifier :banner', [
                                    'banner' => $banner->title
                                ]) }}</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        Erreur survenue. Merci de réessayer !
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Titre de la bannière') }}</label>
                                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $banner->title) }}" placeholder="{{ __('Titre ...') }}" required>
                                            @error("title")
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>{{ __('Lien de redirection') }}</label>
                                            <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url', $banner->url) }}" placeholder="{{ __('Url ...') }}" required>
                                            @error("url")
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>{{ __('Type de Bannière') }}</label>
                                            <select class="form-control @error('parent_id') is-invalid @enderror" name="type_banner">
                                                <option value="">{{ __('Séléctionnez ...') }}</option>
                                                @foreach(config('banners.types') as $key => $value)
                                                    <option value="{{ $key }}" @selected(old('type_banner', $banner->type_banner) == $key)>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error("type_banner")
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        @if($banner->backgroundImage)
                                            <div class="form-group">
                                                <img class="w-100" src="{{ fullImageUrl('banner-thumb-1240w', $banner->backgroundImage->path) }}" alt="">
                                            </div>
                                        @endif

                                        @if($banner->mobileBackgroundImage)
                                            <div class="form-group">
                                                <img src="{{ fullImageUrl('banner-thumb-360w', $banner->mobileBackgroundImage->path) }}" alt="">
                                            </div>
                                        @endif
                                    </div>
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
