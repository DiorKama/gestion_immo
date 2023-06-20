<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){
        $countries = Country::simplePaginate(15);
        return view('countries.index', ['countries' => $countries]); 
     }


     public function delete(Country $listing)
        {
            $listing->delete();
            return redirect()->route('countrie.index');
        }


        public function show(Country $countrie)
        {
            return view('countries.show', ['countrie' => $countrie]);
        }
}
