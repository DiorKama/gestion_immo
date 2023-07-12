<x-master-layout>
    @section('page-title', __('Liste des Bannières'))

    @section('page-header-title', __('Tous les bannières'))

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
                            <div class="table-responsive py-5">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ __('#') }}</th>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __('Titre Bannière') }}</th>
                                            <th>{{ __('Url') }}</th>
                                            <th>{{ __('Type Bannière') }}</th>
                                            <th>{{ __('Statut') }}</th>
                                            <th>{{ __('Créé le') }}</th>
                                            <th>{{ __('Mis à jour le') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($banners as $banner)
                                            @php
                                                $file = $banner->files()->first();
                                            @endphp
                                            <tr>
                                                <td>{{ $banner->id }}</td>
                                                <td>
                                                    @if ($file)
                                                        <img src="{{ asset($file->url) }}" height="30" alt="">
                                                    @endif
                                                </td>
                                                <td>{{ $banner->title }}</td>
                                                <td>{{ $banner->url }}</td>
                                                <td>{{ config('banners.types.' . $banner->type_banner) }}</td>
                                                <td>{{ $banner->enabled ? __('Oui') : __('Non')}}</td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-nowrap">
                                                    <a
                                                        href="javascript:;"
                                                        class="btn btn-info btn-xs"
                                                        data-toggle="modal" data-target="#banner-details-{{ $banner->id }}"
                                                    >
                                                        <i class="fa fa-eye"></i>
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
                                                                    <dl>

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
                                                        class="btn btn-primary btn-xs"
                                                    >
                                                        <i class="fa fa-pencil"></i>
                                                    </a>

                                                    <form action="{{ route('admin.banners.delete', [
                                                        'banner' => $banner->id
                                                    ]) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger btn-xs"
                                                            onclick="return confirm(__('Êtes-vous sûr de vouloir supprimer cette banière?'))"
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