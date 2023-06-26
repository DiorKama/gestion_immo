<x-master-layout>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Toutes les pays') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('countries.create') }}" class="btn btn-tool btn-primary btn-sm">
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
                                            <th>{{ __('Nom du pays') }}</th>
                                            <th>{{ __('Code du pays') }}</th>
                                            <th>{{ __('Indicatif du pays') }}</th>
                                            <th>{{ __('Créé le') }}</th>
                                            <th>{{ __('Mis à jour le') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($countries as $country)
                                            <tr>
                                                <td>{{ $country->id }}</td>
                                                <td>{{ $country->title }}</td>
                                                <td>{{ $country->iso }}</td>
                                                <td>{{ $country->area_code }}</td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-nowrap">
                                                    <a
                                                        href="javascript:;"
                                                        class="btn btn-info btn-xs"
                                                        data-toggle="modal" data-target="#country-details-{{ $country->id }}"
                                                    >
                                                        <i class="fa fa-eye"></i>
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
                                                        href="{{ route('countries.edit', [
                                                        'country' => $country->id
                                                    ]) }}"
                                                        class="btn btn-primary btn-xs"
                                                    >
                                                        <i class="fa fa-pencil"></i>
                                                    </a>

                                                    <form action="{{ route('countries.delete', [
                                                        'country' => $country->id
                                                    ]) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger btn-xs"
                                                            onclick="return confirm(__('Êtes-vous sûr de vouloir supprimer cette region?'))"
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
