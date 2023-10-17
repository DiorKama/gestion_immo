<x-master-layout>
    @section('page-title', __('Liste des régions'))

    @section('page-header-title', __('Toutes les régions'))

    @section('customFilters')
        <div class="col">
            <input type="text" class="form-control form-control-sm js-autocomplete" name="country_id" data-url="{{ route('admin.ajax.countries.autocomplete') }}" data-value="{{ Request::input('country_id_autocomplete') }}" data-parameter="q" placeholder="Pays ...">
        </div>
    @stop

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Toutes les régions') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.regions.create') }}" class="btn btn-tool btn-primary btn-sm">
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
                                            <th>{{ __('Pays') }}</th>
                                            <th>{{ __('Actif') }}</th>
                                            <th>{{ __('Créé le') }}</th>
                                            <th>{{ __('Mis à jour le') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($regions as $region)
                                            <tr>
                                                <td>{{ $region->id }}</td>
                                                <td>{{ $region->title }}</td>
                                                <td>{{ $region->country->title }}</td>
                                                <td>
                                                    <span class="badge badge-{{ $region->enabled ? 'success' : 'danger' }}">
                                                        {{ $region->enabled ? __('Actif') : __('Inactif')}}
                                                    </span>
                                                </td>
                                                <td>{{ formatFrenchDate($region->created_at) }}</td>
                                                <td>{{ formatFrenchDate($region->updated_at) }}</td>
                                                <td class="text-nowrap">
                                                    <a
                                                        href="javascript:;"
                                                        class="btn btn-info btn-sm"
                                                        data-toggle="modal" data-target="#region-details-{{ $region->id }}"
                                                    >
                                                        <i class="fa fa-eye"></i>
                                                        {{ __('Détails') }}
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="region-details-{{ $region->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">{{ $region->title }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <dl class="dl-horizontal">
                                                                        <dt>{{ __('Pays') }}</dt>
                                                                        <dd>{{ $region->country->title }}</dd>

                                                                        <dt>{{ __('Statut') }}</dt>
                                                                        <dd>{{ $region->enabled ? __('Oui') : __('Non') }}</dd>

                                                                        <dt>{{ __('Dernière mise à jour') }}</dt>
                                                                        <dd>{{ formatFrenchDate($region->updated_at) }}</dd>
                                                                    </dl>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Fermer') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a
                                                        href="{{ route('admin.regions.edit', [
                                                        'region' => $region->id
                                                    ]) }}"
                                                        class="btn btn-primary btn-sm"
                                                    >
                                                        <i class="fa fa-pencil"></i>
                                                        {{ __('Modifier') }}
                                                    </a>

                                                    @if($region->enabled)
                                                        <form action="{{ route('admin.regions.disable', [
                                                            'region' => $region->id
                                                        ]) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button
                                                                type="submit"
                                                                class="btn btn-danger btn-sm"
                                                                onclick="return confirm('@lang('Êtes-vous sûr de vouloir désactiver cette region ?')')"
                                                            >
                                                                <i class="fa fa-times" aria-hidden="true"></i>
                                                                {{ __('Désactiver') }}
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('admin.regions.enable', [
                                                            'region' => $region->id
                                                        ]) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button
                                                                type="submit"
                                                                class="btn btn-success btn-sm"
                                                                onclick="return confirm('@lang('Êtes-vous sûr de vouloir activer cette region ?')')"
                                                            >
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                                {{ __('Activer') }}
                                                            </button>
                                                        </form>
                                                    @endif

                                                    <form action="{{ route('admin.regions.delete', [
                                                        'region' => $region->id
                                                    ]) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('@lang('Êtes-vous sûr de vouloir supprimer cette region?')')"
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
                                    {{ $regions->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master-layout>
