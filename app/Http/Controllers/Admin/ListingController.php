<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreListingRequest;
use App\Services\CategoryService;
use App\Services\LocationService;
use App\UseCases\CreateListing;
use Carbon\Carbon;
use App\Models\Listing;
use App\Models\AbstractEntity;
use App\Services\ListingService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            ->where('listing_status_id', '!=' , config('listings.statuses.draft'))
            ->paginate($request->get('perPage') ?: config('limit'));
    }
}
