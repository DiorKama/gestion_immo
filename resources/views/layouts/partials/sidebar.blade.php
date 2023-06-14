<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link text-decoration-none">
      <img src="/images/expat.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Gestion Immo</span>
    </a>
<div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Categorie
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('categorie.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste Categorie</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('categorie.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajout Categorie</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Options
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('option.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listes Options</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('option.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajout Option</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Biens Immobilier
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('listing.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listes Biens</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('listing.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajout Biens</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Gérer les images
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('file.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste des images</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('file.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajout des images</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
</aside>