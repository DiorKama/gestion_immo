<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategorieController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/categorie/index', [CategorieController::class, 'index'])->name('categorie.index');
Route::get('/categorie/delete/{categorie}', [CategorieController::class, 'delete'])->name('categorie.delete');
Route::get('/categorie/show/{categorie}',  [CategorieController::class, 'show'])->name('categorie.show');
Route::get('/categorie/create',  [CategorieController::class, 'create'])->name('categorie.create');
Route::post('/categorie/store',  [CategorieController::class, 'store'])->name('categorie.store');
Route::get('/categorie/edit/{categorie}',  [CategorieController::class, 'edit'])->name('categorie.edit');
Route::put('/categorie/update/{categorie}',  [CategorieController::class, 'update'])->name('categorie.update');

//settings
Route::get('settings/edit', [SettingController::class, 'edit'])->name('settings.edit');
Route::post('settings/update', [SettingController::class, 'update'])->name('settings.update');

//options
Route::get('/option/index', [OptionController::class, 'index'])->name('option.index');
Route::get('/option/delete/{option}', [OptionController::class, 'delete'])->name('option.delete');
Route::get('/option/show/{option}',  [OptionController::class, 'show'])->name('option.show');
Route::get('/option/edit/{option}',  [OptionController::class, 'edit'])->name('option.edit');
Route::put('/option/update/{option}',  [OptionController::class, 'update'])->name('option.update');
Route::get('/option/create',  [OptionController::class, 'create'])->name('option.create');
Route::post('/option/store',  [OptionController::class, 'store'])->name('option.store');


// users
Route::get('/ajax/user/autocomplete', [UserController::class, 'search'])->name('listing.ajax.user.autocomplete');

//listings
Route::get('/listing/create',  [ListingController::class, 'create'])->name('listing.create');
Route::post('/listing/store',  [ListingController::class, 'store'])->name('listing.store');
Route::get('/listing/index', [ListingController::class, 'index'])->name('listing.index');
Route::get('/listing/show/{listing}',  [ListingController::class, 'show'])->name('listing.show');
Route::get('/listing/edit/{listing}',  [ListingController::class, 'edit'])->name('listing.edit');
Route::put('/listing/update/{listing}',  [ListingController::class, 'update'])->name('listing.update');
Route::get('/listing/delete/{listing}', [ListingController::class, 'delete'])->name('listing.delete');

//files
Route::get('/file/create',  [FileController::class, 'create'])->name('file.create');
Route::post('/file/store',  [FileController::class, 'store'])->name('file.store');
Route::get('/file/index', [FileController::class, 'index'])->name('file.index');
Route::get('/file/show/{file}',  [FileController::class, 'show'])->name('file.show');
Route::get('/file/edit/{file}',  [FileController::class, 'edit'])->name('file.edit');
Route::put('file/update/{id}', [FileController::class, 'update'])->name('file.update');
Route::get('/file/delete/{file}', [FileController::class, 'delete'])->name('file.delete');

Route::prefix('admin')->group(function () {
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('/settings/edit/{setting}', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings/update/{setting}', [SettingController::class, 'update'])->name('settings.update');

    Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
    Route::get('/countries/create',  [CountryController::class, 'create'])->name('countries.create');
    Route::post('/countries/store',  [CountryController::class, 'store'])->name('countries.store');
    Route::get('/countries/edit/{country}', [CountryController::class, 'edit'])->name('countries.edit');
    Route::put('/countries/update/{country}', [CountryController::class, 'update'])->name('countries.update');
    Route::delete('/countries/delete/{country}', [CountryController::class, 'destroy'])->name('countries.delete');

    Route::get('/regions', [RegionController::class, 'index'])->name('regions.index');
    Route::get('/regions/create',  [RegionController::class, 'create'])->name('regions.create');
    Route::post('/regions/store',  [RegionController::class, 'store'])->name('regions.store');
    Route::get('/regions/edit/{region}', [RegionController::class, 'edit'])->name('regions.edit');
    Route::put('/regions/update/{region}', [RegionController::class, 'update'])->name('regions.update');
    Route::delete('/regions/delete/{region}', [RegionController::class, 'destroy'])->name('regions.delete');

    Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
    Route::get('/locations/create',  [LocationController::class, 'create'])->name('locations.create');
    Route::post('/locations/store',  [LocationController::class, 'store'])->name('locations.store');
    Route::get('/locations/edit/{location}', [LocationController::class, 'edit'])->name('locations.edit');
    Route::put('/locations/update/{location}', [LocationController::class, 'update'])->name('locations.update');
    Route::delete('/locations/delete/{location}', [LocationController::class, 'destroy'])->name('locations.delete');
});
