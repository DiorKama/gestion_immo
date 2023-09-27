@php
    $customerServiceContact = contact_phone($_setting);
    $salesServiceContact = contact_phone($_setting, true);
@endphp

<div class="footer__inner">
    <div class="footer__row align-items-end py-5">
        <div class="footer__aside">
            <div class="our-deals__header section-item__header">
                <div class="our-deals__header__inner section-item__header__inner">
                    <h2 class="our-deals__header__title section-item__header__title">
                        {{ __('Contact') }}
                    </h2>
                    <hr>
                </div>
            </div>
        </div>
        <div class="footer__content">
            <div class="row d-flex align-items-end">
                <div class="col-sm-4 col-12">
                    <p>{{ isset($_setting->address) && !empty($_setting->address) ? $_setting->address : 'Boulevard Canal VI Dakar Sénégal (+221) 33 xxx xx xx' }}</p>

                    <div class="footer-contact-content">
                        <a class="footer-contact-item" rel="noopener noindex nofollow" href="tel:{{ $customerServiceContact['tel'] }}">
                            <span class="footer-contact-item__icon">
                                <i class="fa fa-phone"></i>
                            </span>
                            <strong class="footer-contact-item__title">
                                <span class="footer-contact-item__label">
                                    {{ __('Service client') }}
                                </span>
                                {{ $customerServiceContact['value'] }}
                            </strong>
                        </a>

                        <a class="footer-contact-item" rel="noopener noindex nofollow" href="tel:{{ $salesServiceContact['tel'] }}">
                            <span class="footer-contact-item__icon">
                                <i class="fa fa-phone"></i>
                            </span>
                            <strong class="footer-contact-item__title">
                                <span class="footer-contact-item__label">
                                    {{ __('Service commercial') }}
                                </span>
                            {{ $salesServiceContact['value'] }}
                        </strong>
                        </a>
                    </div>
                </div>
                <div class="col-sm-5 offset-sm-3  col-12 text-sm-right text-center">
                    <div class="footer-link">
                        <ul class="footer-links__list list-unstyled list-inline">
                            @if ( isset($_setting->facebook_url) && !empty($_setting->facebook_url) )
                                <li class="list-inline-item">
                                    <a
                                        class="footer-links__list-social-item__link"
                                        href="{{ $_setting->facebook_url }}"
                                        target="_blank"
                                    >
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            @endif

                            @if ( isset($_setting->twitter_url) && !empty($_setting->twitter_url) )
                                <li class="list-inline-item">
                                    <a
                                        class="footer-links__list-social-item__link"
                                        href="{{ $_setting->twitter_url }}"
                                        target="_blank"
                                    >
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            @endif

                            @if ( isset($_setting->instagram_url) && !empty($_setting->instagram_url) )
                                <li class="list-inline-item">
                                    <a
                                        class="footer-links__list-social-item__link"
                                        href="{{ $_setting->instagram_url }}"
                                        target="_blank"
                                    >
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            @endif

                            @if ( isset($_setting->linkedin_url) && !empty($_setting->linkedin_url) )
                                <li class="list-inline-item">
                                    <a
                                        class="footer-links__list-social-item__link"
                                        href="{{ $_setting->linkedin_url }}"
                                        target="_blank"
                                    >
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="footer-copyright">
                        <p>{{ __('Copyright © :year Tous droits réservés', [
                            'year' => date('Y')
                        ]) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
