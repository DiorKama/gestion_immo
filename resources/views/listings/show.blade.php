<x-master-layout>
<x-header-immo>
</x-header-immo>
<div class="container mt-5 pt-4">
        <h4>Détails Bien Immo</h4>
        <div class="card col-md-6 ">
          <div class="card-body">
            <h5 class="card-text"><strong>Titre:  </strong>{{ $listing->title }}</h5>
            <p class="card-text"><strong>Surface:  </strong>{{ $listing->surface }}m²</p>
            <p class="card-text"><strong>Nbre Pièces:  </strong>{{ $listing->rooms }}</p>
            <p class="card-text"><strong>Nbre Chambres:  </strong>{{ $listing->bedrooms }}</p>
            <p class="card-text"><strong>Niveau d'Etages:  </strong>{{ $listing->floor }}</p>
            <p class="card-text"><strong>Prix:  </strong>{{ $listing->price }}</p>
            <p class="card-text"><strong>Ville:  </strong>{{ $listing->city }}</p>
            <p class="card-text"><strong>Addresse:  </strong>{{ $listing->address }}</p>
            <p class="card-text"><strong>Description:  </strong>{{ $listing->description }}</p>
            <p class="card-text"><strong>Utilisateur:  </strong>{{ $listing->users->firstName . ' ' . $listing->users->lastName }}</p>
            <p class="card-text"><strong>Categorie:  </strong>{{ $listing->categories->libelle}}</p>
            <p class="card-text" rowspan="{{ count($listing->options) }}"><strong>Option:  </strong>@foreach ($listing->options as $index => $option)
                            {{ $option->libelle }}
                            @if ($index < count($listing->options) - 1)  
                            @endif
                        @endforeach</p>
            <p class="card-text"><strong>Vendu:  </strong>{{ $listing->sold ? 'Oui' : 'Non' }}</p>
            <p class="card-text"><td><strong>Crée le:  </strong>{{ $listing->created_at->locale('fr_FR')->isoFormat('LLLL') }}</td></p>
            <p class="card-text"><td><strong>Mise à jour:  </strong>{{ $listing->updated_at->locale('fr_FR')->isoFormat('LLLL') }}</td></p>
         </div>
        </div>
    </div>

<x-body-immo>
</x-body-immo>
</x-master-layout>