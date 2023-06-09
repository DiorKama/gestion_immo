<x-master-layout>
<x-header-immo>
</x-header-immo>
@section('header-styles')
   <!-- Inclusion de la feuille de styles CSS de jQuery Autocomplete -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.10/jquery.autocomplete.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select@latest/dist/css/tom-select.min.css" />
   @endsection
  <form  method="POST" class="bg-white" action="{{route('listing.store')}}" autocomplete="on">
    @csrf
    <!-- Ajoutez ici les champs de formulaire pour chaque valeur de configuration que vous souhaitez modifier -->
<div class="card card-primary mt-5 py-2">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <div class="card-header">
   <h3 class="card-title">Ajout des Biens</h3>
  </div>
<div class="card-body">
    <div class="row">
    <div class="col-md-4">
    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
        <label for="surface">Surface</label>
        <input type="number" class="form-control" id="surface" name="surface" >
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
        <label for="rooms">Nbre Pièces</label>
        <input type="number" class="form-control" id="rooms" name="rooms">
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-md-4">
    <div class="form-group">
        <label for="bedrooms">Nbre Chambres</label>
        <input type="number" class="form-control" id="bedrooms" name="bedrooms">
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
        <label for="floor">Etages</label>
        <input type="number" class="form-control" id="floor" name="floor">
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
        <label for="price">Prix</label>
        <input type="number" class="form-control" id="price" name="price">
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-md-4">
    <div class="form-group">
        <label for="city">Ville</label>
        <input type="text" class="form-control" id="city" name="city">
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
        <label for="address">Adresse</label>
        <input type="text" class="form-control" id="address" name="address">
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" class="form-control" id="description" name="description"></textarea>
    </div>
    </div>
</div>

    <div class="row">
    <div class="col-md-4">
    <div class="form-group">
        <label for="user">Utilisateur</label>
        <select id="user-search" name="user_id" class="form-control" required autocomplete="user"></select>
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
        <label for="option">Option</label>
        <select class="form-control tom-select" aria-label="Default select example" name="option_id[]" multiple data-remote-search="true">
            @foreach($options as $option)
                <option value="{{ $option->id }}">{{ $option->libelle }}</option> 
            @endforeach
        </select>
    </div>
</div>

    <div class="col-md-4">
    <div class="form-group">
        <label for="categorie">Categorie</label>
        <select class="form-control" aria-label="Default select example" name="categorie_id">
        <option>Séléctionnez</option>
        @foreach($categories as $categorie)
        <option value="{{ $categorie->id }}"> {{ $categorie->libelle}} </option>
        @endforeach
        </select>
    </div>
    </div>
    </div>
    <div class="row">
            <div class="col-12">
            <div class="form-group">
            <label for="sold">{{ __('Vendu') }}</label><br>
                <label>
                    <input type="checkbox" id="sold" name="sold" value="1">
                    Oui
                </label> 
            <!-- <x-input-error class="mt-2" :messages="$errors->get('sold')" /> -->
            </div>
            </div>
        </div>
    </div>
</div>
    <!-- ... autres champs de formulaire ... -->
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</div>
</form>

@section('footer-scripts') 
<!-- Inclusion de jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@latest/dist/js/tom-select.min.js"></script>

<!-- Inclusion de Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
<script src="/select2fr/select2.fr.js"></script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var selects = document.querySelectorAll(".tom-select");
        selects.forEach(function(select) {
            new TomSelect(select);
        });
    });
</script>
<script>
   $('#user-search').select2({
       ajax: {
       url: '/ajax/user/autocomplete',
       dataType: 'json',
       delay: 250,
      data: function(params) {
        return {
           term: params.term // term = valeur de l'entrée de recherche
         };
       },
       processResults: function(data, params) {
        //  console.log(data);
         return {
           results: $.map(data, function(item) {
            //  console.log(item);
             return {
               text: item.data + ' ' + item.value,
               id: item.data
             }
           })
         };
      },
       cache: true
     },
     language: 'fr',
     placeholder: 'Rechercher un utilisateur',
     minimumInputLength: 2,  
  });
  </script>
  @endsection
<x-body-immo>
</x-body-immo>
</x-master-layout>