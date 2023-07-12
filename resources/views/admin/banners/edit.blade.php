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

                                <div class="form-group">
                                    <label>{{ __('Nom du pays') }}</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $banner->title) }}" placeholder="{{ __('Pays ...') }}" required>
                                    @error("title")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Url') }}</label>     
                                    <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url', $banner->url) }}" placeholder="{{ __('Url ...') }}" required>
                                    @error("url")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Tye de Bannière') }}</label>
                                    <select  aria-label="Default select example" name="type_banner" class="form-control @error('type_banner') is-invalid @enderror"  placeholder="{{ __('Type bannière ...') }}" required>
                                    <option>Séléctionnez</option>
                                    @foreach(config('banners.types') as $key => $value)
                                    @if($key == $banner->type_banner)
                                    <option value="{{ $key }}" selected>{{ $value }}</option>
                                    @else
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endif
                                    @endforeach
                                    </select>
                                    @error("type_banner")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('File') }}</label>
                                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" value="{{ old('file', $banner->file) }}" placeholder="{{ __('File ...') }}" required>
                                    @php
                                    $file = $banner->files()->first();
                                    @endphp
                                    @if ($file)
                                        <img src="{{ asset($file->url) }}" height="30" alt="">
                                    @endif
                                    @error("file")
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
