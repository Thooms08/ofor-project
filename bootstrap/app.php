<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php', // 1. TAMBAHKAN INI agar routes/api.php terbaca oleh sistem
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        // Daftarkan middleware alias di sini
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);

        // 2. TAMBAHKAN KODE INI UNTUK BYPASS CSRF WEBHOOK WIJAYAPAY
        $middleware->validateCsrfTokens(except: [
            'api/wijayapay/notification', 
            // Jika suatu saat url-nya tanpa /api, ubah jadi 'wijayapay/notification'
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();