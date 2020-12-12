<?php

namespace Modules\Graph\Providers;

use Illuminate\Support\ServiceProvider;

use Modules\Graph\Http\Repositories\GraphRepositoryInterface;
use Modules\Graph\Http\Repositories\GraphRepository;
use Modules\Graph\Http\Repositories\NodeRepositoryInterface;
use Modules\Graph\Http\Repositories\NodeRepository;
use Modules\Graph\Http\Repositories\RelationRepositoryInterface;
use Modules\Graph\Http\Repositories\RelationRepository;

class RepositoryServiceProvider extends ServiceProvider
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
            GraphRepositoryInterface::class,GraphRepository::class
        );

        $this->app->bind(
            NodeRepositoryInterface::class,NodeRepository::class
        );

        $this->app->bind(
            RelationRepositoryInterface::class,RelationRepository::class
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
