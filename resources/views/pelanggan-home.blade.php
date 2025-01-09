<x-app-layout>
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-extrabold text-gray-800 mb-4">
                    Selamat Datang, guys
                    
            {{-- {{ Auth::user()->name }} --}}

                </h1>
                <p class="text-xl text-gray-600">
                    Pilih Kategori Barang yang Ingin Anda Pesan
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- ATK Category -->
                <div class="bg-white shadow-xl rounded-2xl overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="p-6">
                        <div class="flex items-center justify-center mb-6">
                            <div class="bg-blue-100 text-blue-600 p-4 rounded-full">
                                <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                        </div>
                        <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">
                            Alat Tulis Kantor
                        </h2>
                        <p class="text-gray-600 text-center mb-6">
                            Pesan berbagai kebutuhan alat tulis kantor dengan mudah dan cepat.
                        </p>
                        <div class="text-center">  
                            <a href="{{ route('403') }}" class="inline-block bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300 transform hover:-translate-y-1 shadow-md">  
                                Pesan Sekarang  
                            </a>  
                        </div>
                    </div>
                </div>

                <!-- Komputer Category -->
                <div class="bg-white shadow-xl rounded-2xl overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="p-6">
                        <div class="flex items-center justify-center mb-6">
                            <div class="bg-green-100 text-green-600 p-4 rounded-full">
                                <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">
                            Peralatan Komputer
                        </h2>
                        <p class="text-gray-600 text-center mb-6">
                            Lengkapi kebutuhan komputer dan elektronik kantor Anda.
                        </p>
                        <div class="text-center">
                            <a href="#" class="inline-block bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition duration-300 transform hover:-translate-y-1 shadow-md">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Lainnya Category -->
                <div class="bg-white shadow-xl rounded-2xl overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="p-6">
                        <div class="flex items-center justify-center mb-6">
                            <div class="bg-purple-100 text-purple-600 p-4 rounded-full">
                                <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                        </div>
                        <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">
                            Barang Lainnya
                        </h2>
                        <p class="text-gray-600 text-center mb-6">
                            Temukan berbagai kebutuhan tambahan yang Anda perlukan.
                        </p>
                        <div class="text-center">
                            <a href="#" class="inline-block bg-purple-500 text-white px-6 py-3 rounded-lg hover:bg-purple-600 transition duration-300 transform hover:-translate-y-1 shadow-md">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white shadow-md rounded-lg p-6 text-center">
                    <div class="text-4xl font-bold text-blue-600 mb-2">
                        {{ $totalOrders ?? 0 }}
                    </div>
                    <div class="text-gray-600">
                        Total Pesanan
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg p-6 text-center">
                    <div class="text-4xl font-bold text-green-600 mb-2">
                        {{ $processingOrders ?? 0 }}
                    </div>
                    <div class="text-gray-600">
                        Pesanan Diproses
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg p-6 text-center">
                    <div class="text-4xl font-bold text-purple-600 mb-2">
                        {{ $completedOrders ?? 0 }}
                    </div>
                    <div class="text-gray-600">
                        Pesanan Selesai
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional: Recent Orders Section -->
    @if(isset($recentOrders) && count($recentOrders) > 0)
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-800">
                    Pesanan Terakhir
                </h3>
            </div>
            <div class="p-6">
                <table class="w-full">
                    <thead>
                        <tr class="text-left border-b">
                            <th class="pb-3 text-gray-600">Nomor Pesanan</th>
                            <th class="pb-3 text-gray-600">Kategori</th>
                            <th class="pb-3 text-gray-600">Tanggal</th>
                            <th class="pb-3 text-gray-600">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentOrders as $order)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3">{{ $order->order_number }}</td>
                            <td class="py-3">{{ $order->category }}</td>
                            <td class="py-3">{{ $order->created_at->format('d M Y') }}</td>
                            <td class="py-3">
                                <span class="px-3 py-1 rounded-full text-xs 
                                    {{ $order->status == 'Selesai' ? 'bg-green-100 text-green-800' : 
                                       ($order->status == 'Diproses' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                    {{ $order->status }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>