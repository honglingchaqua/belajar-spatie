<!DOCTYPE html>  
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">  
<head>  
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <meta name="csrf-token" content="{{ csrf_token() }}">  

    <title>{{ config('app.name', 'Laravel') }} - Register</title>  

    <!-- Fonts -->  
    <link rel="preconnect" href="https://fonts.bunny.net">  
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />  

    <!-- Scripts -->  
    @vite(['resources/css/app.css', 'resources/js/app.js'])  
</head>  
<body class="font-sans text-gray-900 antialiased">  
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-4">  
        <div class="w-full max-w-5xl mx-auto bg-white shadow-2xl rounded-2xl overflow-hidden flex flex-col md:flex-row">  
            <!-- Ilustrasi Registrasi -->  
            <div class="w-full md:w-1/2 bg-gradient-to-br from-green-500 to-teal-600 flex items-center justify-center p-8 md:p-12">  
                <div class="text-center">  
                <a href="{{route('awal')}}">  
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 md:h-64 md:w-64 mx-auto text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">  
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />  
                    </svg>  
                 </a>  
                    <h2 class="text-xl md:text-3xl font-bold text-white mt-4 md:mt-6">Create Account</h2>  
                    <p class="text-white/80 mt-2 md:mt-4 text-sm md:text-base">Join our platform and unlock new possibilities</p>  
                </div>  
            </div>  

            <!-- Register Form Container -->  
            <div class="w-full md:w-1/2 p-6 md:p-12 flex items-center justify-center">  
                <div class="w-full">  
                    <div class="mb-4 md:mb-6">  
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Sign Up</h1>  
                        <p class="text-gray-600 mt-1 md:mt-2 text-sm md:text-base">Create your account to get started</p>  
                    </div>  

                    <form method="POST" action="{{ route('register') }}">  
                        @csrf  

                        <!-- Name -->  
                        <div class="mb-3 md:mb-4">  
                            <x-input-label for="name" :value="__('Full Name')" class="block text-gray-700 text-sm font-bold mb-2" />  
                            <x-text-input   
                                id="name"   
                                class="block mt-1 w-full shadow-sm appearance-none border rounded-lg py-2 md:py-3 px-3 md:px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500 text-sm md:text-base"   
                                type="text"   
                                name="name"   
                                :value="old('name')"   
                                required   
                                autofocus   
                                autocomplete="name"   
                                placeholder="Enter your full name"  
                            />  
                            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-xs md:text-sm" />  
                        </div>  

                        <!-- Email Address -->  
                        <div class="mb-3 md:mb-4">  
                            <x-input-label for="email" :value="__('Email Address')" class="block text-gray-700 text-sm font-bold mb-2" />  
                            <x-text-input   
                                id="email"   
                                class="block mt-1 w-full shadow-sm appearance-none border rounded-lg py-2 md:py-3 px-3 md:px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500 text-sm md:text-base"   
                                type="email"   
                                name="email"   
                                :value="old('email')"   
                                required   
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
                                class="block mt-1 w-full shadow-sm appearance-none border rounded-lg py-2 md:py-3 px-3 md:px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500 text-sm md:text-base"  
                                type="password"  
                                name="password"  
                                required   
                                autocomplete="new-password"   
                                placeholder="Create a strong password"  
                            />  
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-xs md:text-sm" />  
                        </div>  

                        <!-- Confirm Password -->  
                        <div class="mb-3 md:mb-4">  
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="block text-gray-700 text-sm font-bold mb-2" />  
                            <x-text-input   
                                id="password_confirmation"   
                                class="block mt-1 w-full shadow-sm appearance-none border rounded-lg py-2 md:py-3 px-3 md:px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500 text-sm md:text-base"  
                                type="password"  
                                name="password_confirmation"   
                                required   
                                autocomplete="new-password"   
                                placeholder="Confirm your password"  
                            />  
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-xs md:text-sm" />  
                        </div>  

                        <div class="mt-4 md:mt-6">  
                            <x-primary-button class="w-full bg-gradient-to-r from-green-500 to-teal-600 text-white font-bold py-2 md:py-3 px-3 md:px-4 rounded-lg hover:opacity-90 transition duration-300 text-sm md:text-base">  
                                {{ __('Register') }}  
                            </x-primary-button>  
                        </div>  

                        <div class="mt-4 md:mt-6 text-center">  
                            <p class="text-xs md:text-sm text-gray-600">  
                                Already have an account?   
                                <a href="{{ route('login') }}" class="text-green-500 hover:text-green-700">  
                                    Sign In  
                                </a>  
                            </p>  
                        </div>  
                    </form>  
                </div>  
            </div>  
        </div>  
    </div>  
</body>  
</html>