<?php

use App\Http\Controllers\UserInvoiceController;
use App\Http\Controllers\UserSectionController;
use App\Http\Controllers\UserSubscriptionController;
use Illuminate\Support\Facades\Route;

Route::post('/webhook/users/subscription-renewal', [UserSubscriptionController::class, 'renew']);

//todo: add routes for login and logout
//Route::middleware('auth:sanctum')->group(function () {
    Route::post('/users/subscribe', [UserSubscriptionController::class, 'subscribe']);
    Route::get('/users/invoices', [UserInvoiceController::class, 'index']);
    Route::get('/users/sections', [UserSectionController::class, 'index']);
//});
