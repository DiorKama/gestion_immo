<?php

namespace App\Http\Controllers;

use App\Models\Country;
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
}
