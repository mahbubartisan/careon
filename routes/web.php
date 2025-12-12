<?php

use App\Http\Controllers\BkashTokenizePaymentController;
use Illuminate\Support\Facades\Route;



// Route::get('locale/{lang}', function ($lang) {
//     if (in_array($lang, ['en', 'bn'])) {
//         session(['locale' => $lang]);
//     }
//     return redirect()->back();
// })->name('locale.switch');

// Payment Routes for bKash
Route::get('/bkash/payment', [BkashTokenizePaymentController::class, 'index']);
Route::get('/bkash/create-payment', [BkashTokenizePaymentController::class, 'createPayment'])->name('bkash-create-payment');
Route::get('/bkash/callback', [BkashTokenizePaymentController::class, 'callBack'])->name('bkash-callBack');
Route::post('/bkash/callback', [BkashTokenizePaymentController::class, 'callBack']);

require __DIR__ . '/auth.php';
require __DIR__ . '/backend.php';
require __DIR__ . '/frontend.php';
