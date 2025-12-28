<?php

use App\Livewire\Backend\About\About;
use App\Livewire\Backend\About\CreateAbout;
use App\Livewire\Backend\About\EditAbout;
use App\Livewire\Backend\Advisor\Advisor;
use App\Livewire\Backend\Advisor\CreateAdvisor;
use App\Livewire\Backend\Advisor\EditAdvisor;
use App\Livewire\Backend\Blog\Blog;
use App\Livewire\Backend\Blog\CreateBlog;
use App\Livewire\Backend\Blog\EditBlog;
use App\Livewire\Backend\Booking\Booking;
use App\Livewire\Backend\Booking\BookingDetail;
use App\Livewire\Backend\CareLevel\CareLevel;
use App\Livewire\Backend\CareLevel\CreateCareLevel;
use App\Livewire\Backend\CareLevel\EditCareLevel;
use App\Livewire\Backend\Contact\Contact;
use App\Livewire\Backend\Contact\ContactDetail;
use App\Livewire\Backend\Dashboard;
use App\Livewire\Backend\Location\CreateLocation;
use App\Livewire\Backend\Location\EditLocation;
use App\Livewire\Backend\Location\Location;
use App\Livewire\Backend\LocationGroup\CreateLocationGroup;
use App\Livewire\Backend\LocationGroup\EditLocationGroup;
use App\Livewire\Backend\LocationGroup\LocationGroup;
use App\Livewire\Backend\MedicalService\CreateMedicalService;
use App\Livewire\Backend\MedicalService\EditMedicalService;
use App\Livewire\Backend\MedicalService\MedicalService;
use App\Livewire\Backend\Package\CreatePackage;
use App\Livewire\Backend\Package\EditPackage;
use App\Livewire\Backend\Package\Package;
use App\Livewire\Backend\Permission\Permissions;
use App\Livewire\Backend\Profile\Profile;
use App\Livewire\Backend\Role\CreateRole;
use App\Livewire\Backend\Role\EditRole;
use App\Livewire\Backend\Role\Roles;
use App\Livewire\Backend\Service\CreateService;
use App\Livewire\Backend\Service\EditService;
use App\Livewire\Backend\Service\Service;
use App\Livewire\Backend\Service\ServicePrice\CreateServicePrice;
use App\Livewire\Backend\Service\ServicePrice\EditServicePrice;
use App\Livewire\Backend\Service\ServicePrice\ServicePrice;
use App\Livewire\Backend\Service\ServiceType\ServiceType;
use App\Livewire\Backend\Settings\CreateSettings;
use App\Livewire\Backend\Settings\EditSettings;
use App\Livewire\Backend\Settings\Settings;
use App\Livewire\Backend\User\Users;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    // Profile
    Route::get('/profile', Profile::class)->name('profile');

    // Role Routes
    Route::get('/roles', Roles::class)->name('role');
    Route::get('/create-role', CreateRole::class)->name('create.role');
    Route::get('/role/{roleId}/edit', EditRole::class)->name('edit.role');

    // Permission Route
    Route::get('/permissions', Permissions::class)->name('permission');

    // User Routes
    Route::get('/users', Users::class)->name('user');

    // About Routes
    Route::get('/about', About::class)->name('about');
    Route::get('/create-about', CreateAbout::class)->name('create.about');
    Route::get('/about/{aboutId}/edit', EditAbout::class)->name('edit.about');


    // Location Group Routes
    Route::get('/location-groups', LocationGroup::class)->name('location-group');
    Route::get('/create-location-group', CreateLocationGroup::class)->name('create.location-group');
    Route::get('/location-group/{groupId}/edit', EditLocationGroup::class)->name('edit.location-group');

    // Location Routes
    Route::get('/locations', Location::class)->name('location');
    Route::get('/create-location', CreateLocation::class)->name('create.location');
    Route::get('/location/{locationGroupId}/edit', EditLocation::class)->name('edit.location');

    // Package Routes
    Route::get('/package', Package::class)->name('package');
    Route::get('/create-package', CreatePackage::class)->name('create.package');
    Route::get('/package/{packageId}/edit', EditPackage::class)->name('edit.package');
    
    // Care Level Routes
    Route::get('/care-level', CareLevel::class)->name('care-level');
    Route::get('/create-care-level', CreateCareLevel::class)->name('create.care-level');
    Route::get('/care-level/{careLevelId}/edit', EditCareLevel::class)->name('edit.care-level');

    // Service Type Route
    Route::get('/service-type', ServiceType::class)->name('service-type');

    // Special Care Service Routes
    Route::get('/service', Service::class)->name('service');
    Route::get('/create-service', CreateService::class)->name('create.service');
    Route::get('/service/{serviceId}/edit', EditService::class)->name('edit.service');
    
    // Service Price Routes
    Route::get('/service-price', ServicePrice::class)->name('service.price');
    Route::get('/create-service-price', CreateServicePrice::class)->name('create.service.price');
    Route::get('/service-price/{serviceId}/edit', EditServicePrice::class)->name('edit.service.price');
    
    // Medical Service Routes
    Route::get('/medical-service', MedicalService::class)->name('medical.service');
    Route::get('/create-medical-service', CreateMedicalService::class)->name('create.medical.service');
    Route::get('/medical-service/{serviceId}/edit', EditMedicalService::class)->name('edit.medical.service');
    
    // Booking Routes
    Route::get('/bookings', Booking::class)->name('booking');
    Route::get('/booking/{bookingId}', BookingDetail::class)->name('booking.detail');
    
    // Blog Routes
    Route::get('/blog', Blog::class)->name('blog');
    Route::get('/create-blog', CreateBlog::class)->name('create.blog');
    Route::get('/blog/{blogId}/edit', EditBlog::class)->name('edit.blog');
    
    // Advisor Routes
    Route::get('/advisor', Advisor::class)->name('advisor');
    Route::get('/create-advisor', CreateAdvisor::class)->name('create.advisor');
    Route::get('/advisor/{advisorId}/edit', EditAdvisor::class)->name('edit.advisor');


    // Contact Routes
    Route::get('/contacts', Contact::class)->name('contact');
    Route::get('/contact/{contactId}/detail', ContactDetail::class)->name('view.contact');

    // Settings
    Route::get('/settings', Settings::class)->name('settings');
    Route::get('/create-settings', CreateSettings::class)->name('create.settings');
    Route::get('/settings/{settingId}/edit', EditSettings::class)->name('edit.settings');
});