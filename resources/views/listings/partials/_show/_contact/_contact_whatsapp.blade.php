@php
    $contact = contact_whatsapp($listing, $_setting);
@endphp

<a
    href="{{ $contact['mobile'] }}"
    class="listing-item__contact-item listing-item__contact-item--whatsapp"
    rel="noopener noindex nofollow"
>
    <i class="fab fa-whatsapp"></i>
</a>
