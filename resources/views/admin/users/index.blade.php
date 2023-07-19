<x-master-layout>
    @section('page-title', __('Liste des utilisateurs'))

    @section('page-header-title', __('Tous les utilisateurs'))

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Tous les utilisateurs') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.users.create') }}" class="btn btn-tool btn-primary btn-sm">
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
                                            <th>{{ __('Nom & Prénoms') }}</th>
                                            <th>{{ __('E-mail') }}</th>
                                            <th>{{ __('Téléphone') }}</th>
                                            <th>{{ __('Compte vérifié') }}</th>
                                            <th>{{ __('Crée le') }}</th>
                                            <th>{{ __('Mise à jour') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->full_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone_number }}</td>
                                                <td>{{ !is_null($user->email_verified_at) ? __('Oui') : __('Non') }}</td>
                                                <td>{{ $user->created_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
                                                <td>{{ $user->updated_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
                                                <td>
                                                    <a
                                                        href="javascript:;"
                                                        class="btn btn-info btn-xs"
                                                        data-toggle="modal" data-target="#user-details-{{ $user->id }}"
                                                    >
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="user-details-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">{{ $user->full_name }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <dl>
                                                                        <dt>{{ __('Nom & Prénoms') }}</dt>
                                                                        <dd>{{ $user->full_name }}</dd>
                                                                        
                                                                        <dt>{{ __('E-mail') }}</dt>
                                                                        <dd>{{ $user->email }}</dd>
                                                                        
                                                                        <dt>{{ __('Téléphone') }}</dt>
                                                                        <dd>{{ $user->phone_number }}</dd>

                                                                        <dt>{{ __('Compte vérifié') }}</dt>
                                                                        <dd>{{ !is_null($user->email_verified_at) ? __('Oui') : __('Non') }}</dd>

                                                                        <dt>{{ __('Créé le') }}</dt>
                                                                        <dd>{{ $user->created_at }}</dd>

                                                                        <dt>{{ __('Mise à jour') }}</dt>
                                                                        <dd>{{ $user->updated_at }}</dd>

                                                                        
                                                                    </dl>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Fermer') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a
                                                        href="{{ route('admin.users.edit', [
                                                        'user' => $user->id
                                                    ]) }}"
                                                        class="btn btn-primary btn-xs"
                                                    >
                                                        <i class="fa fa-pencil"></i>
                                                    </a>

                                                    <form action="{{ route('admin.users.delete', [
                                                        'user' => $user->id
                                                    ]) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger btn-xs"
                                                            onclick="return confirm(__('Êtes-vous sûr de vouloir supprimer cet utilisateur?'))"
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
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master-layout>
