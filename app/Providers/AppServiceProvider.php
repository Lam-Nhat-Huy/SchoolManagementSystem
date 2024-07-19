<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Repositories\Interfaces\SubjectRepositoryInterface;
use App\Repositories\SubjectRepository;
use App\Services\Interfaces\SubjectServiceInterface;
use App\Services\SubjectService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
