<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/', function(){
        return view('index.');
    });
});

foreach(File::allFiles(__DIR__.'/web') as $route_file){
    require $route_file->getPathname();
}