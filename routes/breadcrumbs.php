<?php

use App\Models\Category;
use App\Models\Country;
use App\Models\Listing;
use App\Models\Location;
use App\Models\Region;
use App\Models\Setting;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Admin Dashboard
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(__('Tableau de board'), route('dashboard'));
});

// Settings
Breadcrumbs::for('settings.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Paramètres du site'), route('settings.index'));
});

Breadcrumbs::for('settings.edit', function (BreadcrumbTrail $trail, Setting $setting) {
    $trail->parent('settings.index');
    $trail->push(__('Mettre à jour les paramètres'), route('settings.edit', $setting));
});

// Countries
Breadcrumbs::for('countries.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Tous les pays'), route('countries.index'));
});

Breadcrumbs::for('countries.create', function (BreadcrumbTrail $trail) {
    $trail->parent('countries.index');
    $trail->push(__('Ajouter un nouveau pays'), route('countries.create'));
});

Breadcrumbs::for('countries.edit', function (BreadcrumbTrail $trail, Country $country) {
    $trail->parent('countries.index');
    $trail->push($country->title, route('countries.edit', $country));
});

// Regions
Breadcrumbs::for('regions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Regions'), route('regions.index'));
});

Breadcrumbs::for('regions.create', function (BreadcrumbTrail $trail) {
    $trail->parent('regions.index');
    $trail->push(__('Ajouter une nouvelle region'), route('regions.create'));
});

Breadcrumbs::for('regions.edit', function (BreadcrumbTrail $trail, Region $region) {
    $trail->parent('regions.index');
    $trail->push($region->title, route('regions.edit', $region));
});

// Locations
Breadcrumbs::for('locations.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Toutes les localités'), route('locations.index'));
});

Breadcrumbs::for('locations.create', function (BreadcrumbTrail $trail) {
    $trail->parent('locations.index');
    $trail->push(__('Ajouter un nouvelle localité'), route('locations.create'));
});

Breadcrumbs::for('locations.edit', function (BreadcrumbTrail $trail, Location $location) {
    $trail->parent('locations.index');
    $trail->push($location->title, route('locations.edit', $location));
});

// Categories
Breadcrumbs::for('categories.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Toutes les catégories'), route('categories.index'));
});

Breadcrumbs::for('categories.create', function (BreadcrumbTrail $trail) {
    $trail->parent('categories.index');
    $trail->push(__('Ajouter un nouvelle catégorie'), route('categories.create'));
});

Breadcrumbs::for('categories.edit', function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('categories.index');
    $trail->push($category->title, route('categories.edit', $category));
});

// Listings
Breadcrumbs::for('listings.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Tous les bien immobiliers'), route('listings.index'));
});

Breadcrumbs::for('listings.create', function (BreadcrumbTrail $trail) {
    $trail->parent('listings.index');
    $trail->push(__('Ajouter un nouvelle annonce'), route('listings.create'));
});

Breadcrumbs::for('listings.edit', function (BreadcrumbTrail $trail, Listing $listing) {
    $trail->parent('listings.index');
    $trail->push($listing->title, route('listings.edit', $listing));
});

