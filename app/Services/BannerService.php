<?php
namespace App\Services;

use App\Models\Banner;
use Illuminate\Support\Facades\File;

class BannerService
{
    public function uploadImage($file)
    {
        $originalFilename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $filename = date('YmdHi') . '_' . $originalFilename;
        $filePath = public_path('images') . DIRECTORY_SEPARATOR . $filename;

        $i = 1;
        while (file_exists($filePath)) {
            $newFilename = date('YmdHi') . '_' . $i . '_' . $originalFilename;
            $filePath = public_path('images') . DIRECTORY_SEPARATOR . $newFilename;
            $i++;
        }

        if (!$file->move(public_path('images'), $filePath)) {
            echo 'Erreur lors du déplacement du fichier.';
        }

        return 'images/' . $filename;
    }

    public function getBanners(
        $page = 'home'
    ) {
        $banners = collect();
        $ads = Banner::query()
            ->where('type_banner', $page)
            ->onlyEnabled()
            ->take(2)
            ->get();

        if ($ads) {
            $ads->each(function ($item, $key) use (&$banners) {
                $banners->push([
                    'id' => $item->id,
                    'title' => $item->title,
                    'url' => $item->url,
                    'image' => $item->backgroundImage->path,
                    'mobile_image' => $item->mobileBackgroundImage->path,
                ]);
            });
        }

        return $banners;
    }
}

