<form
    action="{{ route('admin.ajax.featured-listings.store', [
        'listing' => $listing->id
    ]) }}"
    method="POST"
    class="form-featured-listing-store"
>
    <p>{{ $listing->title }}</p>

    <div class="form-group">
        <label>{{ __('Localité') }}</label>
        <select class="form-control @error('location_id') is-invalid @enderror" name="product_id">
            <option value="">{{ __('Séléctionnez ...') }}</option>
            @foreach($_products as $k => $v)
                <option value="{{ $k }}" @selected(old('product_id') == $k)>{{ $v }}</option>
            @endforeach
        </select>
    </div>

    <button
        type="submit"
        class="btn btn-primary"
    >
        {{ __('Ajouter') }}
    </button>
</form>
