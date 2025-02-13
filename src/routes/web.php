<?php

use Illuminate\Support\Facades\Route;


foreach(File::allFiles(__DIR__.'/web') as $route_file){
    require $route_file->getPathname();
}