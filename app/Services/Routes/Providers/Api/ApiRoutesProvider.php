<?php

namespace App\Services\Routes\Providers\Api;

use App\Http\Controllers\Api\v1\ApiShortLinkController;
use Illuminate\Support\Facades\Route;

class ApiRoutesProvider
{
    public function register()
    {
        Route::as('api.')
            ->group(function () {
                Route::apiResource('links', ApiShortLinkController::class);
            });
    }
}
