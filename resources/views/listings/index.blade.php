<x-master-layout>
<x-header-immo>
</x-header-immo>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="">

<div class="container-xl mt-4">
	<div class="table-responsive py-5">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="ml-3">
						<h3 class="">Liste <b>des Biens</b></h3>
					</div>
				</div>
			</div>
            <table class="table table-striped table-hover"> 
				<thead>
					<tr>
                    <th>{{ __('ID') }}</th>
                      <th>{{ __('Titre') }}</th>
                      <th>{{ __('Surface') }}</th>
                      <th>{{ __(' Nbre Pièces') }}</th>
                      <th>{{ __('Nbre Chambres') }}</th>
                      <th>{{ __('Niveau Etages') }}</th>
                      <th>{{ __('Prix') }}</th>
                      <th>{{ __('Ville') }}</th>
                      <th>{{ __('Adresse') }}</th>
                      <th>{{ __('Description') }}</th>
                      <th>{{ __('Utilisateur') }}</th>
                      <th>{{ __('Catégories') }}</th>
                      <th>{{ __('Options') }}</th>
                      <th>{{ __('Vendu') }}</th>
                      <th>{{ __('Créé le') }}</th>
                      <th>{{ __('Updated') }}</th>
                      <th>{{ __('Actions') }}</th>
					</tr>
				</thead>
				<tbody>
                    @foreach($listings as $listing)
					<tr>	
                        <td><a href="{{ route('listing.show', ['listing' => $listing->id]) }}" class="text-decoration-none">
                            {{$listing->id}}
                         </a></td>
                        <td>{{$listing->title}}</td>
                        <td>{{ $listing->surface}}m²</td>
                        <td>{{ $listing->rooms}}</td>
                        <td>{{ $listing->bedrooms}}</td>
                        <td>{{ $listing->floor}}</td>
                        <td>{{ number_format($listing->price, thousands_separator:'')}}</td>
                        <td>{{ $listing->city}}</td>
                        <td>{{ $listing->address}}</td>
                        <td>{{ $listing->description}}</td>
                        <td>{{ $listing->users->firstName . ' ' . $listing->users->lastName }}</td>
                        <td>{{ $listing->categories->libelle}}</td>
                        <td rowspan="{{ count($listing->options) }}">
                        @foreach ($listing->options as $index => $option)
                            {{ $option->libelle }}
                            @if ($index < count($listing->options) - 1)
                                <br>
                            @endif
                        @endforeach
                    </td>
                        <td>{{ $listing->sold ? 'Oui' : 'Non' }}</td>
                        <td>{{ $listing->created_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
                        <td>{{ $listing->updated_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
						<td class="text-nowrap">
                        <button type="button" class="btn btn-primary"><a href="{{ route('listing.edit', ['listing' => $listing->id]) }}" class="text-white" style="text-decoration: none;"><i class="fa fa-pencil" aria-hidden="true"></i></a></button>
                        <button type="button" class="btn btn-danger" onclick="if(confirm('Êtes-vous sûr de vouloir supprimer ce Bien?')) { window.location.href = '{{url('/listing/delete/'.$listing->id)}}' }">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
					</tr>
					@endforeach
				</tbody>
			</table>

                {{ $listings->links() }}  
     </div>
</div>
</div>
</div>

<x-body-immo>
</x-body-immo>
</x-master-layout>