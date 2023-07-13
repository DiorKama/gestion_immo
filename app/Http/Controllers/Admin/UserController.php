<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\CountryService;
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
        return view('admin.users.create', [
            '_countryCodes' => resolve(CountryService::class)->getAreaCodesAsLookup()
        ]);
    }

    public function store(
        StoreUserRequest $request
    ) {
        $user = User::create($request->validated());
        return redirect()
            ->route('admin.users.index')
            ->withMessage(__(':userFullName a été ajouté avec succès !', [
                'userFullName' => $user->full_name
            ]));
    }

    public function edit(
        User $user
    ) {
        $_countryCodes = resolve(CountryService::class)->getAreaCodesAsLookup();
        return view('admin.users.edit', compact(
            'user',
            '_countryCodes'
        ));
    }

    public function update(
        UpdateUserRequest $request,
        User $user
    ) {
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if ( $user->save() ) {
            return redirect()
                ->route('admin.users.index')
                ->withMessage(__('Le compte de :userFullName a été mis à jour.', [
                    'userFullName' => $user->full_name
                ]));
        }

        return back()
            ->withMessage(__('Erreur survenue. Merci de réessayer.'));
    }

    public function destroy(
        User $user
    ) {
        if ($user->delete() ) {
            return redirect()
                ->route('admin.users.index')
                ->withMessage(__('Suppression de compte avec succès.'));
        }

        return redirect()
            ->route('admin.users.index')
            ->withMessage(__('Erreur survenue. Merci de réessayer.'));
    }
}
