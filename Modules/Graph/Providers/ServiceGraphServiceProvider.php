<?php

namespace Modules\Graph\Providers;

use Illuminate\Support\ServiceProvider;

use Modules\Graph\Http\Services\GraphServiceInterface;
use Modules\Graph\Http\Services\GraphService;
class ServiceGraphServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            GraphServiceInterface::class,GraphService::class
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
