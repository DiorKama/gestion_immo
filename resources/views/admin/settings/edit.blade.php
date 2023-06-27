<x-master-layout>
    @section('page-title', __('Mettre à jour les paramètres'))

    @section('page-header-title', __('Mettre à jour les paramètres'))

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('admin.settings.update', [
                            'setting' => $setting->id
                        ]) }}" method="post" enctype="multipart/form-data">

                            @method('PUT')
                            @csrf

                            <div class="card-header">
                                <h3 class="card-title">{{ __('Modifier les paramètres du site') }}</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        Erreur survenue. Merci de réessayer !
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>{{ __('Nom de l\'agence') }}</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $setting->name }}" placeholder="{{ __('Nom de l\'agence') }}" required>
                                    @error("name")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Slogan') }}</label>
                                    <input type="text" name="slogan" class="form-control @error('slogan') is-invalid @enderror" value="{{ old('slogan') ?? $setting->slogan }}" placeholder="{{ __('Partagez votre slogan ...') }}">
                                    @error("slogan")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('À propos de l\'agence') }}</label>
                                    <textarea class="form-control @error('about') is-invalid @enderror" name="about" rows="3" placeholder="{{ __('Parlez nous de votre agence ....') }}" required>{{ old('about') ?? $setting->about }}</textarea>
                                    @error("about")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Adresse de l\'agence') }}</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" name="address" rows="3" placeholder="{{ __('Où se trouve votre agence ....') }}" required>{{ old('address') ?? $setting->address }}</textarea>
                                    @error("address")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('N° de téléphone') }}</label>
                                    <input type="text" name="phone_number" value="{{ old('phone_number') ?? $setting->phone_number }}" class="form-control @error('phone_number') is-invalid @enderror" placeholder="{{ __('+22133...') }}">
                                    @error("phone_number")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('N° de téléphone mobile') }}</label>
                                    <input type="text" name="mobile_number" value="{{ old('mobile_number') ?? $setting->mobile_number }}" class="form-control @error('mobile_number') is-invalid @enderror" placeholder="{{ __('+22177...') }}"
                                    >
                                    @error("mobile_number")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" name="is_whatsapp_available" class="form-check-input">
                                    <label class="form-check-label">{{ __('Ce numéro fonction sur WhatsApp') }}</label>
                                </div>

                                <div class="form-group">
                                    <label>{{ __('E-mail de contact') }}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ old('email') ?? $setting->email }}" placeholder="{{ __('xyz@exemple.com') }}">
                                    @error("email")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Site web') }}</label>
                                    <input type="url" name="website_url" value="{{ old('website_url') ?? $setting->website_url }}" class="form-control @error('website_url') is-invalid @enderror" placeholder="{{ __('https://exemple.com') }}">
                                    @error("website_url")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Facebook') }}</label>
                                    <input type="url" name="facebook_url" value="{{ old('facebook_url') ?? $setting->facebook_url }}" class="form-control @error('facebook_url') is-invalid @enderror" placeholder="{{ __('https://www.facebook.com/...') }}">
                                    @error("slogan")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Twitter') }}</label>
                                    <input type="url" name="twitter_url" value="{{ old('twitter_url') ?? $setting->twitter_url }}" class="form-control @error('twitter_url') is-invalid @enderror" placeholder="{{ __('https://twitter.com/...') }}">
                                    @error("twitter_url")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Instagram') }}</label>
                                    <input type="url" name="instagram_url" value="{{ old('instagram_url') ?? $setting->instagram_url }}" class="form-control @error('instagram_url') is-invalid @enderror" placeholder="{{ __('https://www.instagram.com/...') }}">
                                    @error("instagram_url")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('LinkedIn') }}</label>
                                    <input type="url" name="linkedin_url" value="{{ old('linkedin_url') ?? $setting->linkedin_url }}" class="form-control @error('linkedin_url') is-invalid @enderror" placeholder="h{{ __('ttps://www.linkedin.com/company/...') }}">
                                    @error("linkedin_url")
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
