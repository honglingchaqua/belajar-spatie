<?php  

use Illuminate\Foundation\Application;  
use Illuminate\Foundation\Configuration\Exceptions;  
use Illuminate\Foundation\Configuration\Middleware;  
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;  

return Application::configure(basePath: dirname(__DIR__))  
    ->withRouting(  
        web: __DIR__.'/../routes/web.php',  
        commands: __DIR__.'/../routes/console.php',  
        health: '/up',  
    )  
    ->withMiddleware(function (Middleware $middleware) {  
        // Tambahkan alias untuk middleware Spatie  
        $middleware->alias([  
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,  
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,  
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,  
            'redirect.authenticated' => \App\Http\Middleware\RedirectAuthenticated::class,
            
            // // Middleware custom admin (jika Anda membuatnya)  
            // 'admin' => \App\Http\Middleware\AdminMiddleware::class,  
        ]);  
    })  
    ->withExceptions(function (Exceptions $exceptions) {  
        // Tangani exception untuk akses yang ditolak  
        $exceptions->render(function (AccessDeniedHttpException $e) {  
            // Redirect atau tampilkan halaman error kustom  
            return response()->view('errors.403', [], 403);  
        });  
    })->create();