<?php

namespace App\Providers;

use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Eloquent\CommentRepository;
use App\Repository\Eloquent\PostRepository;
use App\Repository\Eloquent\TagRepository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\ICategoryRepository;
use App\Repository\ICommentRepository;
use App\Repository\IEloquentRepository;
use App\Repository\IPostRepository;
use App\Repository\ITagRepository;
use App\Repository\IUserRepository;
use App\Services\CategoryService;
use App\Services\CommentService;
use App\Services\ICategoryService;
use App\Services\ICommentService;
use App\Services\IPostService;
use App\Services\ITagService;
use App\Services\IUserService;
use App\Services\PostService;
use App\Services\TagService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IEloquentRepository::class, BaseRepository::class);
        $this->app->bind(IPostRepository::class, PostRepository::class);
        $this->app->bind(ITagRepository::class, TagRepository::class);
        $this->app->bind(ICategoryRepository::class, CategoryRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(ICommentRepository::class, CommentRepository::class);


        $this->app->bind(ITagService::class, TagService::class);
        $this->app->bind(ICategoryService::class, CategoryService::class);
        $this->app->bind(IPostService::class, PostService::class);
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(ICommentService::class, CommentService::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
