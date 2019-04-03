<?php

namespace Rawilk\DemosV2;

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
        LaRecipe::script('demos-v2', __DIR__ . '/../dist/js/asset.js');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
