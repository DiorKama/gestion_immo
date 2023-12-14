<x-app-layout>
    @section('page-title', __('A propos de :siteName', [
        'siteName' => isset($_setting) ? $_setting->name : 'App Name'
    ]))

    @section('header-section')@endsection

    <div class="page page--about-us">
        <div class="page__inner">
            <div class="page__col">
                <div class="page__gallery">
                    <div class="page__gallery__inner">
                        <div class="page__gallery__col align-items-end">
                            <img class="page__gallery__img w-50 order-2" src="{{ asset('assets/core-site/img/about1.jpg') }}" alt="">
                            <img class="page__gallery__img w-100 order-1" src="{{ asset('assets/core-site/img/about2.jpg') }}" alt="">
                        </div>
                        <div class="page__gallery__col align-items-start">
                            <img class="page__gallery__img w-50" src="{{ asset('assets/core-site/img/about3.jpg') }}" alt="">
                            <img class="page__gallery__img w-100" src="{{ asset('assets/core-site/img/about4.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="page__col">
                <div class="page__content">
                    <div class="page__content__header">
                        <h1 class="page__title">Qui sommes nous ?</h1>
                    </div>
                    <div class="page__content__body">
                        <p>Nous sommes une société à responsabilité limitée avec un capital de <b>10.000.000</b> francs créée en <b>1999</b>.</p>

                        <p>Inscrite au registre de commerce sous le numéro <b>SN-DKR-99-B-1400</b> et titulaire de l'autorisation d'exercer
                            <b>N°0086 du 28 avril 2000/MCA/DCI.  </b> Compte contribuable (NINEA) est le : <b>0378209 2B2.</b></p>

                        <p>Nous intervenons dans les domaines suivants :</p>

                        <ul class="page__list">
                            <li class="page__list-item">Vente et location de biens immobiliers</li>
                            <li class="page__list-item">Conseils Gestion et transactions immobilières</li>
                        </ul>

                        <h2 class="page__content__title"><i class="fa fas fa-users-cog"></i>Organisation</h2>

                        <p>Nous sommes organisés en 3 unités : l'Accueil, l'Exploitation commerciale, le Comptabilité</p>

                        <h2 class="page__content__title"><i class="fa fa-solid fa-building"></i> Notre Adresse</h2>

                        <p>RDC, Immeuble 5A, Hlm Fass, Boulevard Canal 4, Dakar</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="page__inner">
            <div class="page__col page__col--full-width">
                <div class="map__container">
                    <iframe
                        width="100%"
                        height="450"
                        style="border:0"
                        loading="lazy"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8
    &q=AZIMUTS+IMMO+SARL,+Boulevard+Canal+VI,+Dakar,+Sénégal">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
