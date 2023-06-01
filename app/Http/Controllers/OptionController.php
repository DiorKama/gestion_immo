<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index(){
        $options = Option::paginate(5);
        return view('options.index', ['options' => $options]); 
     }

     public function delete(Option $option)
        {
            $option->delete();
            return redirect()->route('option.index');
        }

        public function show(Option $option)
    {
        return view('options.show', ['option' => $option]);
    }

    public function create()
    {
        return view('options.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|max:255',
        ]);
        $options = new Option([
            'libelle' => $validatedData['libelle'],
        ]);
        
        $options->save();
    
        return redirect('/option/index');
    }

    public function edit(Option $option)
        {
            return view(
                'options.edit',
                [
                    'option' => $option,
                ]
            );
        }

        public function update(Request $request, Option $option)
        {
          $validatedData = $request->validate([
              'libelle' => 'required|max:255',
          ]);
          $option->update([
              'libelle' => $validatedData['libelle'],
          ]);
      
                  return redirect('option/index');
              }   
}
