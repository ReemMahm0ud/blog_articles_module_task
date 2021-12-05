<?php

namespace Modules\Article\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Article\Repositories\Interfaces\BaseRepositoryInterface;


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
        $this->app->bind(BaseRepositoryInterface::class);
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
