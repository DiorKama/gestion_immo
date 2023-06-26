<x-master-layout>
    @section('page-title', __('Paramètres du site'))

    @section('page-header-title', __('Paramètres du site'))

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Paramètres du site') }}</h3>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive py-5">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th >{{ __('Nom du site') }}</th>
                                            <th>{{ __('À propos') }}</th>
                                            <th>{{ __('Adresse') }}</th>
                                            <th>{{ __('Crée le') }}</th>
                                            <th>{{ __('Mis à jour') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{ $setting->name }}</td>
                                        <td>{{ Str::limit($setting->about, 20, '...') }}</td>
                                        <td>{{ $setting->address }}</td>
                                        <td>{{ $setting->created_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
                                        <td>{{ $setting->updated_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
                                        <td>
                                            <a
                                                href=""
                                                class="btn btn-info btn-xs"
                                                data-toggle="modal" data-target="#setting-details"
                                            >
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="setting-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{ $setting->name }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <dl>
                                                                <dt>{{ __('À propos') }}</dt>
                                                                <dd>{{ $setting->about }}</dd>

                                                                <dt>{{ __('Adresse') }}</dt>
                                                                <dd>{{ $setting->address }}</dd>

                                                                <dt>{{ __('N° Mobile') }}</dt>
                                                                <dd>{{ $setting->mobile_number }}</dd>

                                                                <dt>{{ __('N° Fixe') }}</dt>
                                                                <dd>{{ $setting->phone_number }}</dd>

                                                                <dt>{{ __('E-mail') }}</dt>
                                                                <dd>{{ $setting->email }}</dd>
                                                            </dl>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Fermer') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <a
                                                href="{{ route('settings.edit', [
                                                    'setting' => $setting->id
                                                ]) }}"
                                                class="btn btn-primary btn-xs"
                                            >
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master-layout>
