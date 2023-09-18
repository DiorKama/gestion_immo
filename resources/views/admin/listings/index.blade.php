<x-master-layout>
    @section('page-title', __('Liste des biens immobiliers'))

    @section('page-header-title', __('Tous les biens immobiliers'))

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">{{ __('Toutes les Annonces') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.listings.create') }}" class="btn btn-tool btn-primary btn-sm">
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
                                            <th style="width: 1%">{{ __('#') }}</th>
                                            <th style="width: 22%">{{ __('Title') }}</th>
                                            <th style="width: 10%">{{ __('Catégorie') }}</th>
                                            <th style="width: 10%">{{ __('Adresse') }}</th>
                                            <th style="width: 10%">{{ __('Publié par') }}</th>
                                            <th style="width: 5%">{{ __('Statut') }}</th>
                                            <th style="width: 12%">{{ __('Prix') }}</th>
                                            <th style="width: 10%">{{ __('Mis à jour le') }}</th>
                                            <th style="width: 20%">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($listings as $listing)
                                            <tr>
                                                <td>{{ $listing->id }}</td>
                                                <td>
                                                    {{ $listing->title }}<br>
                                                    <small class="text-muted">{{ formatFrenchDate($listing->created_at) }}</small>
                                                    <div class="listing-card-extra__counters">
                                                        <div class="listing-card-extra__item">
                                                            <b class="badge badge-secondary badge--icon">
                                                                <i class="fa fa-eye"></i>
                                                                {{ $listing->views ?? 0 }}
                                                            </b>
                                                        </div>

                                                        <div class="listing-card-extra__item">
                                                            <b class="badge badge-secondary badge--icon">
                                                                <i class="fa fa-phone"></i>
                                                                {{ $listing->phone_number_views ?? 0 }}
                                                            </b>
                                                        </div>

                                                        <div class="listing-card-extra__item">
                                                            <b class="badge badge-secondary badge--icon">
                                                                <i class="fa fa-whatsapp"></i>
                                                                {{ $listing->whatsapp_views ?? 0 }}
                                                            </b>
                                                        </div>

                                                        <!--<div class="listing-card-extra__item">
                                                            <b class="badge badge-secondary badge--icon">
                                                                <i class="fa fa-envelope"></i>
                                                                {{ $listing->whatsapp_views ?? 0 }}
                                                            </b>
                                                        </div>-->
                                                    </div>
                                                </td>
                                                <td>{{ $listing->category->title }}</td>
                                                <td>{{ $listing->location->title }}</td>
                                                <td>{{ $listing->user->full_name }}</td>
                                                <td>
                                                    @if ( config('listings.statuses.active') == $listing->listing_status_id )
                                                        <span class="badge badge-success">
                                                            {{ $listing->status->title }}
                                                        </span>
                                                    @else
                                                        <span class="badge badge-danger">
                                                            {{ $listing->status->title ?? __('Inconnu') }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {!! listing_price($listing) !!}
                                                </td>
                                                <td class="text-muted">
                                                    {{ formatFrenchDate($listing->updated_at) }}
                                                </td>
                                                <td class="text-nowrap">
                                                    <a
                                                        href="javascript:;"
                                                        class="btn btn-info btn-xs"
                                                        data-toggle="modal" data-target="#location-details-{{ $listing->id }}">
                                                        <i class="fa fa-eye"></i>
                                                        {{ __('Détails') }}
                                                    </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="location-details-{{ $listing->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">{{ $listing->title }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <dl>
                                                                        <dt>{{ __('Category') }}</dt>
                                                                        <dd>{{ $listing->category->title }}</dd>

                                                                        <dt>{{ __('Localités') }}</dt>
                                                                        <dd>{{ $listing->location->title }}</dd>

                                                                        <dt>{{ __('Utilisateur') }}</dt>
                                                                        <dd>{{ $listing->user->full_name }}</dd>

                                                                        <dt>{{ __('Statut') }}</dt>
                                                                        <dd>{{ $listing->enabled ? 'Activé' : 'Désactivé'  }}</dd>

                                                                        <dt>{{ __('Description') }}</dt>
                                                                        <dd class="text-wrap">{{ $listing->description }}</dd>

                                                                        <dt>{{ __('Surface') }}</dt>
                                                                        <dd>{{ $listing->area }}m²</dd>

                                                                        <dt>{{ __('Nbre de Pièces') }}</dt>
                                                                        <dd>{{ $listing->rooms }}</dd>

                                                                        <dt>{{ __('Nbre de Chambres') }}</dt>
                                                                        <dd>{{ $listing->bedrooms }}</dd>

                                                                        <dt>{{ __('Nbre de Salle de bain') }}</dt>
                                                                        <dd>{{ $listing->bathrooms }}</dd>

                                                                        <dt>{{ __('Prix') }}</dt>
                                                                        <dd>{{ $listing->price }}</dd>

                                                                        <dt>{{ __('Vendu') }}</dt>
                                                                        <dd>{{ $listing->sold ? 'Oui' : 'Non'  }}</dd>

                                                                        <dt>{{ __('Mise En ligne') }}</dt>
                                                                        <dd>{{ $listing->first_online_at }}</dd>

                                                                        <dt>{{ __('Créé le') }}</dt>
                                                                        <dd>{{ $listing->created_at }}</dd>

                                                                        <dt>{{ __('Mise à jour') }}</dt>
                                                                        <dd>{{ $listing->updated_at }}</dd>
                                                                    </dl>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Fermer') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a
                                                        href="{{ route('admin.listings.edit', [
                                                        'listing' => $listing->id
                                                    ]) }}"
                                                        class="btn btn-primary btn-xs"
                                                    >
                                                        <i class="fa fa-pencil"></i>
                                                        {{ __('Modifier') }}
                                                    </a>

                                                    <form action="{{ route('admin.listings.delete', [
                                                        'listing' => $listing->id
                                                    ]) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger btn-xs"
                                                            onclick="return confirm(__('Êtes-vous sûr de vouloir supprimer cette localité?'))"
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
                                    {{ $listings->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master-layout>
