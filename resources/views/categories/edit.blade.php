<x-master-layout>
<x-header-immo>
</x-header-immo>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<form  method="POST" class="bg-white" action=" {{url('categorie/update/'.$categorie->id)}}">
            @csrf
            @method('PUT')          
<div class="card card-primary mt-5 py-2"> 
  <div class="card-header">
   <h3 class="card-title">Modification Catégories</h3>

  </div>
       <div class="card-body">
             <div class="form-group">

             <div class="row ">
             <div class="col-md-12">
             <div class="form-group">
             <x-input-label for="title" :value="__('Nom Categorie')" />
            <x-text-input id="title" name="title" type="text" class="form-control" :value="old('title', $categorie->title)" required autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
             </div>
            </div> 
           </div>

           <div class="row ">
             <div class="col-md-12">
             <div class="form-group">
             <x-input-label for="slug" :value="__('Slug')" />
            <x-text-input id="slug" name="slug" type="text" class="form-control" :value="old('slug', $categorie->slug)" required autocomplete="slug" />
            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
             </div>
            </div> 
           </div>

           <div class="row">
            <div class="col-md-12 mb-4">
            <div class="form-group">
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" name="description" class="form-control" required autofocus autocomplete="description">{{ $categorie->description }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>
            </div>
            </div>

           <div class="row ">
             <div class="col-md-12">
             <div class="form-group">
             <x-input-label for="properties" :value="__('properties')" />
            <x-text-input id="properties" name="properties" type="text" class="form-control" :value="old('properties', $categorie->properties)" />
            <x-input-error class="mt-2" :messages="$errors->get('properties')" />
             </div>
            </div> 
           </div>

           <div class="row ">
             <div class="col-md-12">
             <div class="form-group">
             <x-input-label for="sort_order" :value="__('Order')" />
            <x-text-input id="sort_order" name="sort_order" type="number" class="form-control" :value="old('sort_order', $categorie->sort_order)" required autocomplete="sort_order" />
            <x-input-error class="mt-2" :messages="$errors->get('sort_order')" />
             </div>
            </div> 
           </div>

           <div class="row ">
             <div class="col-md-12">
             <div class="form-group">
             <x-input-label for="parent_id" :value="__('Parent')" />
             <select class="form-control" id="parent_id" aria-label="Default select example" name="parent_id">
            @foreach($parents as $parent)
            <option value="{{ $parent->id }}" @if ($categorie->parent_id == $parent->id) selected="selected" @endif>{{ $parent->title}}</option>
            @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('parent_id')" />
             </div>
            </div> 
           </div>

            <div class="row">
            <div class="col-md-12 mb-4">
            <div class="form-group">
            <label for="active">{{ __('Enabled') }}</label><br>
                <label>
                    <input type="checkbox" id="enabled" name="enabled" value="1" {{ old('active', $categorie->enabled) ? 'checked' : '' }}>
                    Oui
                </label>  
            <x-input-error class="mt-2" :messages="$errors->get('active')" />
            </div>
            </div>
            </div>       
          </div>
      <div class="card-footer">
      <button class="btn btn-primary">{{ __('Modifier') }}</button>
        @if (session('status') === 'register-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400"
            >{{ __('Modifier') }}</p>
      @endif
   </div>
    </div>
    </div>
<x-body-immo>
</x-body-immo>
</x-master-layout>