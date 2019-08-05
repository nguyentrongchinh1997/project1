<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Category;
use App\Http\Service\admin\DocumentService;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view){
            $listCategory = Category::where('type', config('config.category.type.document'))->get();
            $data = [
                'listCategory' => $listCategory,
            ];
            $view->with($data);
        });
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
