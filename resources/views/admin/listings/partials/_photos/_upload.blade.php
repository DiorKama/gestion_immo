<div
    class="dz-message clickable"
    data-file-upload-clickable-trigger
>
    <p>Déposez les images ici pour les télécharger.</p>

    <span>
        <i class="fas fa-image"></i>
    </span>
</div>

<div class="post-listing-photo-upload">
    <form
        action="{{ route('admin.listings.photos.store', [
            'listing' => $listing->id,
            'group' => $group,
        ]) }}"
        method="post"
        enctype="multipart/form-data"
        class="post-listing-photo-upload__form"
        data-file-upload-form
    >
        @csrf

        <div class="form-group">
            <div class="post-listing__image-upload">
                <div data-file-upload-clickable-trigger>
                    <input
                        type="file"
                        name="images"
                        class ="post-listing__file-input hidden form-control"
                        data-file-upload-file
                    />
                </div>
            </div>

            @if ($errors->has('images'))
                <div class="form-control-feedback">
                    <ul class="list-inline">
                        @foreach($errors->get('images') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </form>
</div>

<div data-file-upload-preview-container class="dz-preview-container"></div>
