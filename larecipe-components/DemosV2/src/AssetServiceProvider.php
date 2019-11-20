<?php

namespace Rawilk\DemosV2;

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
        if (Docs::isVersion('3.0') || Docs::isVersion('2.0')) {
            LaRecipe::script('demos-v2', __DIR__ . '/../dist/js/asset.js');
        }
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
