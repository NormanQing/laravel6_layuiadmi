<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // 菜单栏
        view()->composer('backend.layout', function($view){
            $menus = Permission::query()
                ->with('children')
                ->where('parent_id', 0)
                ->orderBy('sort', 'desc')
                ->get();
            $view->with('menus', $menus);
        });
    }
}
