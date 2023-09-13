<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use App\Models\Listing;
use App\Traits\CanUploadImage;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

class ListingFileController
{
    use CanUploadImage;

    public function index(
        Listing $listing
    ) {
        return view('admin.listings.photos', compact('listing'));
    }

    public function preview(
        Listing $listing,
        string $group
    ) {
        $groupConfig = upload_config($group);

        return view(
            'admin.listings.partials._photos._list',
            compact(
                'listing',
                'group',
                'groupConfig'
            )
        );
    }

    public function store(
        Request $request,
        Listing $listing,
        string $group
    ) {
        $groupConfig = upload_config($group);

        $result = $this->storeFile(
            $request->file('images'),
            $listing,
            Arr::get($groupConfig, 'file_group') ?? $group,
            Arr::get($groupConfig, 'file_types'),
            Arr::get($groupConfig, 'max'),
            Arr::get($groupConfig, 'max_size')
        );

        if ($result['success'] === true) {
            return $request->expectsJson()
                ? jsend(true)
                : back()->withMessage(__('files.photo.success'));
        } else {
            throw ValidationException::withMessages(
                [
                    'images' => $result['error'],
                ]
            );
        }
    }

    public function delete(
        Request $request,
        Listing $listing,
        string $group,
        File $file
    ) {
        $this->deleteFileRecord($file);

        return $request->expectsJson()
            ? jsend(true)
            : back()->withMessage(__('files.photo.delete'));
    }
}
