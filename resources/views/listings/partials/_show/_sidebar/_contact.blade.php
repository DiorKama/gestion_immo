<div class="listing-item-contact">
    <div class="listing-item-contact__header">
        <div class="listing-item-contact__header__title">
            {{ __('Contactez nous') }}
        </div>
    </div>

    <div class="listing-item__sidebar__contact listing-item__sidebar__contact--phone">
        @include('listings.partials._show._contact._contact_phone')
        @include('listings.partials._show._contact._contact_whatsapp')
    </div>

    <div class="listing-item__sidebar__contact listing-item__sidebar__contact--email">
        @include('listings.partials._show._contact._contact_email')
    </div>
</div>
