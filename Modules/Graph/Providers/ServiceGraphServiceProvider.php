<?php

namespace Modules\Graph\Providers;

use Illuminate\Support\ServiceProvider;

use Modules\Graph\Http\Services\GraphServiceInterface;
use Modules\Graph\Http\Services\GraphService;

use Modules\Graph\Http\Services\NodeServiceInterface;
use Modules\Graph\Http\Services\NodeService;

use Modules\Graph\Http\Services\RelationServiceInterface;
use Modules\Graph\Http\Services\RelationService;
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

        $this->app->bind(
            NodeServiceInterface::class,NodeService::class
        );

        $this->app->bind(
            RelationServiceInterface::class,RelationService::class
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
