@php
    $contact = contact_whatsapp($listing, $_setting);
@endphp

<div class="floating-btn__item">
    <a
        class="floating-btn btn btn-default floating-btn--whatsapp btn-block"
        href="{{ $contact['mobile'] }}"
        data-whatsapp="{{ $contact['desktop'] }}"
        data-whatsapp-track={{
            route(
                'listings.view-whatsapp', [
                    'listing' => $listing
                ]
            )
        }}
    >
        <span class="floating-btn__icon pr-2"><i class="fab fa-whatsapp"></i></span>
        <span class="floating-btn__text font-weight-bold">{{ __('WhatsApp') }}</span>
    </a>
</div>
