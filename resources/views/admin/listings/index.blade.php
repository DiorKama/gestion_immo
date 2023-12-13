@inject('productModel','App\Models\Product')

<x-master-layout>
    @section('page-title', __('Liste des biens immobiliers'))

    @section('page-header-title', __('Tous les biens immobiliers'))

    @section('customFilters')
        <div class="col">
            <input type="text" class="form-control form-control-sm js-autocomplete" name="category_id" data-url="{{ route('admin.ajax.categories.autocomplete') }}" data-value="{{ Request::input('category_id_autocomplete') }}" data-parameter="q" placeholder="Catégorie ...">
        </div>

        <div class="col">
            <input type="text" class="form-control form-control-sm js-autocomplete" name="user_id" data-url="{{ route('admin.ajax.users.autocomplete') }}" data-value="{{ Request::input('user_id_autocomplete') }}" data-parameter="q" placeholder="Utilisateur ...">
        </div>
    @stop

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

                                <a href="{{ route(
                                    'admin.listings.download',
                                    request()->query()
                                ) }}" class="btn btn-tool btn-primary btn-sm">
                                    <i class="fa-solid fas fa-download"></i>
                                    {{ __('Télécharger') }}
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
                                                        <div class="listing-card-extra__item d-inline-block">
                                                            <b class="badge badge-secondary badge--icon">
                                                                <i class="fa fa-eye"></i>
                                                                {{ $listing->views ?? 0 }}
                                                            </b>
                                                        </div>

                                                        <div class="listing-card-extra__item d-inline-block">
                                                            <b class="badge badge-secondary badge--icon">
                                                                <i class="fa fa-phone"></i>
                                                                {{ $listing->phone_number_views ?? 0 }}
                                                            </b>
                                                        </div>

                                                        <div class="listing-card-extra__item d-inline-block">
                                                            <b class="badge badge-secondary badge--icon">
                                                                <i class="fa fa-whatsapp"></i>
                                                                {{ $listing->whatsapp_views ?? 0 }}
                                                            </b>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $listing->category->title }}</td>
                                                <td>{{ $listing->location->title }}</td>
                                                <td>{{ $listing->user->full_name }}</td>
                                                <td>
                                                    @if ( config('listings.statuses.active') == $listing->listing_status_id )
                                                        <span class="badge badge-success">
                                                            {{ $listing->listingStatus->title }}
                                                        </span>
                                                    @else
                                                        <span class="badge badge-danger">
                                                            {{ $listing->listingStatus->title ?? __('Inconnu') }}
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
                                                        class="btn btn-info btn-sm"
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
                                                                    <dl class="dl-horizontal">
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
                                                                    @if ( config('listings.statuses.active') == $listing->listing_status_id )
                                                                        <a
                                                                            class="btn btn-primary"
                                                                            href="{{ route('listings.show', [
                                                                                'slug' => $listing->slug,
                                                                                'id' => $listing->id,
                                                                            ]) }}"
                                                                            target="_blank"
                                                                        >
                                                                            {{ __('Voir le bien') }}
                                                                        </a>
                                                                    @endif
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Fermer') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a
                                                        href="{{ route('admin.listings.edit', [
                                                        'listing' => $listing->id
                                                    ]) }}"
                                                        class="btn btn-primary btn-sm"
                                                    >
                                                        <i class="fa fa-pencil"></i>
                                                        {{ __('Modifier') }}
                                                    </a>

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-warning btn-sm">{{ __('Actions') }}</button>
                                                        <button type="button" class="btn btn-warning btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                            @if( $listing->is_enabled )
                                                                <form action="{{ route('admin.listings.disable', [
                                                                    'listing' => $listing->id
                                                                ]) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    <button
                                                                        type="submit"
                                                                        class="dropdown-item"
                                                                        onclick="return confirm('@lang('Êtes-vous sûr de vouloir désactiver ce bien ?')')"
                                                                    >
                                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                                        {{ __('Désactiver') }}
                                                                    </button>
                                                                </form>
                                                            @else
                                                                <form action="{{ route('admin.listings.enable', [
                                                                    'listing' => $listing->id
                                                                ]) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    <button
                                                                        type="submit"
                                                                        class="dropdown-item"
                                                                        onclick="return confirm('@lang('Êtes-vous sûr de vouloir activer ce bien ?')')"
                                                                    >
                                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                                        {{ __('Activer') }}
                                                                    </button>
                                                                </form>
                                                            @endif

                                                            @if( $listing->is_enabled )
                                                                @if( $listing->has_active_products )
                                                                    <form class="unpromote-listing-form d-inline" action="{{ route('admin.ajax.featured-listings.delete', [
                                                                        'featuredListing' => $listing->runningFeaturedEntities(
                $productModel::PRODUCT_SLUGS
            )->first()->id
                                                                    ]) }}" method="POST">
                                                                        @csrf
                                                                        <button
                                                                            type="submit"
                                                                            class="dropdown-item unpromote-listing-btn"
                                                                            onclick="return confirm('@lang('Êtes-vous sûr de vouloir retirer ce bien des bons plans ?')')"
                                                                        >
                                                                            <i class="fa fa-minus-square" aria-hidden="true"></i>
                                                                            {{ __('Retirer des bons plans') }}
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    <form class="promote-listing-form d-inline" action="{{ route('admin.ajax.featured-listings.create', [
                                                                        'listing' => $listing->id
                                                                    ]) }}" method="POST">
                                                                        @csrf
                                                                        <button
                                                                            type="submit"
                                                                            class="dropdown-item promote-listing-btn"
                                                                        >
                                                                            <i class="fas fa-plus-square"></i>
                                                                            {{ __('Ajouter aux bons plans') }}
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            @endif

                                                            <form action="{{ route('admin.listings.delete', [
                                                                'listing' => $listing->id
                                                            ]) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button
                                                                    type="submit"
                                                                    class="dropdown-item"
                                                                    onclick="return confirm('@lang('Êtes-vous sûr de vouloir supprimer ce bien ?')')"
                                                                >
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                    {{ __('Supprimer') }}
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
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

    @include('admin.listings.partials._featured._modal')

    @section('footer-scripts')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script type="text/javascript">
            (function($) {
                var $modal = $('.featured-listing-modal');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $modal.on('hidden.bs.modal', function (event) {
                    $(this).find('.modal-body').empty();
                });

                $('.promote-listing-form').on('submit', function (e) {
                    e.preventDefault();
                    var $form = $(this);

                    $.post($form.attr('action'), {}, function(response) {
                        $modal
                            .find('.modal-body')
                            .html(response.form);

                        $modal
                            .modal({
                                keyboard: false,
                                backdrop: 'static'
                            }, 'show');
                    }, 'json');
                });

                $modal
                    .on('submit', '.form-featured-listing-store', function (e) {
                        e.preventDefault();
                        var $form = $(this);

                        $.ajax({
                            url: $form.attr('action'),
                            type: 'POST',
                            dataType: 'JSON',
                            data: $(this).serialize(),
                        }).done(function(response) {
                            $modal
                                .modal('hide')
                                .on('hidden.bs.modal', function () {
                                    if ( response.result ) {
                                        swal({
                                            title: "{{ __('Félicitations !') }}",
                                            text: "{{ __('Votre bien a bein été ajouté aux bons plans !') }}",
                                            icon: "success",
                                            button: "{{ __('OK') }}",
                                            timer: 1500
                                        });
                                    } else {
                                        swal({
                                            title: "{{ __('Oops !') }}",
                                            text: "{{ __('Erreur survenue. merci de réessayer.') }}",
                                            icon: "error",
                                            timer: 1500
                                        });
                                    }
                                });

                            window.setTimeout(function() {
                                window.location.reload(true);
                            }, 3000);

                        }).fail(function(jqXHR, textStatus) {
                            console.log(jqXHR);
                        });
                    });

                $('.unpromote-listing-form').on('submit', function (e) {
                    e.preventDefault();
                    var $form = $(this);

                    $.post($form.attr('action'), {}, function(response) {
                        console.log(response);

                        if ( response.result ) {
                            swal({
                                title: "{{ __('Félicitations !') }}",
                                text: "{{ __('Votre bien a bein été retiré des bons plans avec succès !') }}",
                                icon: "success",
                                button: "{{ __('OK') }}",
                                timer: 1500
                            });
                        } else {
                            swal({
                                title: "{{ __('Oops !') }}",
                                text: "{{ __('Erreur survenue. merci de réessayer.') }}",
                                icon: "error",
                                timer: 1500
                            });
                        }

                        window.setTimeout(function() {
                            window.location.reload(true);
                        }, 3000);
                    }, 'json');
                });
            })(jQuery);
        </script>
    @endsection
</x-master-layout>
