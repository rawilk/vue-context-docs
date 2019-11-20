<?php

namespace Rawilk\DemosV4;

use App\Helpers\Docs;
use BinaryTorch\LaRecipe\LaRecipe;
use Illuminate\Support\ServiceProvider;

class AssetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        LaRecipe::style('demos-v4', __DIR__ . '/../dist/css/asset.css');

        if (Docs::isVersion('4.0')) {
            LaRecipe::script('demos-v4', __DIR__ . '/../dist/js/asset.js');
        }
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
