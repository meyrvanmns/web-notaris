<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ServiceFeeController;
use App\Http\Controllers\PpatServiceController;
use App\Http\Controllers\NotaryServiceController;
use App\Http\Controllers\RequestSubmissionController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (GUEST)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    Route::get('/', [AuthController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'authenticate'])
        ->name('login.post');

    Route::get('/register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'store'])
        ->name('register.store');
});

/*
|--------------------------------------------------------------------------
| LOGOUT (ALL ROLES)
|--------------------------------------------------------------------------
*/
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | USER MANAGEMENT (ADMIN & NOTARIS ONLY)
    |--------------------------------------------------------------------------
    */
    Route::prefix('user-management')
        ->name('users.')
        ->group(function () {

            Route::get('/', [UserManagementController::class, 'index'])
                ->name('index');

            Route::get('/create', [UserManagementController::class, 'create'])
                ->name('create');

            Route::post('/', [UserManagementController::class, 'store'])
                ->name('store');

            Route::delete('/{user}', [UserManagementController::class, 'destroy'])
                ->name('destroy');
        });

    /*
    |--------------------------------------------------------------------------
    | REQUEST SUBMISSIONS
    |--------------------------------------------------------------------------
    */
    Route::resource('request-submissions', RequestSubmissionController::class);

    Route::get(
        '/request-submissions/document/{id}',
        [RequestSubmissionController::class, 'showDocument']
    )->name('request-submissions.document');

    /*
    |--------------------------------------------------------------------------
    | CLIENTS
    |--------------------------------------------------------------------------
    */
    Route::resource('clients', ClientController::class);

    /*
    |--------------------------------------------------------------------------
    | PPAT SERVICES
    |--------------------------------------------------------------------------
    */
    Route::resource('ppat-services', PpatServiceController::class);

    /*
    |--------------------------------------------------------------------------
    | NOTARY SERVICES
    |--------------------------------------------------------------------------
    */
    Route::resource('notary-services', NotaryServiceController::class);

    Route::get(
        '/notary-services/document/{id}',
        [NotaryServiceController::class, 'showDocument']
    )->name('notary-services.document');

    /*
    |--------------------------------------------------------------------------
    | SERVICE FEES
    |--------------------------------------------------------------------------
    */
    Route::resource('service-fees', ServiceFeeController::class);

    Route::get(
        '/service-fees/{id}/print',
        [ServiceFeeController::class, 'print']
    )->name('service-fees.print');

    /*
    |--------------------------------------------------------------------------
    | DOCUMENTS
    |--------------------------------------------------------------------------
    */
    Route::resource('documents', DocumentController::class);

    Route::get(
        '/documents/document/{id}',
        [DocumentController::class, 'showDocument']
    )->name('documents.document');
});

/*
|--------------------------------------------------------------------------
| REMOVED / DISABLED LEGACY ROUTES
|--------------------------------------------------------------------------
| Route::resource('users', UserManagementController::class);
| ❌ DIHAPUS TOTAL untuk mencegah bypass permission
|--------------------------------------------------------------------------
*/
