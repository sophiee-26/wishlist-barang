<section class="space-y-6">
    <header>
        <h2 class="text-2xl font-bold text-gray-800">Ubah Password</h2>
        <p class="mt-1 text-gray-600">Pastikan password Anda kuat dan aman.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-sm font-semibold text-gray-700 mb-2">🔒 Password Saat Ini</label>
            <input id="update_password_current_password" name="current_password" type="password" class="input-modern w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-500 text-sm" />
        </div>

        <div>
            <label for="update_password_password" class="block text-sm font-semibold text-gray-700 mb-2">🔐 Password Baru</label>
            <input id="update_password_password" name="password" type="password" class="input-modern w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-500 text-sm" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">🔐 Konfirmasi Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="input-modern w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn-gradient">Simpan Password</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
