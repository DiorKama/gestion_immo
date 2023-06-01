<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <x-header-immo>

        </x-header-immo>

        <title>Laravel</title>

        <!-- Fonts -->
        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />        
    </head>
<body class="">
<nav class="navbar navbar-expand-lg bg-white py-3 shadow-sm fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">Bootstrap
        </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse"                              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
               <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
               </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
            </li>
            </ul>
        <div class="d-flex">

         @if (Route::has('login'))
         @auth
         <a href="{{ url('/dasboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
         @else
           <a href="{{ route('login') }}" class='btn btn-outline-infos rounded-pill'>
           <i class='fa fa-user me-1'></i>
           {{__('Connexion')}}
           </a>
           @if (Route::has('register'))
           <a href="{{ route('register') }}" class='btn btn-outline-infos rounded-pill ms-2'>
           <i class='fa fa-user-plus me-1'></i>
           {{__('Inscription')}}
           </a>
           @endif
           @endauth
       
           @endif
        </div>
       </div>
     </div>
   </nav> 
    <x-body-immo>

    </x-body-immo>   
  </body>
</html>
