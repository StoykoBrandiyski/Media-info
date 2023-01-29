<?php

namespace App\Providers;

use App\Contracts\CategoryContract;
use App\Contracts\CommentContract;
use App\Contracts\MovieContract;
use App\Contracts\UserContract;
use App\Repositories\CategoryRepository;
use App\Repositories\CommentRepository;
use App\Repositories\MovieRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        UserContract::class          =>          UserRepository::class,
        MovieContract::class         =>          MovieRepository::class,
        CommentContract::class       =>          CommentRepository::class,
        CategoryContract::class      =>          CategoryRepository::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }
}