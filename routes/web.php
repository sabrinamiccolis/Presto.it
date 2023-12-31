<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\PageController::class, 'showHome'])
    ->name('home');
Route::get('/categoria/{category}', [App\Http\Controllers\PageController::class, 'showCategory'])
    ->name('showCategory');


// LARAVEL SOCIALITE
Route::get('login/{provider}', [App\Services\SocialAuthService::class, 'redirectToProvider']);
Route::get('login/{provider}/callback', [App\Services\SocialAuthService::class, 'handleProviderCallback']);


Route::middleware(['auth'])->group(function(){

    Route::get('announcements/create', [App\Http\Controllers\AnnouncementController::class, 'create'])
    ->name('announcements.create')
    ->middleware(['verified']);

    // Revisor
    Route::get('work-with-us', [App\Http\Controllers\PageController::class, 'showWorkUs'])
        ->name('workUs');
    Route::get('become-user-revisor', [App\Http\Controllers\RevisorController::class, 'becomeRevisor'])
        ->name('becomeRevisor');
    Route::get('make-user-revisor/{user}', [App\Http\Controllers\RevisorController::class, 'makeRevisor'])
        ->name('makeRevisor');


        
    Route::middleware(['isRevisor'])->group(function(){

        Route::get('announcements-to-revise', [App\Http\Controllers\RevisorController::class, 'index'])
            ->name('revisor.index');
        Route::patch('/accepted/announcement/{announcement}', [App\Http\Controllers\RevisorController::class, 'acceptAnnouncement'])
            ->name('revisor.accept_announcement');
        Route::patch('/rejected/announcement/{announcement}', [App\Http\Controllers\RevisorController::class, 'rejectAnnouncement'])
            ->name('revisor.reject_announcement');

    });

    // Admin
    Route::middleware(['isAdmin'])->group(function(){

        Route::get('/admin/manage-users', [App\Http\Controllers\AdminController::class, 'index'])
            ->name('admin.index');
        Route::delete('/admin/manage-users/delete/{user}',[App\Http\Controllers\AdminController::class, 'deleteUser'])
            ->name('admin.user.delete');
        Route::put('/admin/manage-users/change-role/{user}', [App\Http\Controllers\AdminController::class, 'changeRole'])
            ->name('admin.user.changeRole');

        Route::get('/admin/manage-announcements/{user}', [App\Http\Controllers\AdminController::class, 'menageAnnouncements'])
            ->name('admin.menage.announcements');

    });

    Route::get('/change-password', [App\Http\Controllers\AccountController::class, 'settings'])
        ->name('auth.setting-password');
    Route::post('/change-password/store', [App\Http\Controllers\AccountController::class, 'settingStore'])
        ->name('auth.setting-password.store');
    Route::get('/user', [App\Http\Controllers\AccountController::class, 'index'])
        ->name('user.index');
    Route::get('/favorites', [App\Http\Controllers\AccountController::class, 'favorites'])
        ->name('user.favorites');

    // preferiti
    Route::post('/favorites/store/{announcement_id}', [App\Http\Controllers\AccountController::class, 'favoritesStore'])
        ->name('favorites.store');


    
    Route::delete('/announcements/images/{id}', [App\Http\Controllers\AnnouncementController::class, 'deleteImage'])
        ->name('announcements.delete_image');

        
});



Route::resource('announcements', App\Http\Controllers\AnnouncementController::class)
    ->except(['create']);

// ricerca annuncio
Route::get('/search/announcement', [App\Http\Controllers\PageController::class, 'searchAnnouncements'])
    ->name('announcements.search');

// cambio lingua
Route::post('/lang/{lang}', [App\Http\Controllers\PageController::class, 'setLanguage'])
    ->name('set_language_country');


Route::post('/send-email', [App\Http\Controllers\AccountController::class, 'sendEmail'])
    ->name('sendEmail');

