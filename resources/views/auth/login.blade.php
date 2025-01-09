<!DOCTYPE html>  
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">  
<head>  
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <meta name="csrf-token" content="{{ csrf_token() }}">  

    <title>{{ config('app.name', 'Laravel') }} - Login</title>  

    <!-- Fonts -->  
    <link rel="preconnect" href="https://fonts.bunny.net">  
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />  

    <!-- Scripts -->  
    @vite(['resources/css/app.css', 'resources/js/app.js'])  
</head>  
<body class="font-sans text-gray-900 antialiased">  
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-4">  
        <div class="w-full max-w-5xl mx-auto bg-white shadow-2xl rounded-2xl overflow-hidden flex flex-col md:flex-row">  
            <!-- Ilustrasi Kunci -->  
            <div class="w-full md:w-1/2 bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center p-8 md:p-12">  
                <div class="text-center">  
                    <a href="{{ route('awal') }}">  
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 md:h-64 md:w-64 mx-auto text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">  
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />  
                        </svg>  
                    </a>  
                    
                    <h2 class="text-xl md:text-3xl font-bold text-white mt-4 md:mt-6">Akses Keamanan </h2>  
                    <p class="text-white/80 mt-2 md:mt-4 text-sm md:text-base">Melindui Akun Anda Dari Orang-Orang jahat</p>  
                </div>  
            </div>  

            <!-- Login Form Container -->  
            <div class="w-full md:w-1/2 p-6 md:p-12 flex items-center justify-center">  
                <div class="w-full">  
                    <!-- Session Status -->  
                    <x-auth-session-status class="mb-4" :status="session('status')" />  

                    <div class="mb-4 md:mb-6">  
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 text-center">Selamat Datang Kembali</h1>  
                        <p class="text-gray-600 mt-1 md:mt-2 text-sm md:text-base"></p>  
                    </div>  

                    <form method="POST" action="{{ route('login') }}">  
                        @csrf  

                        <!-- Email Address -->  
                        <div class="mb-3 md:mb-4">  
                            <x-input-label for="email" :value="__('Email Address')" class="block text-gray-700 text-sm font-bold mb-2" />  
                            <x-text-input   
                                id="email"   
                                class="block mt-1 w-full shadow-sm appearance-none border rounded-lg py-2 md:py-3 px-3 md:px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm md:text-base"   
                                type="email"   
                                name="email"   
                                :value="old('email')"   
                                required   
                                autofocus   
                                autocomplete="username"   
                                placeholder="Enter your email"  
                            />  
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-xs md:text-sm" />  
                        </div>  

                        <!-- Password -->  
                        <div class="mb-3 md:mb-4">  
                            <x-input-label for="password" :value="__('Password')" class="block text-gray-700 text-sm font-bold mb-2" />  
                            <x-text-input   
                                id="password"   
                                class="block mt-1 w-full shadow-sm appearance-none border rounded-lg py-2 md:py-3 px-3 md:px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm md:text-base"  
                                type="password"  
                                name="password"  
                                required   
                                autocomplete="current-password"   
                                placeholder="Enter your password"  
                            />  
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-xs md:text-sm" />  
                        </div>  

                        <!-- Remember Me -->  
                        <div class="flex items-center justify-between mb-3 md:mb-4">  
                            <label for="remember_me" class="inline-flex items-center text-sm">  
                                <input   
                                    id="remember_me"   
                                    type="checkbox"   
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"   
                                    name="remember"  
                                >  
                                <span class="ms-2 text-xs md:text-sm text-gray-600">{{ __('Remember me') }}</span>  
                            </label>  

                            @if (Route::has('password.request'))  
                                <a   
                                    href="{{ route('password.request') }}"   
                                    class="text-xs md:text-sm text-blue-500 hover:text-blue-700"  
                                >  
                                    {{ __('Forgot password?') }}  
                                </a>  
                            @endif  
                        </div>  

                        <div class="mt-4 md:mt-6">  
                            <x-primary-button class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold py-2 md:py-3 px-3 md:px-4 rounded-lg hover:opacity-90 transition duration-300 text-sm md:text-base">  
                                {{ __('Log in') }}  
                            </x-primary-button>  
                        </div>  

                        <div class="mt-4 md:mt-6 text-center">  
                            <p class="text-xs md:text-sm text-gray-600">  
                                Belum ada akun?    
                                @if (Route::has('register'))  
                                    <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700">  
                                        Daftar disini  
                                    </a>  
                                @endif  
                            </p>  
                        </div>  
                    </form>  
                </div>  
            </div>  
        </div>  
    </div>  
</body>  
</html>