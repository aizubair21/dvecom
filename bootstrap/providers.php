<?php

use App\Models\Category;
use Illuminate\Support\Facades\View;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\VoltServiceProvider::class,
    Rap2hpoutre\LaravelLogViewer\LaravelLogViewerServiceProvider::class,

];

View::composer('view', function () {
    $name = "zubiar";
});
