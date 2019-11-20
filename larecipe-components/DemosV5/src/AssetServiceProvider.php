<?php

namespace Rawilk\DemosV5;

use App\Helpers\Docs;
use BinaryTorch\LaRecipe\LaRecipe;
use Illuminate\Support\ServiceProvider;

class AssetServiceProvider extends ServiceProvider
{
    protected static $shouldQueue = false;

    public function boot(): void
    {
        if (Docs::isVersion('5.0')) {
            LaRecipe::script('demos-v5', __DIR__ . '/../dist/js/asset.js');
            LaRecipe::style('demos-v5', __DIR__ . '/../dist/css/asset.css');
        }
    }
}
