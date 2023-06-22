<x-master-layout>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form  method="POST" class="bg-white" action=" {{ route('categories.update', ['category' => $category->id])  }}">
                            @csrf
                            @method('PUT')

                            <div class="card-header">
                                <h3 class="card-title">{{ __('Modifier :category', [
                                    'category' => $category->title
                                ]) }}</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger mt-5 py-2">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <x-input-label for="title" :value="__('Nom Categorie')" />
                                    <x-text-input id="title" name="title" type="text" class="form-control" :value="old('title', $category->title)" required autocomplete="title" />
                                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                                </div>

                                <div class="form-group">
                                    <x-input-label for="description" :value="__('Description')" />
                                    <textarea id="description" name="description" class="form-control" required autofocus autocomplete="description">{{ $category->description }}</textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                                </div>

                                <div class="form-group">
                                    <x-input-label for="sort_order" :value="__('Order')" />
                                    <x-text-input id="sort_order" name="sort_order" type="number" class="form-control" :value="old('sort_order', $category->sort_order)" required autocomplete="sort_order" />
                                    <x-input-error class="mt-2" :messages="$errors->get('sort_order')" />
                                </div>

                                <div class="form-group">
                                    <x-input-label for="parent_id" :value="__('Parent')" />
                                    <select class="form-control" id="parent_id" aria-label="Default select example" name="parent_id">
                                        @foreach($parents as $parent)
                                            <option value="{{ $parent->id }}" @if ($category->parent_id == $parent->id) selected="selected" @endif>{{ $parent->title}}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('parent_id')" />
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary">{{ __('Modifier') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master-layout>
