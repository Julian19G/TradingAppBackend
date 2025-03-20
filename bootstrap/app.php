<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\Cors; // Usa tu propio middleware

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function ($middleware) {
        $middleware->append(Cors::class); // Usa tu middleware
    })
    ->withExceptions(function ($exceptions) {
        // Manejo de excepciones
    })->create();
