<x-guest-layout>
    <div class="mb-6 text-sm text-gray-700">
        {{ __('Sepertinya anda melupakan password anda. Tuliskan email anda di bawah ini dan kami akan membantu meresetnya.') }}
        <p class="italic mt-2">*Lain kali, catat ya!*</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <x-primary-button class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-75">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Ikon untuk kembali ke halaman login -->
    <div class="mt-6 text-center">
        <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Halaman Login
        </a>
    </div>

</x-guest-layout>
