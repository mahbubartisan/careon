<?php

use Illuminate\Support\Facades\Route;



Route::get('locale/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'bn'])) {
        session(['locale' => $lang]);
    }
    return redirect()->back();
})->name('locale.switch');



require __DIR__ . '/auth.php';
require __DIR__ . '/backend.php';
require __DIR__ . '/frontend.php';
