<div class="card">
    <form method="post" action="{{ route('admin.profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="card-header">
            <h3 class="card-title">{{ __('Modifier mon profil') }}</h3>
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
                <x-input-label for="firstName" :value="__('FirstName')" />
                <x-text-input id="firstName" name="firstName" type="text" class="form-control" :value="old('firstName', $user->firstName)" required autofocus autocomplete="firstName" />
                <x-input-error class="mt-2" :messages="$errors->get('firstName')" />
            </div>

            <div class="form-group">
                <x-input-label for="lastName" :value="__('LastName')" />
                <x-text-input id="lastName" name="lastName" type="text" class="form-control" :value="old('lastName', $user->lastName)" required autofocus autocomplete="lastName" />
                <x-input-error class="mt-2" :messages="$errors->get('lastName')" />
            </div>

            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="form-control" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __('update_user.text2') }}

                            <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('update_user.text3') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __('update_user.text4') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
        <div class="card-footer">
            <x-primary-button>{{ __('Modifier') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('update_user.saved') }}</p>
            @endif
        </div>
    </form>
</div>

