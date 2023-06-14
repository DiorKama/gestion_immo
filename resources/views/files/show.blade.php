<x-master-layout>
<x-header-immo>
</x-header-immo>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container mt-5 pt-4">
        <h4>Détails Biens</h4>
        <div class="card col-md-6 ">
          <div class="card-body">
            <h5 class="card-text"><strong>Titre:  </strong>{{ $file->listings->title }}</h5>
            <p class="card-text"><strong>Images: </strong>@foreach (json_decode($file->path_url) as $url)
                                <img src="{{ $url }}" alt="Image" width="75">
                            @endforeach</p>
            <p class="card-text"><strong>Surface:  </strong>{{ $file->listings->surface }}m²</p>
            <p class="card-text"><strong>Nbre Pièces:  </strong>{{ $file->listings->rooms }}</p>
            <p class="card-text"><strong>Nbre Chambres:  </strong>{{ $file->listings->bedrooms }}</p>
            <p class="card-text"><strong>Niveau d'Etages:  </strong>{{ $file->listings->floor }}</p>
            <p class="card-text"><strong>Prix:  </strong>{{ $file->listings->price }}</p>
            <p class="card-text"><strong>Ville:  </strong>{{ $file->listings->city }}</p>
            <p class="card-text"><strong>Addresse:  </strong>{{ $file->listings->address }}</p>
            <p class="card-text"><strong>Description:  </strong>{{ $file->listings->description }}</p>
            <p class="card-text"><strong>Utilisateur:  </strong>{{ $file->listings->users->firstName . ' ' . $file->listings->users->lastName }}</p>
            <p class="card-text"><strong>Categorie:  </strong>{{ $file->listings->categories->libelle}}</p>
            <p class="card-text" rowspan="{{ count($file->listings->options) }}"><strong>Option:  </strong>@foreach ($file->listings->options as $index => $option)
                            {{ $option->libelle }}
                            @if ($index < count($file->listings->options) - 1)  
                            @endif
                        @endforeach</p> 
            <p class="card-text"><td><strong>Crée le:  </strong>{{ $file->created_at->locale('fr_FR')->isoFormat('LLLL') }}</td></p>
            <p class="card-text"><td><strong>Mise à jour:  </strong>{{ $file->updated_at->locale('fr_FR')->isoFormat('LLLL') }}</td></p>
         </div>
        </div>
    </div>
<x-body-immo>
</x-body-immo>
</x-master-layout>