<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function search(Request $request)
    {
        $term = $request->input('term');
        $users = User::where('firstName', 'LIKE', '%'.$term.'%')->get();
        $suggestions = [];
    
        foreach ($users as $user) {
            $suggestions[] = [
                'value' => $user->firstName.' '.$user->lastName,
                'data' => $user->id
            ];
        }
        return response()->json($suggestions);
    }
}
