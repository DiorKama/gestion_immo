<x-master-layout>
<x-header-immo>
</x-header-immo>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<form  method="POST" class="bg-white" action="{{route('option.store')}}" autocomplete="on">
    @csrf         
  <div class="card card-primary mt-5 py-2">
  <div class="card-header">
   <h3 class="card-title">Ajout des Options</h3>
  </div>
       <div class="card-body">
            <div class="row">
             <div class="col-md-12">
             <div class="form-group">
                <x-input-label for="libelle" :value="__('Nom Option')" />
                <x-text-input id="libelle" name="libelle" type="text" class="form-control" required autocomplete="libelle" />
                <x-input-error class="mt-2" :messages="$errors->get('libelle')" />
                </div>
                </div>
                </div>               
</div>
<div class="card-footer">
        <button class="btn btn-primary">{{ __('Enregistrer') }}</button>

        <!-- @if (session('status') === 'register-updated') -->
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400"
            >{{ __('Enregistrer') }}</p>
        <!-- @endif -->
    </div>
    </div>
<x-body-immo>
</x-body-immo>
</x-master-layout>