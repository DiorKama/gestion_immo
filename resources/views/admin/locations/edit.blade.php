<x-master-layout>
    @section('page-title', __('Modifier une localité'))

    @section('page-header-title', __('Modifier :location', [
        'location' => $location->title
    ]))

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('locations.update', [
                            'location' => $location->id
                        ]) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="card-header">
                                <h3 class="card-title">{{ __('Modifier :location', [
                                    'location' => $location->title
                                ]) }}</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        Erreur survenue. Merci de réessayer !
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>{{ __('Nom de la localité') }}</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $location->title }}" placeholder="{{ __('Localité ...') }}" required>
                                    @error("title")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Pays') }}</label>
                                    <select name="country_id" class="form-control @error('country_id') is-invalid @enderror">
                                        @foreach($_countries as $countryID => $countryTitle)
                                            <option value="{{ $countryID }} @selected(old('country_id') == $countryID)">{{ $countryTitle }}</option>
                                        @endforeach
                                    </select>
                                    @error("country_id")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Region') }}</label>
                                    <select name="region_id" class="form-control @error('region_id') is-invalid @enderror">
                                        @foreach($_regions as $regionID => $regionTitle)
                                            <option value="{{ $regionID }}" @selected(old('region_id') == $regionID)>{{ $regionTitle }}</option>
                                        @endforeach
                                    </select>
                                    @error("region_id")
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
