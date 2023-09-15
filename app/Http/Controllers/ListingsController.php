<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
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

        return view('listings.show', [
            'listing' => $listing,
        ]);
    }
}
