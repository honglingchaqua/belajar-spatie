@extends('layouts.app')  

@section('content')  
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        {{-- Header Section --}}
        <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-6">
            <h1 class="text-3xl font-bold text-white">Daftar Barang Masuk</h1>
        </div>

        {{-- Filter dan Aksi --}}
        <div class="p-6 bg-gray-50 border-b">
            <div class="flex justify-between items-center">
                <div class="flex space-x-4">
                    {{-- Tombol Tambah Baru --}}
                    <a href="{{ route('barang-masuk.create') }}"
                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md transition">
                        + Tambah Barang Masuk
                    </a>

                    {{-- Filter Divisi --}}
                    <select class="form-select border rounded-md px-3 py-2">
                        <option>Filter Divisi</option>
                        @foreach($divisis as $divisi)  
                            <option value="{{ $divisi->nama_divisi }}">
                                {{ $divisi->nama_divisi }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Pencarian --}}
                <input type="text" placeholder="Cari Barang Masuk..." class="border rounded-md px-3 py-2 w-1/3">
            </div>
        </div>

        {{-- Tabel Barang Masuk --}}
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left">Nama Lengkap</th>
                        <th class="px-4 py-3 text-left">Divisi</th>
                        <th class="px-4 py-3 text-left">Produk</th>
                        <th class="px-4 py-3 text-left">Gambar</th>
                        <th class="px-4 py-3 text-left">Kuantitas</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barangMasuk as $item)  
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="px-4 py-3">{{ $item->nama_lengkap }}</td>
                            <td class="px-4 py-3">{{ $item->divisi }}</td>
                            <td class="px-4 py-3">{{ $item->produk->nama_produk }}</td>
                            <td class="px-4 py-3">
                                <img src="{{ asset('storage/' . $item->produk->gambar) }}"
                                    class="w-16 h-16 object-cover rounded-md">
                            </td>
                            <td class="px-4 py-3">{{ $item->quantity }}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('barang-masuk.edit', $item) }}"
                                        class="text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button onclick="confirmDelete({{ $item->id }})"
                                        class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="p-6">
            {{ $barangMasuk->links() }}
        </div>
    </div>
</div>

{{-- Modal Konfirmasi --}}
<script>
    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus barang masuk ini?')) {
            // Logika hapus  
        }
    }  
</script>
@endsection