<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use App\Services\ListingStatisticsService;
use Illuminate\Contracts\Database\Query\Builder;
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
        $dbCategory
    ) {
        return view('listings.category', [
            'category' => $dbCategory,
            'listings' => $dbCategory->listings()
                ->with(['category'])
                ->where('listing_status_id' , config('listings.statuses.active'))
                ->orderByDesc('created_at')
                ->paginate()
                ->withQueryString()
        ]);
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

    public function search(
        Request $request
    ) {
        $q = $request->input('q') ?? null;
        $category = $request->input('category_id') ?? null;
        $location = $request->input('location_id') ?? null;
        $budget = $request->input('budget') ?? null;

        $listings = Listing::query()
            ->with(['category'])
            ->where('listing_status_id' , config('listings.statuses.active'))
            ->when(
                $q,
                function (Builder $query, $q) {
                    $query->where(
                        'title',
                        'LIKE',
                        "%{$q}%"
                    );
                }
            )
            ->when(
                $category, function (Builder $query, $category) {
                    $query->where('category_id', $category);
                }
            )
            ->when(
                $location, function (Builder $query, $location) {
                    $query->where('location_id', $location);
                }
            )
            ->when(
                $budget, function (Builder $query, $budget) {
                    $query->where('price', '<=', $budget);
                }
            )
            ->orderByDesc('created_at')
            ->paginate()
            ->withQueryString();

        return view('listings.search', [
            'listings' => $listings
        ]);
    }
}
