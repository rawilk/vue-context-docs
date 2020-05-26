<?php

use App\Http\Controllers\DocsController;
use Illuminate\Support\Facades\Route;

Route::get('{doc}', DocsController::class);

Route::get('/', function () {
    return view('welcome');
});
