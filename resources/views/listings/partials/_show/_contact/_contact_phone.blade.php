@php
    $contact = contact_phone($listing, $_setting);
@endphp

<a
    href="javascript:void(0)"
    class="listing-item__contact-item listing-item__contact-item--phone"
    data-toggle="modal" data-target="#phone_display"
>
    <i class="fas fa-phone-alt"></i>
</a>

<!-- Phone view start -->
<div class="modal fade listing-item__contact--phone-modal" id="phone_display" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ __('Azimuts Immobilier') }}
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
