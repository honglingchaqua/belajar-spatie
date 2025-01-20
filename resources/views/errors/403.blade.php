<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <title>Ups! Akses Ditolak</title>  
    <script src="https://cdn.tailwindcss.com"></script>  
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">  
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>  
</head>  
<body class="bg-gradient-to-br from-blue-100 via-white to-pink-100 flex items-center justify-center min-h-screen font-poppins">  
    <div class="container mx-auto px-4">  
        <div class="max-w-md mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-500 hover:scale-105">  
            <div class="p-8 text-center">  
                <div class="mb-6 flex justify-center">  
                    <svg class="w-32 h-32 text-red-400 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">  
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>  
                    </svg>  
                </div>  
                
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Ups! 403</h1>  
                <h2 class="text-2xl font-semibold text-gray-600 mb-4">Akses Ditolak</h2>  
                
                <p class="text-gray-500 mb-6 leading-relaxed">  
                    Maaf, sepertinya Anda tidak memiliki izin untuk masuk ke halaman ini.   
                    Pastikan Anda memiliki hak akses yang benar.  
                </p>  
                
                <div class="flex space-x-4 justify-center">  
                    @auth  
                        @if(auth()->user()->hasRole('admin'))  
                            <a href="{{ route('boss.dashboard') }}" class="flex items-center bg-blue-500 text-white px-6 py-3 rounded-full hover:bg-blue-600 transition transform hover:scale-105 shadow-lg">  
                                <i data-feather="home" class="mr-2"></i>  
                                Kembali ke Dashboard Admin  
                            </a>  
                        @elseif(auth()->user()->hasRole('pelanggan'))  
                            <a href="{{ route('pelanggan.dashboard') }}" class="flex items-center bg-blue-500 text-white px-6 py-3 rounded-full hover:bg-blue-600 transition transform hover:scale-105 shadow-lg">  
                                <i data-feather="home" class="mr-2"></i>  
                                Kembali ke Dashboard Pelanggan  
                            </a>  
                        @endif  
                        
                        <a href="{{ route('logout') }}"   
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"   
                           class="flex items-center bg-green-500 text-white px-6 py-3 rounded-full hover:bg-green-600 transition transform hover:scale-105 shadow-lg">  
                            <i data-feather="log-out" class="mr-2"></i>  
                            Logout  
                        </a>  
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">  
                            @csrf  
                        </form>  
                    @else  
                        <a href="/" class="flex items-center bg-blue-500 text-white px-6 py-3 rounded-full hover:bg-blue-600 transition transform hover:scale-105 shadow-lg">  
                            <i data-feather="home" class="mr-2"></i>  
                            Kembali Beranda  
                        </a>  
                        
                        <a href="{{ route('login') }}" class="flex items-center bg-green-500 text-white px-6 py-3 rounded-full hover:bg-green-600 transition transform hover:scale-105 shadow-lg">  
                            <i data-feather="log-in" class="mr-2"></i>  
                            Login  
                        </a>  
                    @endauth  
                </div>
            </div>  
            
            <div class="bg-gray-50 p-4 text-center text-xs text-gray-500">  
                © 2025 Your Application. All rights reserved.  
            </div>  
        </div>  
    </div>  

    <script>  
        // Aktifkan Feather Icons  
        feather.replace();  
    </script>  
</body>  
</html>