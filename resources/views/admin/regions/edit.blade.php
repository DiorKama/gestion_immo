<x-master-layout>
    @section('page-title', __('Modifier une région'))

    @section('page-header-title', __('Modifier :region', [
        'region' => $region->title
    ]))

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('regions.update', [
                            'region' => $region->id
                        ]) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="card-header">
                                <h3 class="card-title">{{ __('Modifier :region', [
                                    'region' => $region->title
                                ]) }}</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        Erreur survenue. Merci de réessayer !
                                    </div>
                                @endif

                                    <div class="form-group">
                                        <label>{{ __('Nom de la region') }}</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $region->title }}" placeholder="{{ __('Region ...') }}" required>
                                        @error("title")
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
