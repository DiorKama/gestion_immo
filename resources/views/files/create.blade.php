<x-master-layout>
<x-header-immo>
</x-header-immo>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="mt-5 py-3">
<form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <h3 class="text-center">Ajout des images </h3>
    <div>
        <label for="file">Sélectionnez les images :</label>
        <input type="file" name="file[]" class="form-control" id="file" multiple>
    </div>
    <div class=" mt-2">
        <label for="listing_id">Biens :</label>
        <select class="form-control" aria-label="Default select example" name="listing_id">
        <option>Séléctionnez</option>
        @foreach($listings as $listing)
        <option value="{{ $listing->id }}"> {{ $listing->title}} </option>
        @endforeach
        </select>
    </div>

    <button class="btn btn-primary mt-2" type="submit">Enregistrer</button>
</form>
</div>
<x-body-immo>
</x-body-immo>
</x-master-layout>
