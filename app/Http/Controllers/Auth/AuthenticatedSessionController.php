<?php  

namespace App\Http\Controllers\Auth;  

use App\Http\Controllers\Controller;  
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Auth;  
use Illuminate\View\View;  

class AuthenticatedSessionController extends Controller  
{  
    /**  
     * Display the login view.  
     */  
    public function create(): View  
    {  
        return view('auth.login');  
    }  

    /**  
     * Handle an incoming authentication request.  
     */  
    public function store(Request $request)  
    {  
        // Validasi input  
        $credentials = $request->validate([  
            'email' => ['required', 'email'],  
            'password' => ['required'],  
        ]);  

        // Coba login  
        if (Auth::attempt($credentials, $request->boolean('remember'))) {  
            $request->session()->regenerate();  

            $user = Auth::user();  

            // Redirect berdasarkan role  
            if ($user->hasRole('admin')) {  
                return redirect()->intended(route('admin.dashboard'));  
            }  

            if ($user->hasRole('pelanggan')) {  
                return redirect()->intended(route('pelanggan.dashboard'));  
            }  

            // Jika tidak punya role, logout  
            Auth::logout();  
            return redirect()->route('login')  
                ->with('error', 'Akun Anda tidak memiliki akses yang valid');  
        }  

        // Jika login gagal  
        return back()->withErrors([  
            'email' => 'Email atau password salah',  
        ])->withInput($request->except('password'));  
    }  

    public function destroy(Request $request)  
    {  
        Auth::guard('web')->logout();  

        $request->session()->invalidate();  
        $request->session()->regenerateToken();  

        return redirect()->route('awal');  
    }  
}