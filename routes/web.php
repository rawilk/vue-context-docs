<?php

use App\Http\Controllers\DocsController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/docs');
Route::redirect('/docs', '/docs/overview');
Route::get('docs/{doc}', DocsController::class);
