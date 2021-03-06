<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('bodegas', App\Http\Controllers\BodegaController::class);
    Route::resource('proyectos', App\Http\Controllers\ProyectoController::class);
    //Route::resource('permisos', App\Http\Controllers\PermisoController::class)->except(['edit', 'update']);
    Route::resource('alquileres', App\Http\Controllers\AlquilerController::class);
    Route::resource('detalle-alquileres', App\Http\Controllers\DetalleAlquilerController::class)->except('index', 'create', 'show', 'edit');
    Route::resource('compras', App\Http\Controllers\CompraController::class);
    Route::resource('entradas', App\Http\Controllers\EntradaController::class);
    Route::resource('salidas', App\Http\Controllers\SalidaController::class);
    Route::apiResource('detalle-compras', App\Http\Controllers\DetalleCompraController::class)->only(['store', 'destroy']);
    Route::prefix('detalle-compras')->group(function () {
        Route::get('crear/{id}', [App\Http\Controllers\DetalleCompraController::class, 'crear'])->name('detalle-compras.create');
    });
    Route::prefix('detalle-entradas')->group(function () {
        Route::post('store', [App\Http\Controllers\DetalleEntradaController::class, 'store'])->name('detalle-entradas.store');
        Route::delete('destroy/{id}', [App\Http\Controllers\DetalleEntradaController::class, 'destroy'])->name('detalle-entradas.destroy');
    });
    Route::apiResource('detalle-salidas', App\Http\Controllers\DetalleSalidaController::class)->only(['store', 'destroy']);
    Route::resource('productos', App\Http\Controllers\ProductoController::class);
});
