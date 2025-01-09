<?php  

use App\Http\Controllers\BossController;  
use App\Http\Controllers\ProfileController;  
use App\Http\Controllers\PelangganController;  
use Illuminate\Support\Facades\Route;  

// Public routes  
Route::get('/', function () {  
    return view('welcome');  
})->name('awal');  

Route::get('/403', function () {  
    return view('403');  
})->name('403');  

// Redirect dari /dashboard ke login  
Route::get('/dashboard', function () {  
    auth()->logout();  
    return redirect()->route('login')->with('message', 'Silahkan login kembali');  
})->name('dashboard');  

// Protected routes  
Route::middleware(['auth', 'verified'])->group(function () {  
    // Profile routes  
    Route::controller(ProfileController::class)->group(function () {  
        Route::get('/profile', 'edit')->name('profile.edit');  
        Route::patch('/profile', 'update')->name('profile.update');  
        Route::delete('/profile', 'destroy')->name('profile.destroy');  
    });  

    // Admin routes  
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {  
        Route::get('/dashboard', [BossController::class, 'index'])->name('admin.dashboard');  
        // Route admin lainnya di sini  
    });  

    // Pelanggan routes  
    Route::middleware(['role:pelanggan'])->prefix('pelanggan')->group(function () {  
        Route::get('/dashboard', [PelangganController::class, 'index'])->name('pelanggan.dashboard');  
        // Route pelanggan lainnya di sini  
    });  
});  

// Redirect semua akses yang tidak valid ke login  
Route::fallback(function () {  
    auth()->logout();  
    return redirect()->route('login')->with('message', 'Silahkan login kembali');  
});  

require __DIR__.'/auth.php';