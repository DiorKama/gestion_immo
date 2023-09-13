<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\AbstractEntity;
use App\Models\User;
use App\Services\CountryService;
use App\UseCases\RegisterUser;
use App\UseCases\UpdateUser;
use Illuminate\Http\Request;

class UserController extends AbstractAdminController
{
    /**
     * @param User $user
     */
    public function __construct(
        User $user
    ) {
        parent::__construct($user);
        $this->middleware('auth');
    }

    /*public function index(Request $request)
    {
        return view('admin.users.index', [
            'users' => $users = User::paginate($request->get('perPage') ?: config('limit'))
        ]);
    }*/

    public function create()
    {
        return view('admin.users.create', [
            '_countryCodes' => resolve(CountryService::class)->getAreaCodesAsLookup()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function store(
        $request = null,
        $useCase = null
    ) {
        return parent::store(
            $request,
            resolve(RegisterUser::class)
        );
    }

    public function edit(
        AbstractEntity $user
    ) {
        $_countryCodes = resolve(CountryService::class)->getAreaCodesAsLookup();
        return view('admin.users.edit', compact(
            'user',
            '_countryCodes'
        ));
    }

    /**
     * @param AbstractEntity $entity
     * @param null $request
     * @param null $useCase
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(
        AbstractEntity $entity,
        $request = null,
        $useCase = null
    ) {
        return parent::update(
            $entity,
            resolve(UpdateUserRequest::class),
            resolve(UpdateUser::class)
        );
    }

    /*

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
    }*/
}
