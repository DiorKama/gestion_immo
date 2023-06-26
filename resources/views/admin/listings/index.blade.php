<x-master-layout>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">{{ __('Toutes les Annonces') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('listings.create') }}" class="btn btn-tool btn-primary btn-sm">
                                    <i class="fas fa-plus"></i>
                                    {{ __('Ajouter') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive py-5">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ __('#') }}</th>
                                            <th>{{ __('Nom') }}</th>
                                            <th>{{ __('Category') }}</th>
                                            <th>{{ __('Localités') }}</th>
                                            <th>{{ __('Utilisateurs') }}</th>
                                            <th>{{ __('Actif') }}</th>
                                            <th>{{ __('Description') }}</th>
                                            <th>{{ __('Surface') }}</th>
                                            <th>{{ __('Nbre Pièces') }}</th>
                                            <th>{{ __('Nbre Chambres') }}</th>
                                            <th>{{ __('Nbre Salle de bain') }}</th>
                                            <th>{{ __('Prix') }}</th>
                                            <th>{{ __('Vendu') }}</th>
                                            <th>{{ __('En Ligne') }}</th>
                                            <th>{{ __('Créé le') }}</th>
                                            <th>{{ __('Mis à jour le') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($listings as $listing)
                                            <tr>
                                                <td>{{ $listing->id }}</td>
                                                <td>{{ $listing->title }}</td>
                                                <td>{{ $listing->category->title }}</td>
                                                <td>{{ $listing->location->title }}</td>
                                                <td>{{ $listing->user->full_name }}</td>
                                                <td>{{ $listing->enabled ? __('Oui') : __('Non')}}</td>
                                                <td>{{ Str::limit($listing->description, 20, '...') }}</td>
                                                <td>{{ $listing->area }}m²</td>
                                                <td>{{ $listing->rooms }}</td>
                                                <td>{{ $listing->bedrooms }}</td>
                                                <td>{{ $listing->bathrooms }}</td>
                                                <td>{{ $listing->price }}</td>
                                                <td>{{ $listing->sold ? __('Oui') : __('Non') }}</td>
                                                <td>{{ $listing->first_online_at }}</td>
                                                <td>{{ $listing->created_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
                                                <td>{{ $listing->updated_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
                                                <td class="text-nowrap">
                                                    <a
                                                        href="javascript:;"
                                                        class="btn btn-info btn-xs"
                                                        data-toggle="modal" data-target="#location-details-{{ $listing->id }}">
                                                        <i class="fa fa-eye"></i>
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
                                                        href="{{ route('listings.edit', [
                                                        'listing' => $listing->id
                                                    ]) }}"
                                                        class="btn btn-primary btn-xs"
                                                    >
                                                        <i class="fa fa-pencil"></i>
                                                    </a>

                                                    <form action="{{ route('listings.delete', [
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