<x-master-layout>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ number_format($listingsCount, 0, '', ' ') }}</h3>
                            <p>{{ __('Biens Immo') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file"></i>
                        </div>
                        <a href="{{ route('admin.listings.index') }}" class="small-box-footer">Détails<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ number_format($categoriesCount, 0, '', ' ') }}</h3>
                            <p>{{ __('Catégories') }}}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-list"></i>
                        </div>
                        <a href="{{ route('admin.categories.index') }}" class="small-box-footer">Détails<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning text-white">
                        <div class="inner">
                            <h3>{{ number_format($locationsCount, 0, '', ' ') }}</h3>
                            <p class="text-white">{{ __('Localités') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <a href="" class="small-box-footer">Détails<i class=" text-white fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ number_format($usersCount, 0, '', ' ') }}</h3>
                            <p>{{ __('Utlisateurs') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('admin.settings.index') }}" class="small-box-footer">Modifier<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master-layout>
