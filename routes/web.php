<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\DataController;

Route::get('/noticias', [DataController::class, 'getNoticias']);
Route::get('/senales', [DataController::class, 'getSenales']);

Route::post('/cargar-noticias', [DataController::class, 'cargarNoticias']);
Route::post('/cargar-senales', [DataController::class, 'cargarSenales']);
