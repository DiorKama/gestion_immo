<x-master-layout>
    @section('page-title', __('Liste des Bannières'))

    @section('page-header-title', __('Toutes les bannières'))

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Toutes les Bannières') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.banners.create') }}" class="btn btn-tool btn-primary btn-sm">
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
                                        <th>{{ __('Titre Bannière') }}</th>
                                        <th>{{ __('Type Bannière') }}</th>
                                        <th>{{ __('Statut') }}</th>
                                        <th>{{ __('Créé le') }}</th>
                                        <th>{{ __('Mis à jour le') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($banners as $banner)
                                            <tr>
                                                <td>{{ $banner->id }}</td>
                                                <td>
                                                    {{ $banner->title }}<br>
                                                    @if( $banner->url )
                                                        <small class="text-muted">{{ $banner->url }}</small>
                                                    @endif
                                                </td>
                                                <td>{{ config('banners.types.' . $banner->type_banner) }}</td>
                                                <td>
                                                    <span class="badge badge-{{ $banner->enabled ? 'success' : 'danger' }}">
                                                        {{ $banner->enabled ? __('Actif') : __('Inactif')}}
                                                    </span>
                                                </td>
                                                <td>{{ formatFrenchDate($banner->created_at) }}</td>
                                                <td>{{ formatFrenchDate($banner->updated_at) }}</td>
                                                <td class="text-nowrap">
                                                    <a
                                                        href="javascript:;"
                                                        class="btn btn-info btn-sm"
                                                        data-toggle="modal" data-target="#banner-details-{{ $banner->id }}"
                                                    >
                                                        <i class="fa fa-eye"></i>
                                                        {{ __('Détails') }}
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="banner-details-{{ $banner->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">{{ $banner->title }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <dl class="dl-horizontal">
                                                                        <dt>{{ __('Type de bannière') }}</dt>
                                                                        <dd>{{ config('banners.types.' . $banner->type_banner) }}</dd>

                                                                        @if( $banner->url )
                                                                            <dt>{{ __('URL') }}</dt>
                                                                            <dd>{{ $banner->url }}</dd>
                                                                        @endif

                                                                        <dt>{{ __('Statut') }}</dt>
                                                                        <dd>{{ $banner->enabled ? __('Oui') : __('Non') }}</dd>

                                                                        <dt>{{ __('Dernière mise à jour') }}</dt>
                                                                        <dd>{{ formatFrenchDate($banner->updated_at) }}</dd>
                                                                    </dl>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Fermer') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a
                                                        href="{{ route('admin.banners.edit', [
                                                        'banner' => $banner->id]) }}"
                                                        class="btn btn-primary btn-sm"
                                                    >
                                                        <i class="fa fa-pencil"></i>
                                                        {{ __('Modifier') }}
                                                    </a>

                                                    @if($banner->enabled)
                                                        <form action="{{ route('admin.banners.disable', [
                                                            'banner' => $banner->id
                                                        ]) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button
                                                                type="submit"
                                                                class="btn btn-secondary btn-sm"
                                                                onclick="return confirm('@lang('Êtes-vous sûr de vouloir désactiver cette bannière ?')')"
                                                            >
                                                                <i class="fa fa-times" aria-hidden="true"></i>
                                                                {{ __('Désactiver') }}
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('admin.banners.enable', [
                                                            'banner' => $banner->id
                                                        ]) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button
                                                                type="submit"
                                                                class="btn btn-success btn-sm"
                                                                onclick="return confirm('@lang('Êtes-vous sûr de vouloir activer cette bannière ?')')"
                                                            >
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                                {{ __('Activer') }}
                                                            </button>
                                                        </form>
                                                    @endif

                                                    <form action="{{ route('admin.banners.delete', [
                                                        'banner' => $banner->id
                                                    ]) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('@lang('Êtes-vous sûr de vouloir supprimer cette bannière?')')"
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
                                    {{ $banners->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-master-layout>
