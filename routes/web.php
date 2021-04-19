<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('home', [
        'dummydata' => DB::table('dummy_data')->paginate(12)
    ]);
})->name('home');;

Route::get('/news', function () {
    return view('news');
});

Route::get('/tinymce', function () {
    return view('tinymce');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/test', [App\Http\Controllers\TestAppController::class, 'index']);
    Route::post('/test', [App\Http\Controllers\TestAppController::class, 'create']);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/user/content-writer', App\Http\Livewire\User\ContentWriter::class)->name('user.create.content');
    Route::get('/admin/menu-management', [App\Http\Controllers\Admins\MenuManagement::class, 'index']);
    Route::get('/admin/log-website', [App\Http\Controllers\Admins\ActivityLog::class, 'index']);
    Route::get('/admin/role-management', [App\Http\Controllers\Admins\RoleManagement::class, 'index']);
    Route::get('/admin/users-management', [App\Http\Controllers\Admins\UsersManagement::class, 'index']);
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth:sanctum', 'verified']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
