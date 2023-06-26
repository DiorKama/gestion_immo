<x-master-layout>
    @section('page-title', __('Modifier une annonce'))

    @section('page-header-title', __('Modifier :listing', [
        'listing' => $listing->title
    ]))

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master-layout>
