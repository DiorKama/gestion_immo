<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\FeaturedListingController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\Admin\ListingFileController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('home');
})->name('home');*/

Route::get('/', HomeController::class)->name('home');

require __DIR__.'/auth.php';

Route::get('/annonces', [ListingsController::class, 'index'])/*->where(['id' => '[0-9]+', 'slug' => '[a-z0-9\-]+'])*/->name('listings.index');

Route::get( '/categories-de-biens/{dbCategory}', [ListingsController::class, 'category'])->name('listings.category');

Route::get( '/biens-immobiliers/{slug}/{id}', [ListingsController::class, 'show'])->name('listings.show');

Route::post( '/biens-immobiliers/{listing}/view-phone', [ListingsController::class, 'viewPhone'])->name('listings.view-phone');

Route::post( '/biens-immobiliers/{listing}/view-whatsapp', [ListingsController::class, 'viewWhatsapp'])->name('listings.view-whatsapp');

Route::get('/annonces/recherche', [ListingsController::class, 'search'])->name('listings.search');



Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })/*->middleware(['auth', 'verified'])*/->name('admin.dashboard');

    Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::get('/settings/edit/{setting}', [SettingController::class, 'edit'])->name('admin.settings.edit');
    Route::put('/settings/update/{setting}', [SettingController::class, 'update'])->name('admin.settings.update');

    Route::get('/countries', [CountryController::class, 'index'])->name('admin.countries.index');
    Route::get('/countries/create',  [CountryController::class, 'create'])->name('admin.countries.create');
    Route::post('/countries/store',  [CountryController::class, 'store'])->name('admin.countries.store');
    Route::get('/countries/edit/{country}', [CountryController::class, 'edit'])->name('admin.countries.edit');
    Route::put('/countries/update/{country}', [CountryController::class, 'update'])->name('admin.countries.update');
    Route::delete('/countries/delete/{country}', [CountryController::class, 'destroy'])->name('admin.countries.delete');
    Route::post('/countries/enable/{country}', [CategoryController::class, 'enable'])->name('admin.countries.enable');
    Route::post('/countries/disable/{country}', [CategoryController::class, 'disable'])->name('admin.countries.disable');

    Route::get('/regions', [RegionController::class, 'index'])->name('admin.regions.index');
    Route::get('/regions/create',  [RegionController::class, 'create'])->name('admin.regions.create');
    Route::post('/regions/store',  [RegionController::class, 'store'])->name('admin.regions.store');
    Route::get('/regions/edit/{region}', [RegionController::class, 'edit'])->name('admin.regions.edit');
    Route::put('/regions/update/{region}', [RegionController::class, 'update'])->name('admin.regions.update');
    Route::delete('/regions/delete/{region}', [RegionController::class, 'destroy'])->name('admin.regions.delete');
    Route::post('/regions/enable/{region}', [RegionController::class, 'enable'])->name('admin.regions.enable');
    Route::post('/regions/disable/{region}', [RegionController::class, 'disable'])->name('admin.regions.disable');

    Route::get('/locations', [LocationController::class, 'index'])->name('admin.locations.index');
    Route::get('/locations/create',  [LocationController::class, 'create'])->name('admin.locations.create');
    Route::post('/locations/store',  [LocationController::class, 'store'])->name('admin.locations.store');
    Route::get('/locations/edit/{location}', [LocationController::class, 'edit'])->name('admin.locations.edit');
    Route::put('/locations/update/{location}', [LocationController::class, 'update'])->name('admin.locations.update');
    Route::delete('/locations/delete/{location}', [LocationController::class, 'destroy'])->name('admin.locations.delete');
    Route::post('/locations/enable/{location}', [CategoryController::class, 'enable'])->name('admin.locations.enable');
    Route::post('/locations/disable/{location}', [CategoryController::class, 'disable'])->name('admin.locations.disable');

    Route::get('/listings', [ListingController::class, 'index'])->name('admin.listings.index');
    Route::get('/listings/create/{listing?}',  [ListingController::class, 'createListing'])->name('admin.listings.create');
    Route::post('/listings/store',  [ListingController::class, 'store'])->name('admin.listings.store');
    Route::get('/listings/edit/{listing}',  [ListingController::class, 'edit'])->name('admin.listings.edit');
    Route::put('/listings/update/{listing}',  [ListingController::class, 'update'])->name('admin.listings.update');
    Route::delete('/listings/delete/{listing}', [ListingController::class, 'destroy'])->name('admin.listings.delete');
    Route::post('/listings/enable/{listing}', [ListingController::class, 'enable'])->name('admin.listings.enable');
    Route::post('/listings/disable/{listing}', [ListingController::class, 'disable'])->name('admin.listings.disable');
    Route::get('/listings/download', [ListingController::class, 'download'])->name('admin.listings.download');


    Route::get('/listings/files/{listing}', [ListingFileController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.listings.photos.index');
    Route::get('/listings/files/{listing}/{group}', [ListingFileController::class, 'preview'])->name('admin.listings.photos.previews');
    Route::post('/listings/files/{listing}/{group}', [ListingFileController::class, 'store'])->name('admin.listings.photos.store');
    Route::delete('/listings/files/{listing}/{group}/{file}', [ListingFileController::class, 'delete'])->name('admin.listings.photos.delete');
    /*Route::put('/listings/files/{listing}/sort', [ListingFileController::class, 'sort'])->name('admin.listings.photos.sort');
    Route::put('/listings/files/{listing}/{file}/rotate', [ListingFileController::class, 'sort'])->name('admin.listings.photos.rotate');
    Route::get('/listings/files/{listing}/{file}/download', [ListingFileController::class, 'download'])->name('admin.listings.photos.download');*/

    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create',  [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories/store',  [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/edit/{category}',  [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/update/{category}',  [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/delete/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.delete');
    Route::post('/categories/enable/{category}', [CategoryController::class, 'enable'])->name('admin.categories.enable');
    Route::post('/categories/disable/{category}', [CategoryController::class, 'disable'])->name('admin.categories.disable');

    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create',  [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users/store',  [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/edit/{user}',  [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/update/{user}',  [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/delete/{user}', [UserController::class, 'destroy'])->name('admin.users.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->middleware(['auth'])->name('admin.profile.edit');
    Route::get('/changer-mot-de-passe', [ProfileController::class, 'changePassword'])->middleware(['auth'])->name('admin.profile.update-password');
    Route::patch('/profile', [ProfileController::class, 'update'])->middleware(['auth'])->name('admin.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->middleware(['auth'])->name('admin.profile.destroy');

    Route::get('/banners', [BannerController::class, 'index'])->name('admin.banners.index');
    Route::get('/banners/create',  [BannerController::class, 'create'])->name('admin.banners.create');
    Route::post('/banners/store',  [BannerController::class, 'store'])->name('admin.banners.store');
    Route::get('/banners/edit/{banner}',  [BannerController::class, 'edit'])->name('admin.banners.edit');
    Route::put('/banners/update/{banner}',  [BannerController::class, 'update'])->name('admin.banners.update');
    Route::delete('/banners/delete/{banner}', [BannerController::class, 'destroy'])->name('admin.banners.delete');
    Route::post('/banners/enable/{banner}', [BannerController::class, 'enable'])->name('admin.banners.enable');
    Route::post('/banners/disable/{banner}', [BannerController::class, 'disable'])->name('admin.banners.disable');

    Route::get('ajax/users/autocomplete', [UserController::class, 'autocomplete'])->name('admin.ajax.users.autocomplete');
    Route::get('ajax/categories/autocomplete', [CategoryController::class, 'autocomplete'])->name('admin.ajax.categories.autocomplete');
    Route::get('ajax/countries/autocomplete', [CountryController::class, 'autocomplete'])->name('admin.ajax.countries.autocomplete');
    Route::get('ajax/regions/autocomplete', [RegionController::class, 'autocomplete'])->name('admin.ajax.regions.autocomplete');
    Route::post('ajax/featured-listings/create/{listing}',  [FeaturedListingController::class, 'create'])->name('admin.ajax.featured-listings.create');
    Route::post('ajax/featured-listings/store/{listing}',  [FeaturedListingController::class, 'store'])->name('admin.ajax.featured-listings.store');
    Route::post('ajax/featured-listings/delete/{featuredListing}',  [FeaturedListingController::class, 'close'])->name('admin.ajax.featured-listings.delete');
});
