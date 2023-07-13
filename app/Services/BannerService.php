<?php
namespace App\Services;

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

     

}

