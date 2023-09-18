<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use App\Services\ListingStatisticsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    public function index(
        Request $request
    ) {
        return view('listings.index', [
            'listings' => Listing::query()
                ->with(['category'])
                ->where('listing_status_id' , config('listings.statuses.active'))
                ->orderByDesc('created_at')
                ->paginate()
                ->withQueryString()
        ]);
    }

    public function category(
        Request $request,
        Category $category
    ) {

    }

    public function show(
        string $slug,
        int $id
    ) {
        $listing = Listing::query()
            ->where('slug', $slug)
            ->where('id', $id)
            ->active()
            ->firstOrFail();

        resolve(ListingStatisticsService::class)
            ->incrementViews($listing);

        return view('listings.show', [
            'listing' => $listing,
        ]);
    }

    public function viewPhone(
        Listing $listing,
        Request $request
    ) {
        resolve(ListingStatisticsService::class)
            ->incrementPhoneNumberViews($listing);

        return $request->expectsJson()
            ? jsend(true)
            : redirect()
                ->to(listing_url($listing))
                ->with('showPhone', true);
    }

    public function viewWhatsapp(
        Listing $listing,
        Request $request
    ) {
        resolve(ListingStatisticsService::class)
            ->incrementWhatsappViews($listing);

        return $request->expectsJson()
            ? jsend(true)
            : redirect()
                ->to(listing_url($listing));
    }
}
