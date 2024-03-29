<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ListingsExport;
use App\Http\Requests\StoreListingRequest;
use App\Services\CategoryService;
use App\Services\LocationService;
use App\UseCases\CreateListing;
use App\UseCases\UpdateListingStatus;
use Carbon\Carbon;
use App\Models\Listing;
use App\Models\AbstractEntity;
use App\Services\ListingService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ListingController extends AbstractAdminController
{

    /**
     * @param Listing $listing
     */
    public function __construct(
        Listing $listing
    ) {
        parent::__construct($listing);
        $this->middleware('auth');
    }

    public function createListing(
        AbstractEntity $listing
    ) {
        $_listingCategories = resolve(CategoryService::class)->getCategories();
        $_locations = resolve(LocationService::class)->getLocationsAsList();

        if ( is_null($listing->id) ) {
            $listing = Listing::firstOrCreate([
                'user_id' => auth()->user()->id,
                'listing_status_id' => config('listings.statuses.draft'),
            ]);
        } else {
            if ( config('listings.statuses.draft') != $listing->listing_status_id ) {
                return redirect()
                    ->route('admin.listings.edit', $listing);
            }
        }

        return view(
            'admin.listings.create',
            compact(
                'listing',
                '_listingCategories',
                '_locations'
            )
        );
    }

    public function store(
        $request = null,
        $useCase = null
    ) {
        $request = resolve(StoreListingRequest::class);
        $useCase = resolve(CreateListing::class);

        $listing = $useCase
            ->handle(
                $request->validated()
            );

        if ($listing) {
            return redirect()
                ->route('admin.listings.index')
                ->withMessage(__('votre annonce :listingTitle a été ajoutée avec succès', [
                    'listingTitle' => $listing->title
                ]));
        }

        return back()
            ->withMessage(__('Erreur survenue. Merci de réessayer.'));
    }

    public function edit(
        AbstractEntity $listing
    ) {
        $_listingCategories = resolve(CategoryService::class)->getCategories();
        $_locations = resolve(LocationService::class)->getLocationsAsList();

        return view("admin.listings.edit", compact(
            '_listingCategories',
            '_locations',
            'listing'
        ));
    }

    protected function getCollection($request)
    {
        return $this
            ->entity
            ->crudFilter($request->all())
            ->activeOrDisabled()
            ->paginate($request->get('perPage') ?: config('limit'));
    }

    public function enable(
        AbstractEntity $entity,
        $request = null,
        $useCase = null
    ) {
        $useCase = resolve(UpdateListingStatus::class);

        $listing = $useCase->handle(
            $entity,
            config('listings.statuses.active')
        );

        if ($listing) {
            return redirect()
                ->route('admin.listings.index')
                ->withMessage(__('votre annonce :listingTitle a été activée avec succès', [
                    'listingTitle' => $listing->title
                ]));
        }

        return back()
            ->withMessage(__('Erreur survenue. Merci de réessayer.'));
    }

    public function disable(
        AbstractEntity $entity,
        $request = null,
        $useCase = null
    ) {
        $useCase = resolve(UpdateListingStatus::class);

        $listing = $useCase->handle(
            $entity,
            config('listings.statuses.disabled')
        );

        if ($listing) {
            return redirect()
                ->route('admin.listings.index')
                ->withMessage(__('votre annonce :listingTitle a été désactivée avec succès', [
                    'listingTitle' => $listing->title
                ]));
        }

        return back()
            ->withMessage(__('Erreur survenue. Merci de réessayer.'));
    }

    public function promote(
        AbstractEntity $entity,
        $request = null
    ) {
        $_products = resolve(ListingService::class)->getProductsAsList();

        $view = view('admin.listings.partials._featured._form')
            ->with(
                [
                    'listing' => $entity,
                    '_products' => $_products
                ]
            )
            ->render();

        return response()->json([
            'form' => $view,
        ]);
    }

    public function download(
        Request $request
    ) {
        return Excel::download(new ListingsExport($this->entity, $request), 'listings.xlsx');
    }
}
