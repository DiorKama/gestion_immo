<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
            {{ __('Tableau de board') }}
        </a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @auth
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="javascript:;" role="button" data-toggle="dropdown">
                    <i class="fas fa-user"></i>
                    {{ Auth::user()->firstName }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <a
                            class="dropdown-item"
                            href="{{ route('admin.profile.edit') }}"
                        >
                            {{ __('Modifier mon profil') }}
                        </a>
                    </li>

                    <li>
                        <a
                            class="dropdown-item"
                            href="{{ route('admin.profile.update-password') }}"
                        >
                            {{ __('Changer le mot de passe') }}
                        </a>
                    </li>

                    {{--<div class="dropdown-divider"></div>--}}

                    {{--<a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                          {{ __('Déconnexion') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>--}}
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                >
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        @endauth

        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">
                    {{ __('Se connecter') }}
                </a>
            </li>
        @endguest
    </ul>
  </nav>
