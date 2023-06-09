<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function create()
    {
        $listings = Listing::all();
        return view('files.create', compact('listings'));
    }

public function store(Request $request)
{
    $file = new File();

    // Vérifier s'il y a des fichiers téléchargés
    if ($request->hasFile('file')) {
        $pathUrls = [];

        foreach ($request->file('file') as $uploadedFile) {
            // Générer un nom de fichier unique
            $filename = uniqid() . '.' . $uploadedFile->getClientOriginalExtension();
            
            // Déplacer le fichier vers le dossier public/images
            $uploadedFile->move(public_path('images'), $filename);
            
            // Ajouter le chemin URL du fichier au tableau
            $pathUrls[] = asset('images/' . $filename);
        }

        $file->path_url = $pathUrls;
    }

    $file->listing_id = $request->listing_id;
    $file->save();

return redirect('/file/index');
}

public function index()
{
    $files = File::whereNull('deleted_at')->paginate(5);

    return view('files.index', ['files' => $files]);
}

public function delete(File $file)
    {
        // Supprimer les images du stockage
    foreach ($file->path_url as $path) {
        // Supprimez l'image du stockage en utilisant la logique appropriée
        // Exemple : Storage::delete($path);
    }
        $file->delete();

        return redirect()->route('file.index');
    }


    public function show(File $file)
    {
        return view('files.show', ['file' => $file]);
    }


    public function edit($id)
{
    $file = File::findOrFail($id);
    $listings = Listing::all(); // Assurez-vous d'importer le modèle Listing en haut du fichier

    return view('files.edit', compact('file', 'listings'));
}

    public function update(Request $request, $id)
    {
        $file = File::findOrFail($id);
    
        if ($request->has('deleted_images')) {
            $deletedImages = $request->input('deleted_images');
            // Traitez les images supprimées comme vous le souhaitez, par exemple, supprimez-les du stockage
            foreach ($deletedImages as $deletedImage) {
                // Générer le chemin complet de l'image à supprimer
                $imagePath = public_path('images/' . $deletedImage);
        
                // Supprimez l'image du stockage en utilisant la fonction Storage::delete()
                Storage::delete($imagePath);
            }
        }
        // Vérifier s'il y a des fichiers téléchargés
        if ($request->hasFile('file')) {
            $pathUrls = [];
    
            foreach ($request->file('file') as $uploadedFile) {
                // Générer un nom de fichier unique
                $filename = uniqid() . '.' . $uploadedFile->getClientOriginalExtension();
    
                // Déplacer le fichier vers le dossier public/images
                $uploadedFile->move(public_path('images'), $filename);
    
                // Ajouter le chemin URL du fichier au tableau
                $pathUrls[] = asset('images/' . $filename);
            }
    
            $file->path_url = $pathUrls;
        }
    
        $file->listing_id = $request->listing_id;
        $file->save();
    
        return redirect('/file/index');
    }    
}
