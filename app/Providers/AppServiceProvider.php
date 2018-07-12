<?php

namespace App\Providers;

use App\Model\ArticleBase;
use App\Model\ArticleStatistics;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data = [];
        $data['topPv'] = ArticleStatistics::topPv(10);
        $data['rnewest'] = ArticleBase::newest(10);
        View::share($data);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
