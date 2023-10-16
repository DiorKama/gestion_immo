<?php

namespace App\Http\Controllers\Admin;

use App\Models\Region;
use App\Services\RegionServices;
use Illuminate\Http\Request;

class RegionController extends AbstractAdminController
{
    /**
     * @param Region $region
     */
    public function __construct(
        Region $region
    )
    {
        parent::__construct($region);
        $this->middleware('auth');
    }

    public function autocomplete(
        Request $request,
        RegionServices $searchService
    ) {
        return $searchService
            ->autocomplete(
                $request->get('q')
            );
    }
}
