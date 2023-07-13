<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends AbstractAdminController
{
    /**
     * @var string
     */
    protected $files = [
        'banner_bg' => 'image',
        'mobile_banner_bg' => 'image',
    ];

    /**
     * @param Banner $banner
     */
    public function __construct(
        Banner $banner
    ) {
        parent::__construct($banner);
        $this->middleware('auth');
    }

    /**
     * {@inheritdoc}
     */
    public function store(
        $request = null,
        $useCase = null
    ) {
        return parent::store(
            resolve(StoreBannerRequest::class),
            $useCase
        );
    }
}
