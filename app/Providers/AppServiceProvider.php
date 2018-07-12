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

        $categoryList = config('category');
        shuffle($categoryList);
        $pCat = $sCat = [];
        $i = $j = 0;
        foreach ($categoryList as $value)
        {
            if($value['pid'])
            {
                $i += 1;
                if($i > 12) continue;
                $pCat[] = $value;
            }
            else
            {
                $j += 1;
                if($j > 12) continue;
                $sCat[] = $value;
            }
        }
        $data['pCat'] = $pCat;
        $data['sCat'] = $sCat;

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
