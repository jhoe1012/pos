<?php

use App\Http\Controllers\Dashboard\AppAuthController;
use Illuminate\Support\Facades\Route;

Route::post( '/app_auth/sign-in', [ AppAuthController::class, 'postSignIn' ])->name( "app_auth.post" );

// Route::get( 'categories/{id?}', [ CategoryController::class, 'get' ])->where([ 'id' => '[0-9]+' ]);
// Route::get( 'categories/{id?}/products', [ CategoryController::class, 'getCategoriesProducts' ])->where([ 'id' => '[0-9]+' ]);
// Route::get( 'categories/{id?}/variations', [ CategoryController::class, 'getCategoriesVariations' ])->where([ 'id' => '[0-9]+' ]);
// Route::post( 'categories', [ CategoryController::class, 'post' ]);
// Route::put( 'categories/{id}', [ CategoryController::class, 'put' ]);
// Route::delete( 'categories/{id}', [ CategoryController::class, 'delete' ]);

// Route::get( 'categories/pos/{id?}', [ CategoryController::class, 'getCategories' ]);
