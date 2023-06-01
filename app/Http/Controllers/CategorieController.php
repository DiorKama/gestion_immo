<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::paginate(5);
        return view('categories.index', ['categories' => $categories]); 
     }

     public function delete(Categorie $categorie)
        {
            $categorie->delete();
            return redirect()->route('categorie.index');
        }

    public function show(Categorie $categorie)
    {
        return view('categories.show', ['categorie' => $categorie]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|max:255',
            'description' => 'required',
            'active' => 'boolean',
        ]);
        $categories = new Categorie([
            'libelle' => $validatedData['libelle'],
            'description' => $validatedData['description'],
            'active' => isset($validatedData['active']) ? $validatedData['active'] : false,

        ]);
        
        $categories->save();
    
        return redirect('/categorie/index');
    }

    public function edit(Categorie $categorie)
        {
            return view(
                'categories.edit',
                [
                    'categorie' => $categorie,
                ]
            );
        }
        public function update(Request $request, Categorie $categorie)
        {
          //$leaveTypes = LeaveType::findOrFail($id);
          $validatedData = $request->validate([
              'libelle' => 'required|max:255',
              'description' => 'required',
              'active' => 'boolean',
          ]);
      
          $categorie->update([
              'libelle' => $validatedData['libelle'],
              'description' => $validatedData['description'],
              'active' => isset($validatedData['active']) && $validatedData['active'] == '1',
          ]);
      
                  return redirect('categorie/index');
              }
}
