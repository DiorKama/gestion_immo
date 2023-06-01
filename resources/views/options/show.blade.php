<x-master-layout>
<x-header-immo>
</x-header-immo>
<div class="container mt-5 pt-4">
        <h4>Détails Option</h4>
        <div class="card col-md-6 ">
          <div class="card-body">
            <h5 class="card-title"><strong>Nom:  </strong>{{ $option->libelle }}</h5>
            <p class="card-text"><td><strong>Crée le:  </strong>{{ $option->created_at->locale('fr_FR')->isoFormat('LLLL') }}</td></p>
            <p class="card-text"><td><strong>Mise à jour:  </strong>{{ $option->updated_at->locale('fr_FR')->isoFormat('LLLL') }}</td></p>
         </div>
        </div>
        <a href="{{ route('option.index') }}" class="btn btn-primary mt-3">Retour</a>
    </div>

<x-body-immo>
</x-body-immo>
</x-master-layout>