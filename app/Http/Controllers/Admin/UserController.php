<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.users.index', [
            'users' => $users = User::paginate($request->get('perPage') ?: config('limit'))
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(
        Request $request
    ) {

    }

    public function edit(
        User $user
    ) {
        return view('admin.users.edit');
    }

    public function update(
        Request $request,
        User $user
    ) {

    }

    public function destroy(
        User $user
    ) {

    }

    /*public function search(Request $request)
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
    }*/
}
