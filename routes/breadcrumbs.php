<?php

use App\Models\Category;
use App\Models\Country;
use App\Models\Listing;
use App\Models\Location;
use App\Models\Region;
use App\Models\Setting;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Admin Dashboard
Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push(__('Tableau de board'), route('admin.dashboard'));
});

// Settings
Breadcrumbs::for('admin.settings.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Paramètres du site'), route('admin.settings.index'));
});

Breadcrumbs::for('admin.settings.edit', function (BreadcrumbTrail $trail, Setting $setting) {
    $trail->parent('admin.settings.index');
    $trail->push(__('Mettre à jour les paramètres'), route('admin.settings.edit', $setting));
});

// Countries
Breadcrumbs::for('admin.countries.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Tous les pays'), route('admin.countries.index'));
});

Breadcrumbs::for('admin.countries.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.countries.index');
    $trail->push(__('Ajouter un nouveau pays'), route('admin.countries.create'));
});

Breadcrumbs::for('admin.countries.edit', function (BreadcrumbTrail $trail, Country $country) {
    $trail->parent('admin.countries.index');
    $trail->push($country->title, route('admin.countries.edit', $country));
});

// Regions
Breadcrumbs::for('admin.regions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Regions'), route('admin.regions.index'));
});

Breadcrumbs::for('admin.regions.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.regions.index');
    $trail->push(__('Ajouter une nouvelle region'), route('admin.regions.create'));
});

Breadcrumbs::for('admin.regions.edit', function (BreadcrumbTrail $trail, Region $region) {
    $trail->parent('admin.regions.index');
    $trail->push($region->title, route('admin.regions.edit', $region));
});

// Locations
Breadcrumbs::for('admin.locations.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Toutes les localités'), route('admin.locations.index'));
});

Breadcrumbs::for('admin.locations.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.locations.index');
    $trail->push(__('Ajouter un nouvelle localité'), route('admin.locations.create'));
});

Breadcrumbs::for('admin.locations.edit', function (BreadcrumbTrail $trail, Location $location) {
    $trail->parent('admin.locations.index');
    $trail->push($location->title, route('admin.locations.edit', $location));
});

// Categories
Breadcrumbs::for('admin.categories.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Toutes les catégories'), route('admin.categories.index'));
});

Breadcrumbs::for('admin.categories.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.categories.index');
    $trail->push(__('Ajouter un nouvelle catégorie'), route('admin.categories.create'));
});

Breadcrumbs::for('admin.categories.edit', function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('admin.categories.index');
    $trail->push($category->title, route('admin.categories.edit', $category));
});

// Listings
Breadcrumbs::for('admin.listings.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Tous les bien immobiliers'), route('admin.listings.index'));
});

Breadcrumbs::for('admin.listings.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.listings.index');
    $trail->push(__('Ajouter un nouvelle annonce'), route('admin.listings.create'));
});

Breadcrumbs::for('admin.listings.edit', function (BreadcrumbTrail $trail, Listing $listing) {
    $trail->parent('admin.listings.index');
    $trail->push($listing->title, route('admin.listings.edit', $listing));
});

// users
Breadcrumbs::for('admin.users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Tous les utilisateurs'), route('admin.users.index'));
});

Breadcrumbs::for('admin.users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.users.index');
    $trail->push(__('Ajouter un utilisateur'), route('admin.users.create'));
});

Breadcrumbs::for('admin.users.edit', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('admin.users.index');
    $trail->push($user->full_name, route('admin.users.edit', $user));
});
