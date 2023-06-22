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
						<h3 class="">Liste <b>des Indicatifs</b></h3>
					</div>
				</div>
			</div>
            <table class="table table-striped table-hover"> 
				<thead>
					<tr>
                    <th>{{ __('ID') }}</th>
                      <th>{{ __('Titre') }}</th>
                      <th>{{ __('ISO') }}</th>
                      <th>{{ __('Enabled') }}</th>
                      <th>{{ __('Indicatif') }}</th>
                      <th>{{ __('Créé le') }}</th>
                      <th>{{ __('Updated') }}</th>
                      <th>{{ __('Actions') }}</th>
					</tr>
				</thead>
				<tbody>
                         @foreach($countries as $countrie)
                          <tr>	
                        <td><a href="{{ route('countrie.show', ['countrie' => $countrie->id]) }}" class="text-decoration-none">
                            {{$countrie->id}}
                        </a></td>
                        <td>{{$countrie->title}}</td>
                        <td>{{$countrie->iso}}</td>
                        <td>{{$countrie->enabled ? 'oui' : 'non'}}</td>
                        <td>{{$countrie->area_code}}</td>
                        <td>{{ $countrie->created_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
                        <td>{{ $countrie->updated_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
                        <td class="text-nowrap">
                            <button type="button" class="btn btn-danger" onclick="if(confirm('Êtes-vous sûr de vouloir supprimer ce pays?')) { window.location.href = '{{url('/countrie/delete/'.$countrie->id)}}' }">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
				</tbody>
			</table>
            <div class="pagination">
            {!! $countries->render() !!}
            </div>
     </div>
</div>
</div>
</div>
<x-body-immo>
</x-body-immo>
</x-master-layout>