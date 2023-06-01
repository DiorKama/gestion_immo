<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Option;
use App\Models\Listing;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function create()
    {
        $options = Option::all();
        $categories = Categorie::get()->all();
        return view('listings.create', compact('options', 'categories'));
    }

    public function store(Request $request)
    {
    $this->validate($request, [
        'title' => ['required', 'min:8'],
        'description' => ['required', 'min:8'],
        'surface' => ['required', 'integer', 'min:10'],
        'rooms' => ['required', 'integer', 'min:1'],
        'bedrooms' => ['required', 'integer', 'min:0'],
        'floor' => ['required', 'integer', 'min:0'],
        'price' => ['required', 'integer', 'min:0'],
        'city' => ['required', 'min:4'],
        'address' => ['required', 'min:4'],
        'sold' => ['nullable', 'boolean'],
        'user_id' => ['required', 'integer', 'exists:users,id'],
        'categorie_id' => ['required', 'integer', 'exists:categories,id'],
        'option_id' => ['array', 'required', 'exists:options,id']

    ]);
    $listing = Listing::create([
        "title" => $request->input('title'),
        "description" => $request->input('description'),
        "surface" => $request->input('surface'),
        "rooms" => $request->input('rooms'),
        "bedrooms" => $request->input('bedrooms'),
        "floor" => $request->input('floor'),
        "price" => $request->input('price'),
        "city" => $request->input('city'),
        "address" => $request->input('address'),
        'sold' => $request->input('sold', false),
        "user_id" => (int)$request->input('user_id'),
        "categorie_id" => (int)$request->input('categorie_id'),
        "option_id" => (int)$request->input('option_id'),
    ]);
    $listing->options()->sync($request->input('option_id'));
    return redirect('/listing/index');
    }

    public function index(){
        $listings = Listing::paginate(5);
        return view('listings.index', ['listings' => $listings]); 
     }

     public function delete(Listing $listing)
        {
            $listing->delete();
            return redirect()->route('listing.index');
        }
        public function show(Listing $listing)
        {
            return view('listings.show', ['listing' => $listing]);
        }

}
