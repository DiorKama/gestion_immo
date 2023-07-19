<x-master-layout>
    @section('page-title', __('Liste des catégories'))

    @section('page-header-title', __('Toutes les catégories'))

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">{{ __('Toutes les catégories') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-tool btn-primary btn-sm">
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
                                            <th>{{ __('ID') }}</th>
                                            <th>{{ __('Nom') }}</th>
                                            <th>{{ __('Actif') }}</th>
                                            <th>{{ __('Description') }}</th>
                                            <th>{{ __('Ordre') }}</th>
                                            <th>{{ __('Parent') }}</th>
                                            <th>{{ __('Créé le') }}</th>
                                            <th>{{ __('Updated') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->title}}</td>
                                                <td>{{ $category->enabled ? 'Oui' : 'Non' }}</td>
                                                <td>{{ Str::limit($category->description, 60) }}</td>
                                                <td>{{$category->sort_order}}</td>
                                                <td>{{$category->parent ? $category->parent->title : '' }}</td>
                                                <td>{{ $category->created_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
                                                <td>{{ $category->updated_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
                                                <!-- <td class="text-nowrap">
                                                    
                                                    <button type="button" class="btn btn-primary"><a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}" class="text-white" style="text-decoration: none;"><i class="fa fa-pencil" aria-hidden="true"></i></a></button>
                                                    <button type="button" class="btn btn-danger" onclick="if(confirm('Êtes-vous sûr de vouloir supprimer ce catégorie?')) { window.location.href = '{{ route('admin.categories.delete', ['category' => $category->id])  }}' }">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button> -->
                                                    <td class="text-nowrap">
                                                    <a
                                                        href="javascript:;"
                                                        class="btn btn-info btn-xs"
                                                        data-toggle="modal" data-target="#category-details-{{ $category->id }}"
                                                    >
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="category-details-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">{{ $category->title }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <dl>

                                                                       <dt>{{ __('Nom Category') }}</dt>
                                                                        <dd>{{ $category->title }}</dd>

                                                                        <dt>{{ __('Actif') }}</dt>
                                                                        <dd>{{ $category->enabled ? 'Oui' : 'Non' }}</dd>

                                                                        <dt>{{ __('Description') }}</dt>
                                                                        <dd class="text-wrap">{{ $category->description }}</dd>

                                                                        <dt>{{ __('Ordre') }}</dt>
                                                                        <dd>{{ $category->sort_order }}</dd>

                                                                        <dt>{{ __('Parent') }}</dt>
                                                                        <dd>{{ $category->parent ? $category->parent->title : '' }}</dd>

                                                                        <dt>{{ __('Créé le') }}</dt>
                                                                        <dd>{{ $category->created_at }}</dd>

                                                                        <dt>{{ __('Mise à jour') }}</dt>
                                                                        <dd>{{ $category->updated_at }}</dd>

                                                                    </dl>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Fermer') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a
                                                        href="{{ route('admin.categories.edit', [
                                                        'category' => $category->id
                                                    ]) }}"
                                                        class="btn btn-primary btn-xs"
                                                    >
                                                        <i class="fa fa-pencil"></i>
                                                    </a>

                                                    <form action="{{ route('admin.categories.delete', [
                                                        'category' => $category->id
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
                                    {{ $categories->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master-layout>
