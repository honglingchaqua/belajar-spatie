<?php  

namespace App\Http\Middleware;  

use Closure;  
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Auth;  

class RedirectAuthenticated  
{  
    public function handle(Request $request, Closure $next)  
    {  
        if (Auth::check()) {  
            $user = Auth::user();  
            
            // Redirect berdasarkan role  
            if ($user->hasRole('admin')) {  
                return redirect()->route('boss.dashboard');  
            }  
            
            if ($user->hasRole('pelanggan')) {  
                return redirect()->route('pelanggan.dashboard');  
            }  
            
            // Jika tidak punya role, logout dan kembali ke login  
            Auth::logout();  
            return redirect()->route('login')  
                ->with('message', 'Akun Anda tidak memiliki akses yang valid');  
        }  
        
        return $next($request);  
    }  
}