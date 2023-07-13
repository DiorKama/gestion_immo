<x-master-layout>
    @section('page-title', __('Ajout un utilisateur'))

    @section('page-header-title', __('Ajout un utilisateur'))

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('admin.users.store') }}" method="post">
                            @csrf

                            <div class="card-header">
                                <h3 class="card-title">{{ __('Ajouter un utilisateur') }}</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        Erreur survenue. Merci de réessayer !
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>{{ __('Prénom') }}</label>
                                    <input type="text" name="firstName" class="form-control @error('firstName') is-invalid @enderror" value="{{ old('firstName') }}" placeholder="{{ __('Votre prénom ...') }}" required>
                                    @error("firstName")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Nom') }}</label>
                                    <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" value="{{ old('lastName') }}" placeholder="{{ __('Votre prénom ...') }}" required>
                                    @error("lastName")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('E-mail') }}</label>
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="{{ __('Votre E-mail ...') }}" required>
                                    @error("email")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Indicatif du pays') }}</label>
                                    <select class="form-control @error('mobile_number_country') is-invalid @enderror" name="mobile_number_country">
                                        @foreach ($_countryCodes as $countryIso => $countryCode)
                                            <option value="{{ $countryIso }}" @selected(old('mobile_number_country') == $countryIso)>
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
                                    <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('mobile_number') }}" placeholder="{{ __('77 xxx xxx ...') }}" required>
                                    @error("phone_number")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Mot de passe') }}</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="{{ __('Votre mot de passe ...') }}" required>
                                    @error("password")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{--<div class="form-check">
                                    <input type="checkbox" name="" class="form-check-input">
                                    <label class="form-check-label">{{ __('Compte vérifié') }}</label>
                                </div>--}}
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Ajouter') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master-layout>
