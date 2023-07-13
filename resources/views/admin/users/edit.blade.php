<x-master-layout>
    @section('page-title', __('Modifier un utilisateur'))

    @section('page-header-title', __('Modifier :userFullName', [
        'userFullName' => $user->full_name
    ]))

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('admin.users.update', $user) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="card-header">
                                <h3 class="card-title">{{ __('Modifier :userFullName', [
                                    'userFullName' => $user->full_name
                                ]) }}</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        Erreur survenue. Merci de réessayer !
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>{{ __('Prénom') }}</label>
                                    <input type="text" name="firstName" class="form-control @error('firstName') is-invalid @enderror" value="{{ old('firstName', $user->firstName) }}" placeholder="{{ __('Votre prénom ...') }}" required>
                                    @error("firstName")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Nom') }}</label>
                                    <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" value="{{ old('lastName', $user->lastName) }}" placeholder="{{ __('Votre prénom ...') }}" required>
                                    @error("lastName")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('E-mail') }}</label>
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" placeholder="{{ __('Votre E-mail ...') }}" required>
                                    @error("email")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Indicatif du pays') }}</label>
                                    <select class="form-control @error('mobile_number_country') is-invalid @enderror" name="mobile_number_country">
                                        @foreach ($_countryCodes as $countryIso => $countryCode)
                                            <option value="{{ $countryIso }}" @selected(old('mobile_number_country', $user->mobile_number_country) == $countryIso)>
                                                {{ $countryCode }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error("mobile_number_country")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Numéro de téléphone') }}</label>
                                    <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('mobile_number', $user->phone_number_national) }}" placeholder="{{ __('77 xxx xxx ...') }}" required>
                                    @error("phone_number")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Modifier') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master-layout>
