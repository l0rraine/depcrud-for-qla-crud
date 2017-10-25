<?php

namespace Qla\DepCRUD;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class DepCRUDServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // LOAD THE VIEWS
        // - first the published views (in case they have any changes)
        $this->loadViewsFrom(resource_path('views/vendor/qla/depcrud'), 'depcrud');
        // - then the stock views that come with the package, in case a published view might be missing
        $this->loadViewsFrom(realpath(__DIR__.'/resources/views'), 'depcrud');


        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/qla/depcrud'),
            __DIR__.'/database/migrations' => database_path('migrations'),
        ], 'qla');

    }

    public function setupRoutes(Router $router)
    {
        $router->group(['namespace' => 'Qla\DepCRUD\app\Http\Controllers'], function ($router) {
            \Route::group(['prefix' => config('qla.base.route_prefix', 'manager'), 'middleware' => config('qla.base.admin_auth_middleware',['web'])], function () {
                require __DIR__.'/routes/depcrud.php';
            });
        });
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->setupRoutes($this->app->router);
    }
}
