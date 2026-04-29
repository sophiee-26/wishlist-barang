<x-app-layout>
    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-10">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">✏️ Edit Barang</h1>
                <p class="text-gray-600 text-lg">Perbarui informasi barang yang sudah ada</p>
            </div>

            <form action="{{ route('wishlist.update', $wishlist->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Basic Information Section -->
                <div class="bg-white rounded-2xl shadow-lg p-8 border-t-4 border-indigo-600">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <span class="bg-indigo-600 text-white w-10 h-10 rounded-full flex items-center justify-center mr-3">1</span>
                        Informasi Dasar
                    </h2>

                    <div class="space-y-6">
                        <!-- Nama Barang -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">📦 Nama Barang <span class="text-red-500">*</span></label>
                            <input type="text" 
                                name="nama_barang" 
                                placeholder="Contoh: Laptop Gaming ASUS ROG..."
                                class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-indigo-500 focus:outline-none transition duration-200 focus:ring-2 focus:ring-indigo-200"
                                required
                                value="{{ $wishlist->nama_barang }}">
                            @error('nama_barang')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Harga -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">💰 Harga <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute left-4 top-3 text-gray-600 font-semibold">Rp</span>
                                <input type="number" 
                                    name="harga" 
                                    placeholder="10000000"
                                    class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 pl-12 focus:border-indigo-500 focus:outline-none transition duration-200 focus:ring-2 focus:ring-indigo-200"
                                    required
                                    value="{{ $wishlist->harga }}">
                            </div>
                            @error('harga')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Link Toko -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">🛒 Link Toko / Marketplace</label>
                            <input type="url" 
                                name="link_toko" 
                                placeholder="https://tokopedia.com/... atau https://shopee.co.id/..."
                                class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-indigo-500 focus:outline-none transition duration-200 focus:ring-2 focus:ring-indigo-200"
                                value="{{ $wishlist->link_toko }}">
                            <p class="text-gray-500 text-sm mt-2">💡 Masukkan link toko untuk akses cepat ke produk</p>
                            @error('link_toko')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Details Section -->
                <div class="bg-white rounded-2xl shadow-lg p-8 border-t-4 border-purple-600">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <span class="bg-purple-600 text-white w-10 h-10 rounded-full flex items-center justify-center mr-3">2</span>
                        Detail Produk
                    </h2>

                    <div class="space-y-6">
                        <!-- Prioritas -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">⭐ Tingkat Prioritas <span class="text-red-500">*</span></label>
                            <div class="grid grid-cols-3 gap-4">
                                <label class="relative flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500 transition hover:bg-indigo-50"
                                    style="border-color: {{ $wishlist->prioritas == 'Tinggi' ? '#4f46e5' : '' }};">
                                    <input type="radio" name="prioritas" value="Tinggi" class="w-4 h-4" required {{ $wishlist->prioritas == 'Tinggi' ? 'checked' : '' }}>
                                    <span class="ml-3 font-semibold">🔴 Tinggi</span>
                                </label>
                                <label class="relative flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500 transition hover:bg-indigo-50"
                                    style="border-color: {{ $wishlist->prioritas == 'Sedang' ? '#4f46e5' : '' }};">
                                    <input type="radio" name="prioritas" value="Sedang" class="w-4 h-4" {{ $wishlist->prioritas == 'Sedang' ? 'checked' : '' }}>
                                    <span class="ml-3 font-semibold">🟡 Sedang</span>
                                </label>
                                <label class="relative flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500 transition hover:bg-indigo-50"
                                    style="border-color: {{ $wishlist->prioritas == 'Rendah' ? '#4f46e5' : '' }};">
                                    <input type="radio" name="prioritas" value="Rendah" class="w-4 h-4" {{ $wishlist->prioritas == 'Rendah' ? 'checked' : '' }}>
                                    <span class="ml-3 font-semibold">🟢 Rendah</span>
                                </label>
                            </div>
                            @error('prioritas')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">✅ Status Pembelian</label>

                    <!-- ✅ TAMBAHAN INI -->
                    <input type="hidden" name="status" value="0">

                    <div class="grid grid-cols-2 gap-4">
                        <label class="relative flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500 transition hover:bg-indigo-50">
                            <input type="radio" name="status" value="0" class="w-4 h-4"
                                {{ $wishlist->status == 0 ? 'checked' : '' }}>
                            <span class="ml-3 font-semibold">⏳ Belum Dibeli</span>
                        </label>

                        <label class="relative flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500 transition hover:bg-indigo-50">
                            <input type="radio" name="status" value="1" class="w-4 h-4"
                                {{ $wishlist->status == 1 ? 'checked' : '' }}>
                            <span class="ml-3 font-semibold">✅ Sudah Dibeli</span>
                        </label>
                    </div>
                </div>

                <!-- Media & Notes Section -->
                <div class="bg-white rounded-2xl shadow-lg p-8 border-t-4 border-pink-600">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <span class="bg-pink-600 text-white w-10 h-10 rounded-full flex items-center justify-center mr-3">3</span>
                        Media & Catatan
                    </h2>

                    <div class="space-y-6">
                        <!-- Current Image -->
                        @if($wishlist->gambar)
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-3">📷 Foto Saat Ini</label>
                                <img src="{{ asset('storage/'.$wishlist->gambar) }}" class="max-h-60 rounded-lg shadow-md">
                            </div>
                        @endif

                        <!-- Gambar Baru -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">📷 Update Foto Produk</label>
                            <div class="relative">
                                <img src="{{ $wishlist->gambar ? asset($wishlist->gambar) : 'https://via.placeholder.com/300' }}" alt="{{ $wishlist->nama_barang }}">
                                <label for="gambar" class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center cursor-pointer hover:border-indigo-500 hover:bg-indigo-50 transition">
                                    <div id="preview" class="hidden">
                                        <img id="previewImg" class="max-h-60 mx-auto rounded-lg mb-3" alt="Preview">
                                        <p class="text-sm text-gray-600">Klik untuk mengganti foto</p>
                                    </div>
                                    <div id="placeholder">
                                        <svg class="mx-auto h-12 w-12 text-gray-300 mb-2" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-12l-3.172-3.172a4 4 0 00-5.656 0L28 20M9 20l3.172-3.172a4 4 0 015.656 0L28 20m19-7a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <p class="text-gray-700 font-semibold">Tarik gambar atau klik untuk upload</p>
                                        <p class="text-gray-500 text-sm">PNG, JPG hingga 5MB</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Catatan -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">📝 Catatan Tambahan</label>
                            <textarea name="catatan" 
                                placeholder="Contoh: Warna favorit adalah hitam, brandnya harus original, dll..."
                                rows="4"
                                class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-indigo-500 focus:outline-none transition duration-200 focus:ring-2 focus:ring-indigo-200">{{ $wishlist->catatan }}</textarea>
                            <p class="text-gray-500 text-sm mt-2">💡 Tambahkan catatan khusus untuk produk ini (opsional)</p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 justify-end">
                    <a href="/wishlist" class="px-8 py-4 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold rounded-lg transition duration-300 transform hover:scale-105">
                        ← Kembali
                    </a>
                    <button type="submit" class="px-8 py-4 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold rounded-lg shadow-lg transition duration-300 transform hover:scale-105 flex items-center gap-2">
                        <span>✅ Perbarui Barang</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('preview').classList.remove('hidden');
                    document.getElementById('placeholder').classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>