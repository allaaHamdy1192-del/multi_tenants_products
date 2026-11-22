<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerchantRegisterController;
foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {
        Route::get('/', fn () => view('welcome'));
        Route::get('/register-store', [MerchantRegisterController::class, 'create']);
        Route::post('/register-store', [MerchantRegisterController::class, 'store']);
    });
}
