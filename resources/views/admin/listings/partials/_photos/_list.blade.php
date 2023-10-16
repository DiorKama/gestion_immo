@php
    $files = collect($listing->files)
        ->where('group', $groupConfig['file_group']);
    $actions = $actions ?? true;
@endphp

<div class="post-listing-photos post-listing-photos--{{ $group }}">
    <ul
        class="sortable post-listing-photos__list"
        data-file-upload-uploaded-preview-container
    >
        @foreach ($files as $image)
            <li
                class="post-listing-photos__list-item post-listing-photos__list-item--{{ $group }}"
                data-file-upload-uploaded-preview-item
            >
                <div class="post-listing-photos__list-item__photo">
                    <div class="post-listing-photos__list-item__photo__image">
                        <div class="post-listing-photos__list-item__photo__image__inner-container">
                            <div
                                class="post-listing-photos__list-item__photo__image__inner"
                                id="image-{{ $image->id }}"
                            >
                                <img
                                    src="{{ fullImageUrl('listing-picture-120w', $image->path) }}"
                                    class="post-listing-photos__list-item__photo__image__resource"
                                >
                            </div>
                        </div>
                    </div>

                    @if($actions)
                        <div class="post-listing-photos__list-item__photo__actions">
                            <form
                                action="{{ route('admin.listings.photos.delete', [
                                    'listing' => $listing->id,
                                    'group' => $group,
                                    'file' => $image,
                                ]) }}"
                                method="post"
                                class="post-listing-photos__list-item__photo__actions__form post-listing-photos__list-item__photo__actions__form--delete"
                                data-image-delete
                            >
                                <input type="hidden" name="_method" value="DELETE">
                                <button
                                    type="submit"
                                    class="post-listing-photos__list-item__photo__actions__form-btn"
                                >
                                    <i class="fas fa-trash post-listing-photos__list-item__photo__actions__form-icon"></i>
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>
