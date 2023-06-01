<x-master-layout>
<x-header-immo>
</x-header-immo>
<div class="container mt-5 pt-4">
<div class="card bg-primary">
 <h3 class="card-title text-center">Paramétrage de l'Agence</h3>
  </div>
<form method="POST" action="{{ route('settings.update') }}">
    @csrf
    <!-- Ajoutez ici les champs de formulaire pour chaque valeur de configuration que vous souhaitez modifier -->
    <div class="row">
    <div class="col-12">
    <div class="form-group">
        <label for="nameAgence">Nom de l'Agence</label>
        <input type="text" class="form-control" id="nameAgence" name="nameAgence" value="{{ $settings['nameAgence'] }}">
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-12">
    <div class="form-group">
        <label for="logo">Logo</label>
        <input type="text" class="form-control" id="logo" name="logo" value="{{ $settings['logo'] }}">
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-12">
    <div class="form-group">
        <label for="adress">Adrese</label>
        <input type="text" class="form-control" id="adress" name="adress" value="{{ $settings['adress'] }}">
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-12">
    <div class="form-group">
        <label for="mobile_number">Telephone</label>
        <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ $settings['mobile_number'] }}">
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-12">
    <div class="form-group">
        <label for="phone_number">Fixe</label>
        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $settings['phone_number'] }}">
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-12">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ $settings['email'] }}">
    </div>
    </div>
    </div>
    
    <div class="row">
    <div class="col-12">
    <div class="form-group">
        <label for="facebook_url">Facebook</label>
        <input type="text" class="form-control" id="facebook_url" name="facebook_url" value="{{ $settings['facebook_url'] }}">
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-12">
    <div class="form-group">
        <label for="twitter_url">Twetter</label>
        <input type="text" class="form-control" id="twitter_url" name="twitter_url" value="{{ $settings['twitter_url'] }}">
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-12">
    <div class="form-group">
        <label for="instagram_url">Instagram</label>
        <input type="text" class="form-control" id="instagram_url" name="instagram_url" value="{{ $settings['instagram_url'] }}">
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-12">
    <div class="form-group">
        <label for="linkedin_url">Linkedin</label>
        <input type="text" class="form-control" id="linkedin_url" name="linkedin_url" value="{{ $settings['linkedin_url'] }}">
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-12">
    <div class="form-group">
        <label for="whatsapp_number">Whatsapp</label>
        <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number" value="{{ $settings['whatsapp_number'] }}">
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-12">
    <div class="form-group">
        <label for="about">A Propos</label>
        <textarea type="text" class="form-control" id="about" name="about" value="{{ $settings['about'] }}">{{ $settings['about'] }}</textarea>
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-12">
    <div class="form-group">
        <label for="slogan">Slogan</label>
        <input type="text" class="form-control" id="slogan" name="slogan" value="{{ $settings['slogan'] }}">
    </div>
    </div>
    </div>
    <!-- ... autres champs de formulaire ... -->
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
</div>
<x-body-immo>
</x-body-immo>
</x-master-layout>
