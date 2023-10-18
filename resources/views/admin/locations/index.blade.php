<x-master-layout>
    @section('page-title', __('Liste des localités'))

    @section('page-header-title', __('Toutes les localités'))

    @section('customFilters')
        <div class="col">
            <input type="text" class="form-control form-control-sm js-autocomplete" name="region_id" data-url="{{ route('admin.ajax.regions.autocomplete') }}" data-value="{{ Request::input('region_id_autocomplete') }}" data-parameter="q" placeholder="Région ...">
        </div>

        <div class="col">
            <input type="text" class="form-control form-control-sm js-autocomplete" name="country_id" data-url="{{ route('admin.ajax.countries.autocomplete') }}" data-value="{{ Request::input('country_id_autocomplete') }}" data-parameter="q" placeholder="Pays ...">
        </div>
    @stop

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">{{ __('Toutes les localités') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.locations.create') }}" class="btn btn-tool btn-primary btn-sm">
                                    <i class="fas fa-plus"></i>
                                    {{ __('Ajouter') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            @include('layouts.partials.search_filter')

                            <div class="table-responsive py-5">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ __('#') }}</th>
                                            <th>{{ __('Nom') }}</th>
                                            <th>{{ __('Region') }}</th>
                                            <th>{{ __('Pays') }}</th>
                                            <th>{{ __('Statut') }}</th>
                                            <th>{{ __('Créé le') }}</th>
                                            <th>{{ __('Mis à jour le') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($locations as $location)
                                            <tr>
                                                <td>{{ $location->id }}</td>
                                                <td>{{ $location->title }}</td>
                                                <td>{{ $location->region->title }}</td>
                                                <td>{{ $location->country->title }}</td>
                                                <td>
                                                    <span class="badge badge-{{ $location->enabled ? 'success' : 'danger' }}">
                                                        {{ $location->enabled ? __('Actif') : __('Inactif')}}
                                                    </span>
                                                </td>
                                                <td>{{ formatFrenchDate($location->created_at) }}</td>
                                                <td>{{ formatFrenchDate($location->updated_at) }}</td>
                                                <td class="text-nowrap">
                                                    <a
                                                        href="javascript:;"
                                                        class="btn btn-info btn-sm"
                                                        data-toggle="modal" data-target="#location-details-{{ $location->id }}"
                                                    >
                                                        <i class="fa fa-eye"></i>
                                                        {{ __('Détails') }}
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="location-details-{{ $location->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">{{ $location->title }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <dl class="dl-horizontal">
                                                                        <dt>{{ __('Pays') }}</dt>
                                                                        <dd>{{ $location->country->title }}</dd>

                                                                        <dt>{{ __('Region') }}</dt>
                                                                        <dd>{{ $location->region->title }}</dd>

                                                                        <dt>{{ __('Statut') }}</dt>
                                                                        <dd>{{ $location->enabled ? __('Oui') : __('Non') }}</dd>

                                                                        <dt>{{ __('Dernière mise à jour') }}</dt>
                                                                        <dd>{{ formatFrenchDate($location->updated_at) }}</dd>
                                                                    </dl>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Fermer') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a
                                                        href="{{ route('admin.locations.edit', [
                                                        'location' => $location->id
                                                    ]) }}"
                                                        class="btn btn-primary btn-sm"
                                                    >
                                                        <i class="fa fa-pencil"></i>
                                                        {{ __('Modifier') }}
                                                    </a>

                                                    @if($location->enabled)
                                                        <form action="{{ route('admin.locations.disable', [
                                                            'location' => $location->id
                                                        ]) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button
                                                                type="submit"
                                                                class="btn btn-secondary btn-sm"
                                                                onclick="return confirm('@lang('Êtes-vous sûr de vouloir désactiver cette localité ?')')"
                                                            >
                                                                <i class="fa fa-times" aria-hidden="true"></i>
                                                                {{ __('Désactiver') }}
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('admin.locations.enable', [
                                                            'location' => $location->id
                                                        ]) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button
                                                                type="submit"
                                                                class="btn btn-success btn-sm"
                                                                onclick="return confirm('@lang('Êtes-vous sûr de vouloir activer cette localité ?')')"
                                                            >
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                                {{ __('Activer') }}
                                                            </button>
                                                        </form>
                                                    @endif

                                                    <form action="{{ route('admin.locations.delete', [
                                                        'location' => $location->id
                                                    ]) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('@lang('Êtes-vous sûr de vouloir supprimer cette localité?')')"
                                                        >
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                            {{ __('Supprimer') }}
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="pagination">
                                    {{ $locations->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master-layout>
