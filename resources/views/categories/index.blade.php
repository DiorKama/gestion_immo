<x-master-layout>
<x-header-immo>
</x-header-immo>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="">
	<div class="table-responsive py-2 mt-5">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="ml-3">
						<h3 class="">Liste <b>des Catégories</b></h3>
					</div>
				</div>
			</div>
            <table class="table table-striped table-hover"> 
				<thead>
					<tr>
                    <th>{{ __('ID') }}</th>
                      <th>{{ __('Nom') }}</th>
                      <th>{{ __('Enabled') }}</th>
                      <th>{{ __('Description') }}</th>
                      <th>{{ __('Properties') }}</th>
                      <th>{{ __('Order') }}</th>
                      <th>{{ __('Parent') }}</th>
                      <th>{{ __('Créé le') }}</th>
                      <th>{{ __('Updated') }}</th>
                      <th>{{ __('Actions') }}</th>
					</tr>
				</thead>
				<tbody>
                    @foreach($categories as $categorie)
					<tr>	
                        <td><a href="{{ route('categorie.show', ['categorie' => $categorie->id]) }}" class="text-decoration-none">
                            {{$categorie->id}}
                         </a></td>
                        <td>{{$categorie->title}}</td>
                        <td>{{ $categorie->enabled ? 'Oui' : 'Non' }}</td>
                        <td>{{$categorie->description}}</td>
                        <td>{{$categorie->properties}}</td>
                        <td>{{$categorie->sort_order}}</td>
                        <td>{{$categorie->parent_id}}</td>
                        <td>{{ $categorie->created_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
                        <td>{{ $categorie->updated_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
						<td class="text-nowrap">
                        <button type="button" class="btn btn-primary"><a href="{{ route('categorie.edit', ['categorie' => $categorie->id]) }}" class="text-white" style="text-decoration: none;"><i class="fa fa-pencil" aria-hidden="true"></i></a></button>
                        <button type="button" class="btn btn-danger" onclick="if(confirm('Êtes-vous sûr de vouloir supprimer ce catégorie?')) { window.location.href = '{{url('/categorie/delete/'.$categorie->id)}}' }">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
					</tr>
					@endforeach
				</tbody>
			</table>

                {{ $categories->links() }}  
     </div>
</div>
</div>
</div>
    
<x-body-immo>
</x-body-immo>
</x-master-layout>

