<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Symfony\Component\Finder\Finder;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     * @param \Illuminate\Routing\Router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);
        $this->mapApiRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     * @param \Illuminate\Routing\Router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group($this->getWebDefaultGroup(), function ($router) {
            $this->requireWebRoutes($router);
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Returns the Default Group for Routes.
     *
     * @return array
     */
    protected function getWebDefaultGroup()
    {
        return [
            'namespace' => $this->namespace,
            'middleware' => 'web'
        ];
    }

    /**
     * Requires all of the Files for Web Routes.
     *
     * @param  \Illuminate\Routing\Router  $router
     *
     * @return void
     */
    protected function requireWebRoutes(Router $router)
    {
        $files = Finder::create()->in(base_path('routes'))->name('*.php');
        $this->required($files);
    }

    /**
     * Requires the specified Files.
     *
     * @param  array  $files  The specified Files.
     *
     * @return void
     */
    protected function required($files)
    {
        foreach($files as $file)
            require $file->getRealPath();
    }
}
