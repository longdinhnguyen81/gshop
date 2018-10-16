<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Cat;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $objCat = New Cat();
        $cObj = $objCat->getAll();
        $pObj = $objCat->getcItems();
        $dObj = $objCat->getdItems();
        view()->share('cats', $cObj);
        view()->share('pcats', $pObj);
        view()->share('dcats', $dObj);
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
