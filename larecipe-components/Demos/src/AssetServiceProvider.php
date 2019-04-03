<?php

namespace Rawilk\Demos;

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
        LaRecipe::script('demos', __DIR__ . '/../dist/js/asset.js');
        // LaRecipe::style('demos', __DIR__.'/../dist/css/asset.css');
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
