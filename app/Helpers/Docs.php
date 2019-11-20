<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class Docs
{
    public static function isVersion($version): bool
    {
        $path = request()->path();
        $possible = ["docs/{$version}/", 'docs/scripts/', 'docs/styles/'];

        return Str::startsWith($path, $possible);
    }
}
