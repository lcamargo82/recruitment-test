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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['can:Admin']], function () {
    Route::get('user/{user}/roles', [App\Http\Controllers\UserController::class, 'roles'])->name('user.roles');
    Route::put('user/{user}/roles/sync', [App\Http\Controllers\UserController::class, 'rolesSync'])->name('user.rolesSync');
    Route::resource('user', App\Http\Controllers\UserController::class);

    Route::get('role/{role}/permissions', [App\Http\Controllers\RoleController::class, 'permissions'])->name('role.permissions');
    Route::put('role/{role}/permissions/sync', [App\Http\Controllers\RoleController::class, 'permissionsSync'])->name('role.permissionsSync');
    Route::resource('role', App\Http\Controllers\RoleController::class);

    Route::resource('permission', App\Http\Controllers\PermissionController::class);

    Route::get('/detalhes-desenvolvedor/{details}', [App\Http\Controllers\HomeController::class, 'show'])->name('show.details');
    Route::get('/desenvolvedor-repositorios/{repositories}', [App\Http\Controllers\HomeController::class, 'showRepositories'])->name('show.repositories');
    Route::get('/detalhes-repositorio/{developer}/{repository}', [App\Http\Controllers\HomeController::class, 'detailRepository'])->name('details.repository');
    Route::post('/home', [App\Http\Controllers\HomeController::class, 'filters'])->name('search.language');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
