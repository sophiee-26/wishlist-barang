<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(auth()->user()->foto)
                <img
                    src="{{ asset('storage/' . auth()->user()->foto) }}"
                    alt="{{ auth()->user()->name }}"
                    style="width:36px; height:36px; border-radius:50%; object-fit:cover; border:2px solid #fff; box-shadow:0 2px 8px rgba(0,0,0,.2); flex-shrink:0;"
                >
            @else
                <div style="width:36px; height:36px; border-radius:50%; background:#fff; display:flex; align-items:center; justify-content:center; color:#7c3aed; font-weight:800; font-size:15px; flex-shrink:0;">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
            @endif
            <!-- Hero Section -->
            <div class="bg-gradient-to-br from-purple-600 via-pink-500 to-red-500 rounded-2xl shadow-2xl overflow-hidden mb-12 relative animate-fade-in-up">
                <div class="relative px-8 py-16 sm:px-12 sm:py-24">
                    <!-- Decorative elements -->
                    <div class="absolute top-0 right-0 w-80 h-80 bg-white opacity-10 rounded-full -mr-40 -mt-40"></div>
                    <div class="absolute bottom-0 left-0 w-60 h-60 bg-white opacity-10 rounded-full -ml-30 -mb-30"></div>

                    <!-- user mini card (top right) -->
                    <div class="absolute top-6 right-8 flex items-center gap-3 bg-white bg-opacity-30 backdrop-blur-sm rounded-full px-4 py-2 animate-slide-in-right">

                        {{-- Foto profil atau inisial --}}
                        @if(auth()->user()->foto && file_exists(public_path('storage/' . auth()->user()->foto)))
                            <img
                                src="{{ asset('storage/' . auth()->user()->foto) }}"
                                alt="{{ auth()->user()->name }}"
                                class="w-9 h-9 rounded-full object-cover border-2 border-white shadow"
                                style="width:36px; height:36px; border-radius:50%; object-fit:cover; border:2px solid #fff; box-shadow:0 2px 8px rgba(0,0,0,.2); flex-shrink:0;"
                            >
                        @else
                            <div style="width:36px; height:36px; border-radius:50%; background:#fff; display:flex; align-items:center; justify-content:center; color:#7c3aed; font-weight:800; font-size:15px; flex-shrink:0; box-shadow:0 2px 8px rgba(0,0,0,.15);">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                        @endif

                        <div style="display:flex; flex-direction:column; line-height:1.2;">
                            <span class="text-white font-semibold" style="font-size:14px;">{{ auth()->user()->name }}</span>
                            <span style="font-size:11px; color:rgba(255,255,255,0.75);">{{ auth()->user()->email }}</span>
                        </div>
                    </div>

                    <div class="relative z-10">
                        <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4 animate-fade-in-up">
                            Selamat datang! 👋
                        </h1>
                        <p class="text-xl text-purple-100 mb-8 animate-fade-in-up delay-150">
                            Kelola wishlist barang impian Anda dengan mudah dan teratur
                        </p>
                        <a href="/wishlist" class="inline-block bg-white text-purple-600 font-bold px-8 py-3 rounded-lg hover:bg-purple-50 transform hover:scale-105 transition duration-300 shadow-lg animate-glow">
                            Lihat Wishlist Saya
                        </a>
                    </div>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8 animate-fade-in-up">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $total_items = \App\Models\Wishlist::where('user_id', auth()->id())->count();
                    $total_price = \App\Models\Wishlist::where('user_id', auth()->id())->sum('harga');
                    $purchased   = \App\Models\Wishlist::where('user_id', auth()->id())->where('status', 1)->count();
                @endphp

                <!-- Total Items Card -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transform hover:scale-105 transition duration-300 p-6 border-t-4 border-blue-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-semibold uppercase">Total Barang</p>
                            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $total_items }}</p>
                        </div>
                        <div class="bg-blue-100 p-4 rounded-lg">
                            <svg class="w-8 h-8 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 6H6.28l-.31-1.243A1 1 0 005 4H3a1 1 0 000 2h1.4l.4 1.6v.041l.13.581h12.488a1 1 0 00.88-.519l3-6A1 1 0 0017 1H3z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Price Card -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transform hover:scale-105 transition duration-300 p-6 border-t-4 border-green-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-semibold uppercase">Total Harga</p>
                            <p class="text-3xl font-bold text-gray-800 mt-2">Rp {{ number_format($total_price) }}</p>
                        </div>
                        <div class="bg-green-100 p-4 rounded-lg">
                            <svg class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Purchased Items Card -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transform hover:scale-105 transition duration-300 p-6 border-t-4 border-purple-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-semibold uppercase">Sudah Dibeli</p>
                            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $purchased }}</p>
                        </div>
                        <div class="bg-purple-100 p-4 rounded-lg">
                            <svg class="w-8 h-8 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Action & Info -->
            <div class="bg-white rounded-2xl shadow-lg p-6 animate-slide-in-left mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Quick Actions -->
                    <div class="bg-white rounded-xl shadow-md p-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">⚡ Aksi Cepat</h3>
                        <div class="space-y-3">
                            <a href="/wishlist/create" class="block w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white font-bold py-3 px-4 rounded-lg hover:shadow-lg transform hover:scale-102 transition duration-300 text-center">
                                ➕ Tambah Barang Baru
                            </a>
                            <a href="/wishlist" class="block w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold py-3 px-4 rounded-lg hover:shadow-lg transform hover:scale-102 transition duration-300 text-center">
                                📋 Lihat Semua Wishlist
                            </a>
                        </div>
                    </div>

                    <!-- Tips & Info -->
                    <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-xl shadow-md p-8 border-l-4 border-orange-500">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">💡 Tips</h3>
                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start">
                                <span class="text-orange-500 mr-3 font-bold">✓</span>
                                <span>Atur prioritas barang untuk kemudahan identifikasi</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-orange-500 mr-3 font-bold">✓</span>
                                <span>Tambahkan gambar untuk referensi visual produk</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-orange-500 mr-3 font-bold">✓</span>
                                <span>Catat link toko untuk akses mudah</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>