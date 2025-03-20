<?php
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

Route::get('/noticias', [DataController::class, 'getNoticias']);
Route::get('/senales', [DataController::class, 'getSenales']);

Route::post('/cargar-noticias', [DataController::class, 'cargarNoticias']);
Route::post('/cargar-senales', [DataController::class, 'cargarSenales']);
