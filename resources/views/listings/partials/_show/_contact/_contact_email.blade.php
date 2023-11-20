<form class="listing-item__contact-form" action="">
    <div class="listing-item__contact-form__group mb-2 text required">
        <input type="text" name="name" placeholder="{{ __('Nom & Prénom') }}" class="listing-item__contact-form__input" required="required" id="name">
        <span class="listing-item__contact-form__focus-input"></span>
        <span class="listing-item__contact-form__icon"><i class="fa fa-user"></i></span>
    </div>

    <div class="listing-item__contact-form__group mb-2 text required">
        <input type="email" name="email" placeholder="{{ __('E-mail') }}" class="listing-item__contact-form__input" required="required" id="email">
        <span class="listing-item__contact-form__focus-input"></span>
        <span class="listing-item__contact-form__icon"><i class="fas fa-envelope"></i></span>
    </div>

    <div class="listing-item__contact-form__group mb-2 text required">
        <input type="text" name="phone" placeholder="{{ __('Votre téléphone') }}" class="listing-item__contact-form__input" required="required" id="phone">
        <span class="listing-item__contact-form__focus-input"></span>
        <span class="listing-item__contact-form__icon"><i class="fas fa-phone fa-rotate-90"></i></span>
    </div>

    <div class="listing-item__contact-form__group mb-2 text required">
        <textarea class="listing-item__contact-form__input listing-item__contact-form__focus-input--textarea" id="exampleFormControlTextarea1" rows="3" placeholder="{{ __('Votre message ici') }}"></textarea>
        <span class="listing-item__contact-form__focus-input"></span>
        <span class="listing-item__contact-form__icon"><i class="fas fa-envelope-open-text"></i></span>
    </div>

    <button type="submit" class="btn btn-block btn-primary">Envoyer</button>
</form>
