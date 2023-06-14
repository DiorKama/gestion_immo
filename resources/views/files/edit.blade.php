<x-master-layout>
    <x-header-immo></x-header-immo>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="mt-5 py-3">
    <form action="{{ url('file/update/'.$file->id) }}" method="POST">
    @csrf
    @method('PUT')
            <div>
                <label for="file">Modifier les images :</label>
                @foreach (json_decode($file->path_url) as $path)
                    <div class="image-container">
                        <img src="{{ $path }}" width="100" height="50" alt="Image">
                        <button class="btn btn-danger remove-image" data-url="{{ $path }}">Supprimer</button>
                    </div>
                @endforeach
                <input type="file" name="file[]" class="form-control" id="file" multiple>
                <div id="deleted-images-container"></div>
            </div>
            <div class="mt-2">
                <label for="listing_id">Biens :</label>
                <select class="form-control" aria-label="Default select example" name="listing_id">

                    <!-- <option value="{{ $file->listings->id }}">{{ $file->listings->title }}</option> -->
                    @foreach($listings as $listing)
                    <option value="{{ $listing->id }}" @if ($listing->id == $file->listing_id) selected="selected" @endif>{{ $listing->title }}</option>
                 @endforeach
                </select>
            </div>

            <button class="btn btn-primary mt-2" type="submit">Modifier</button>
        </form>
    </div>

    <script>
    // Écoutez l'événement click sur les boutons de suppression
    var removeButtons = document.getElementsByClassName('remove-image');
    for (var i = 0; i < removeButtons.length; i++) {
        removeButtons[i].addEventListener('click', function(e) {
            e.preventDefault();
            var imageUrl = this.getAttribute('data-url');
            var imageContainer = this.parentNode;
            // Supprimez l'image du DOM
            imageContainer.parentNode.removeChild(imageContainer);
            // Ajoutez un champ caché pour enregistrer l'URL de l'image supprimée
            var deletedImagesContainer = document.getElementById('deleted-images-container');
            var deletedImagesInput = document.createElement('input');
            deletedImagesInput.setAttribute('type', 'hidden');
            deletedImagesInput.setAttribute('name', 'deleted_images[]');
            deletedImagesInput.setAttribute('value', imageUrl);
            deletedImagesContainer.appendChild(deletedImagesInput);
        });
    }
</script>
    <x-body-immo></x-body-immo>
</x-master-layout>
