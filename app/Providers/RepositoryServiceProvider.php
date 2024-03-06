<?php

namespace App\Providers;

use App\Interfaces\RepositoryInterface;
use App\Repositories\RepositoryAbstract;
use App\Repositories\Student\StudentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->bind(
            RepositoryAbstract::class,
            RepositoryInterface::class,
            StudentRepository::class,
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
