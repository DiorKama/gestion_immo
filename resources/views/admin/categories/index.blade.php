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
                                                <td>
                                                    <span class="badge badge-{{ $category->enabled ? 'success' : 'danger' }}">
                                                        {{ $category->enabled ? __('Actif') : __('Inactif')}}
                                                    </span>
                                                </td>
                                                <td>{{ Str::limit($category->description, 60) }}</td>
                                                <td>{{$category->sort_order}}</td>
                                                <td>{{$category->parent ? $category->parent->title : '' }}</td>
                                                <td>{{ formatFrenchDate($category->created_at) }}</td>
                                                <td>{{ formatFrenchDate($category->updated_at) }}</td>
                                                <td class="text-nowrap">
                                                    <a
                                                        href="{{ route('admin.categories.edit', [
                                                        'category' => $category->id
                                                    ]) }}"
                                                        class="btn btn-primary btn-sm"
                                                    >
                                                        <i class="fa fa-pencil"></i>
                                                        {{ __('Modifier') }}
                                                    </a>

                                                    <form action="{{ route('admin.categories.delete', [
                                                        'category' => $category->id
                                                    ]) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm(__('Êtes-vous sûr de vouloir supprimer cette catégorie?'))"
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
