<?php  

namespace App\Exceptions;  

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;  
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;  
use Illuminate\Http\Request;  
use Throwable;  

class Handler extends ExceptionHandler  
{  
    /**  
     * Register the exception handling callbacks for the application.  
     */  
    public function register(): void  
    {  
        $this->renderable(function (AccessDeniedHttpException $e, Request $request) {  
            if ($request->expectsJson()) {  
                return response()->json(['message' => 'Forbidden'], 403);  
            }  
            
            return response()->view('errors.403', [], 403);  
            // Perhatikan path view menjadi 'errors.403'  
        });  
    }  
}