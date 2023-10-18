<x-master-layout>
    @section('page-title', __('Liste des pays'))

    @section('page-header-title', __('Tous les pays'))

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Toutes les pays') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.countries.create') }}" class="btn btn-tool btn-primary btn-sm">
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
                                            <th>{{ __('Nom du pays') }}</th>
                                            <th>{{ __('Code du pays') }}</th>
                                            <th>{{ __('Indicatif du pays') }}</th>
                                            <th>{{ __('Statut') }}</th>
                                            <th>{{ __('Créé le') }}</th>
                                            <th>{{ __('Mis à jour le') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($countries as $country)
                                            <tr>
                                                <td>
                                                    {{ $country->id }}
                                                </td>
                                                <td>
                                                    {{ $country->title }}
                                                </td>
                                                <td>
                                                    {{ $country->iso }}
                                                </td>
                                                <td>
                                                    {{ $country->area_code }}
                                                </td>
                                                <td>
                                                    <span class="badge badge-{{ $country->enabled ? 'success' : 'danger' }}">
                                                        {{ $country->enabled ? __('Actif') : __('Inactif')}}
                                                    </span>
                                                </td>
                                                <td>
                                                    {{ formatFrenchDate($country->created_at) }}
                                                </td>
                                                <td>
                                                    {{ formatFrenchDate($country->updated_at) }}
                                                </td>
                                                <td class="text-nowrap">
                                                    <a
                                                        href="javascript:;"
                                                        class="btn btn-info btn-sm"
                                                        data-toggle="modal" data-target="#country-details-{{ $country->id }}"
                                                    >
                                                        <i class="fa fa-eye"></i>
                                                        {{ __('Détails') }}
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="country-details-{{ $country->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">{{ $country->title }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <dl class="dl-horizontal">
                                                                        <dt>{{ __('Code du pays') }}</dt>
                                                                        <dd>{{ $country->iso }}</dd>

                                                                        <dt>{{ __('Indicatif du pays') }}</dt>
                                                                        <dd>{{ $country->area_code }}</dd>

                                                                        <dt>{{ __('Statut') }}</dt>
                                                                        <dd>{{ $country->enabled ? __('Oui') : __('Non') }}</dd>

                                                                        <dt>{{ __('Dernière mise à jour') }}</dt>
                                                                        <dd>{{ formatFrenchDate($country->updated_at) }}</dd>
                                                                    </dl>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Fermer') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a
                                                        href="{{ route('admin.countries.edit', [
                                                        'country' => $country->id
                                                    ]) }}"
                                                        class="btn btn-primary btn-sm"
                                                    >
                                                        <i class="fa fa-pencil"></i>
                                                        {{ __('Modifier') }}
                                                    </a>

                                                    @if($country->enabled)
                                                        <form action="{{ route('admin.countries.disable', [
                                                            'country' => $country->id
                                                        ]) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button
                                                                type="submit"
                                                                class="btn btn-secondary btn-sm"
                                                                onclick="return confirm('@lang('Êtes-vous sûr de vouloir désactiver ce pays ?')')"
                                                            >
                                                                <i class="fa fa-times" aria-hidden="true"></i>
                                                                {{ __('Désactiver') }}
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('admin.countries.enable', [
                                                            'country' => $country->id
                                                        ]) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button
                                                                type="submit"
                                                                class="btn btn-success btn-sm"
                                                                onclick="return confirm('@lang('Êtes-vous sûr de vouloir activer ce pays ?')')"
                                                            >
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                                {{ __('Activer') }}
                                                            </button>
                                                        </form>
                                                    @endif

                                                    <form action="{{ route('admin.countries.delete', [
                                                        'country' => $country->id
                                                    ]) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('@lang('Êtes-vous sûr de vouloir supprimer ce pays ?')')"
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
                                    {{ $countries->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master-layout>
