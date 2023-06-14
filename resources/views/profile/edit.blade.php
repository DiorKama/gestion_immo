<x-master-layout>
<div class="card card-primary mt-5 py-2">
  <div class="card-header">
    <h3 class="card-title">{{ __('update_user.update') }}</h3>
  </div>
    @include('profile.partials.update-profile-information-form')
</div>

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">{{ __('update_pass.update') }}</h3>
  </div>
  @include('profile.partials.update-password-form')
</div>

    {{--<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </div>--}}
</div>
    </div>

    
<!-- /.card -->
</x-master-layout>
