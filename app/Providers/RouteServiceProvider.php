<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Country;
use App\Models\File;
use App\Models\Listing;
use App\Models\Location;
use App\Models\Region;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/admin/dashboard';

    /**
     * @var string[]
     */
    protected $models = [
        'country' => Country::class,
        'region' => Region::class,
        'location' => Location::class,
        'category' => Category::class,
        'listing' => Listing::class,
        'banner' => Banner::class,
        'user' => User::class,
        'file' => File::class,
    ];

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        /** @var Router $router */
        $router = $this->app['router'];

        collect($this->models)
            ->each(
                function ($className, $model) use ($router) {
                    $router->model($model, $className);
                }
            );
    }
}
