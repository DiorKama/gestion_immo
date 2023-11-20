@php
    $contact = contact_phone($_setting);
@endphp

<div class="floating-btn__item">
    <a
        class="floating-btn btn btn-default floating-btn--phone btn-block"
        href="tel:{{ $contact['tel'] }}"
    >
        <span class="floating-btn__icon pr-2"><i class="fas fa-phone-alt"></i></span>
        <span class="floating-btn__text font-weight-bold">{{ __('Appeler') }}</span>
    </a>
</div>
