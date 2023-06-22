<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::simplepaginate(5);
        return view('categories.index', ['categories' => $categories]); 
     }

     public function delete(Category $categorie)
    {
        //$this->deleteChildren($categorie);
        $type = 'error';
        $message = __('ça marche pas!');

        if ( !$categorie->has_children ) {
            $categorie->delete();
            $type = 'success';
            $message = __('la catégorie :category a été supprimée avec succès !', [
                'category' => $categorie->title
            ]);
        }
        
        return redirect()->route('categorie.index')->with($type, $message);
    }
    /*private function deleteChildren(Category $categorie)
    {
        foreach ($categorie->children as $child) {
            $this->deleteChildren($child);
            $child->delete();
        }
    }*/


    public function show(Category $categorie)
    {
        return view('categories.show', ['categorie' => $categorie]);
    }

    public function create()
    {

        $parents = Category::whereNull('parent_id')->get();
        return view('categories.create',compact('parents'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255|unique:categories',
              'description' => 'required',
              'enabled' => 'boolean',
              'slug' => 'required',
              'properties' => 'nullable',
              'sort_order' => 'required', 'integer',
              'parent_id' =>  ['nullable', 'integer', 'exists:categories,id'],
        ]);
        $categories = new Category([
            'title' => $validatedData['title'],
              'description' => $validatedData['description'],
              'enabled' => isset($validatedData['enabled']) ? $validatedData['enabled'] : false,
              'slug' => $validatedData['slug'],
              'properties' => $validatedData['properties'],
              'sort_order' => $validatedData['sort_order'],
              'parent_id' => $validatedData['parent_id'],

        ]);
        
        $categories->save();
    
        return redirect('/categorie/index');
    }

    public function edit(Category $categorie)
        {
            $parents = Category::whereNull('parent_id')->get();
        return view("categories.edit")
            ->with('status', 'Modification réussie')
            ->with(compact("categorie", "parents"));
        }

        public function update(Request $request, Category $categorie)
        {
          $validatedData = $request->validate([
              'title' => 'required|max:255',
              'description' => 'required',
              'enabled' => 'boolean',
              'slug' => 'required',
              'properties' => 'nullable',
              'sort_order' => 'required', 'integer',
              'parent_id' =>  ['nullable', 'integer', 'exists:categories,id'],
          ]);
      
          $categorie->update([
              'title' => $validatedData['title'],
              'description' => $validatedData['description'],
              'enabled' => isset($validatedData['enabled']) && $validatedData['enabled'] == '1',
              'slug' => $validatedData['slug'],
              'properties' => $validatedData['properties'],
              'sort_order' => $validatedData['sort_order'],
              'parent_id' => $validatedData['parent_id'],
          ]);
                  return redirect('categorie/index');
              }
}
