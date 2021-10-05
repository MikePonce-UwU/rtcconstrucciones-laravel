<?php

use App\Http\Controllers\DetalleCompraController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('bodegas', App\Http\Controllers\BodegaController::class);
    Route::resource('proyectos', App\Http\Controllers\ProyectoController::class);
    Route::resource('permisos', App\Http\Controllers\PermisoController::class)->except(['edit', 'update']);
    Route::resource('alquileres', App\Http\Controllers\AlquilerController::class);
    Route::resource('entrega-alquileres', App\Http\Controllers\EntregaAlquilerController::class);
    Route::resource('compras', App\Http\Controllers\CompraController::class);
    Route::apiResource('detalle-compras', DetalleCompraController::class)->only(['store', 'destroy']);
    Route::prefix('detalle-compras')->group(function () {
        Route::get('crear/{id}', [App\Http\Controllers\DetalleCompraController::class, 'crear'])->name('detalle-compras.create');
    });
});
