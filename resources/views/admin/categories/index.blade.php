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
                                                <td>{{ formatFrenchDate($category->created_at) }}</td>
                                                <td>{{ formatFrenchDate($category->updated_at) }}</td>
                                                <td class="text-nowrap">
                                                    <button type="button" class="btn btn-primary"><a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}" class="text-white" style="text-decoration: none;"><i class="fa fa-pencil" aria-hidden="true"></i></a></button>
                                                    <button type="button" class="btn btn-danger" onclick="if(confirm('Êtes-vous sûr de vouloir supprimer ce catégorie?')) { window.location.href = '{{ route('admin.categories.delete', ['category' => $category->id])  }}' }">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
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
