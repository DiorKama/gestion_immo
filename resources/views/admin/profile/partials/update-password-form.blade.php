<div class="card">
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="card-header">
            <h3 class="card-title">{{ __('Modifier mon mot de passe') }}</h3>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show p-3" role="alert">
                    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('status') }}
                </div>
            @endif

            <div class="form-group">
                <x-input-label for="current_password" :value="__('Mot de passe actuel')" />
                <x-text-input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            <div class="form-group">
                <x-input-label for="password" :value="__('Nouveau mot de passe')" />
                <x-text-input id="password" name="password" type="password" class="form-control" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <div class="form-group">
                <x-input-label for="password_confirmation" :value="__('Confirmer le nouveau mot de passe')" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>
        </div>
        <div class="card-footer">
            <x-primary-button class="bnt bnt-primary">{{ __('Modifier') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('update_pass.saved') }}</p>
            @endif
        </div>
    </form>
</div>


