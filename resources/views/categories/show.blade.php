<x-master-layout>
<x-header-immo>
</x-header-immo>
<div class="container mt-5 pt-4">
        <h4>Détails de la catégorie</h4>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><strong>Nom:  </strong>{{ $categorie->libelle }}</h5>
            <p class="card-text"><strong>Description:  </strong>{{ $categorie->description }}</p>
            <p class="card-text text-primary"><strong class="text-dark">Statut:  </strong>{{ $categorie->active ? 'Activé' : 'Désactivé' }}</p>
            <p class="card-text text-primary"><strong class="text-dark">Parent:  </strong>{{ $categorie->parent_id }}</p>
            <p class="card-text"><td><strong>Crée le:  </strong>{{ $categorie->created_at->locale('fr_FR')->isoFormat('LLLL') }}</td></p>
            <p class="card-text"><td><strong>Mise à jour:  </strong>{{ $categorie->updated_at->locale('fr_FR')->isoFormat('LLLL') }}</td></p>
         </div>
        </div>
        <a href="{{ route('categorie.index') }}" class="btn btn-primary mt-3">Retour</a>
    </div>

<x-body-immo>
</x-body-immo>
</x-master-layout>