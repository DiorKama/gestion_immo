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
						<h3 class="">Liste <b>des Images</b></h3>
					</div>
				</div>
			</div>
            <table class="table table-striped table-hover"> 
				<thead>
					<tr>
                    <th>{{ __('ID') }}</th>
                      <th>{{ __('URL') }}</th>
                      <th>{{ __('Biens') }}</th>
                      <th>{{ __('Créé le') }}</th>
                      <th>{{ __('Updated') }}</th>
                      <th>{{ __('Actions') }}</th>
					</tr>
				</thead>
				<tbody>
                      @foreach($files as $file)
                      <tr>	
                        <td><a href="{{ route('file.show', ['file' => $file->id]) }}" class="text-decoration-none">
                            {{$file->id}}
                        </a></td>
                        <td>
                            @foreach($file->path_url as $url)
                                <img src="{{ $url }}" alt="Image" width="75">
                            @endforeach
                        </td>
                        <td>{{$file->listings->title}}</td>
                        <td>{{ $file->created_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
                        <td>{{ $file->updated_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
                        <td class="text-nowrap">
                            <button type="button" class="btn btn-primary"><a href="{{ route('file.edit', ['file' => $file->id]) }}" class="text-white" style="text-decoration: none;"><i class="fa fa-pencil" aria-hidden="true"></i></a></button>
                            <button type="button" class="btn btn-danger" onclick="if(confirm('Êtes-vous sûr de vouloir supprimer cette image?')) { window.location.href = '{{url('/file/delete/'.$file->id)}}' }">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
				</tbody>
			</table>
                {{ $files->links() }}  
     </div>
</div>
</div>
</div>
<x-body-immo>
</x-body-immo>
</x-master-layout>