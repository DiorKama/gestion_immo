<x-app-layout>
    <div class="listings-cards section-item">
        <div class="listings-cards__inner section-item__inner">
            <div class="listings-cards__row section-item__row">
                <div class="listings-cards__aside">
                    <div class="about-us__header section-item__header">
                        <div class="about-us__header__inner section-item__header__inner">
                            <h2 class="about-us__header__title section-item__header__title">
                                {{ __('Appartements à louer') }}
                            </h2>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="listings-cards__content d-flex flex-column align-items-start">
                    <div class="listings-cards__list">
                        <?php for ($i=0; $i < 5; $i++) { ?>
                            <div class="listings-cards__row row mt-5">
                                <?php for ($j=0; $j < 3; $j++) { ?>
                                    <div class="listings-cards__list-item">
                                        <div class="listing-card">
                                            <div class="listing-card__aside">
                                                <a
                                                    href=""
                                                    class="listing-card__image"
                                                >
                                                    <img src="https://placehold.co/250x200?text=Image" class="listing-card__image__resource d-block w-100" alt="...">
                                                </a>
                                            </div>
                                            <div class="listing-card__content py-2">
                                                <div class="listing-card__content__inner">
                                                    <h2 class="listing-card__header__title">
                                                        <a href="">
                                                            {{ __('Appartements F4 à louer') }}
                                                        </a>
                                                    </h2>
                                                    <div class="listing-card__properties">
                                                        <ul class="listing-card__attribute-list list-inline mb-0">
                                                            <li class="listing-card__attribute list-inline-item">
                                                                Ref. 123456
                                                            </li>
                                                            <li class="listing-card__attribute list-inline-item">
                                                                Ref. 123456
                                                            </li>
                                                            <li class="listing-card__attribute list-inline-item">
                                                                Ref. 123456
                                                            </li>
                                                            <li class="listing-card__attribute list-inline-item">
                                                                Ref. 123456
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="listing-card__address">
                                                        <span class="town-suburb d-inline-block">Grand-Yoff,</span>
                                                        <span class="province font-weight-bold d-inline-block">Dakar</span>
                                                    </div>
                                                    <h3 class="listing-card__price font-weight-bold text-uppercase my-2">
                                                        35 000 000 F <span class="font-weight-lighter">CFA</span>
                                                    </h3>
                                                    <div class="listing-card__date">
                                                        <p class="time m-0">Passée, il y a 2 jours </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
