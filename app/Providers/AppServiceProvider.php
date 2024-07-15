<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
        FacadesView::composer(['layouts.navigation', 'home'], function (View $view) {
            $categories = Category::all();
            $view->with('categories', $categories);
        });
    }
}
