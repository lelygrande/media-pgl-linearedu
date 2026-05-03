<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Helpers\ProgressSidebarHelper;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        View::composer('*', function ($view) {
        if (!auth()->check()) {
            $view->with([
                'unlockedSlugs' => ['subbab-a1'],
                'passedQuizIds' => [],
                'canAccessQuizA' => false,
                'canAccessQuizB' => false,
                'canAccessQuizC' => false,
                'canAccessQuizD' => false,
            ]);

            return;
        }

        $studentId = auth()->id();

        if (!$studentId) {
            $view->with([
                'unlockedSlugs' => ['subbab-a1'],
                'passedQuizIds' => [],
                'canAccessQuizA' => false,
                'canAccessQuizB' => false,
                'canAccessQuizC' => false,
                'canAccessQuizD' => false,
            ]);

            return;
        }

        $progress = ProgressSidebarHelper::getSidebarProgress($studentId);

        $view->with($progress);
    });
    }
}
