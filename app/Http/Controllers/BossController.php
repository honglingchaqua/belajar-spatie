<?php  

namespace App\Http\Controllers;  

use Illuminate\Http\Request;  

class BossController extends Controller  
{  
    public function index()  
{  
    if (!auth()->check() || !auth()->user()->hasRole('admin')) {  
        auth()->logout();  
        return redirect()->route('login')  
            ->with('message', 'Anda tidak memiliki akses ke halaman tersebut');  
    }  
    
    return view('boss-home');  
}  
}