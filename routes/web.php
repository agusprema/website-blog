<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', App\Http\Livewire\Homes\Home::class)->name('home');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/test', [App\Http\Controllers\TestAppController::class, 'index']);
    Route::post('/test', [App\Http\Controllers\TestAppController::class, 'create']);
    Route::get('/dashboard', App\Http\Livewire\Admins\Dashboard::class)->name('dashboard');
    Route::get('/user/content-writer', App\Http\Livewire\User\ContentWriter::class)->name('user.create.content');
    Route::get('/admin/menu-management', App\Http\Livewire\Admins\MenuManagement::class);
    Route::get('/admin/log-website', App\Http\Livewire\Admins\ActivityLog::class);
    Route::get('/admin/role-management', App\Http\Livewire\Admins\RoleManagement::class);
    Route::get('/admin/users-management', App\Http\Livewire\Admins\UserManagement::class);
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/tinymce', function () {
    return view('tinymce');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth:sanctum', 'verified']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
