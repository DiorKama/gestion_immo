<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">
            {{ __('Tableau de board') }}
        </a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <div class="nav-item dropdown mr-5">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->firstName }}
          </a>
        <div class="dropdown-menu dropdown-menu-end pb-3" style="font-size: 14px;  height: 12vh; width: 5vw;" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                  {{ __('Log Out') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
      </div>
    </ul>
  </nav>
