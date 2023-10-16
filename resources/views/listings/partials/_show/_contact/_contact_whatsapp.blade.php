@php
    $contact = contact_whatsapp($listing, $_setting);
@endphp

<a
    href="{{ $contact['mobile'] }}"
    class="listing-item__contact-item listing-item__contact-item--whatsapp"
    data-whatsapp="{{ $contact['desktop'] }}"
    data-whatsapp-track={{
        route(
            'listings.view-whatsapp', [
                'listing' => $listing
            ]
        )
    }}
>
    <i class="fab fa-whatsapp"></i>
</a>
