<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Services\CountryService;
use Illuminate\Http\Request;

class CountryController extends AbstractAdminController
{
    /**
     * @param Country $country
     */
    public function __construct(
        Country $country
    ) {
        parent::__construct($country);
        $this->middleware('auth');
    }

    public function autocomplete(
        Request $request,
        CountryService $searchService
    ) {
        return $searchService
            ->autocomplete(
                $request->get('q')
            );
    }
}
