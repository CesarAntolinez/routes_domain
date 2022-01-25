<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'domain' => '{account}.dominio-uno.test',
    'namespace' => 'App\\Http\\Controllers\\Tenant\\',
    'middleware' => 'web'
], function () {
    Route::get('/', function (){
        return 'foo 1';
    });
});

Route::group([
    'domain' => '{account}.dominio-dos.test',
    'namespace' => 'App\\Http\\Controllers\\Tenant\\',
    'middleware' => 'web'
], function () {
    Route::get('/', function (){
        return 'foo 2';
    });
});
