@php
    $contact = contact_phone($listing, $_setting);
@endphp

<form
    action="{{ route('listings.view-phone', ['listing' => $listing->id]) }}"
    method="POST"
    class="listing-card__contact__container d-inline"
    data-listing-show-phone
    data-listing-show-phone-container=".listing-item__sidebar__contact--phone"
    data-listing-show-phone-modal=".listing-item__contact--phone-modal"
>
    @csrf

    <button
        type="submit"
        class="listing-item__contact-item listing-item__contact-item--phone"
    >
        <i class="fas fa-phone-alt"></i>
    </button>
</form>

<!-- Phone view start -->
<div class="modal fade listing-item__contact--phone-modal" id="phone_display" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ isset($_setting) ? $_setting->name : 'App Name' }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="tel:{{ $contact['tel'] }}">
                    {{ $contact['value'] }}
                </a>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<!-- Phone view end -->
