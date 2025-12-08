<?php

use App\Livewire\Frontend\About\About;
use App\Livewire\Frontend\Blog\Blog;
use App\Livewire\Frontend\Blog\BlogDetail;
use App\Livewire\Frontend\Booking\BookingConfirmation;
use App\Livewire\Frontend\CareProvider\CareProvider;
use App\Livewire\Frontend\Contact\Contact;
use App\Livewire\Frontend\Home\HomePage;
use App\Livewire\Frontend\PriceCalculator\PriceCalculator;
use App\Livewire\Frontend\Service\Service;
use App\Livewire\Frontend\Service\ServiceDetail;
use Illuminate\Support\Facades\Route;

Route::as('frontend.')->group(function () {
    Route::get('/', HomePage::class)->name('home-page');
    Route::get('/about-us', About::class)->name('about');
    Route::get('/contact-us', Contact::class)->name('contact-us');
    Route::get('/services', Service::class)->name('service');
    Route::get('/service/{slug}', ServiceDetail::class)->name('service-detail');
    Route::get('/health-tips', Blog::class)->name('blogs');
    Route::get('/health-tips/{slug}', BlogDetail::class)->name('blog-detail');
    Route::get('/provider-signup', CareProvider::class)->name('provider-signup');
    Route::get('/price-calculator', PriceCalculator::class)->name('price-calculation');
    Route::get('/confirmation', BookingConfirmation::class)->name('confirmation');
});
