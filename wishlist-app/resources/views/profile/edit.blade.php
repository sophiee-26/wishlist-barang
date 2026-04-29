<x-app-layout>
    <style>
        .profile-gradient {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        }
        .avatar-circle {
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.25);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
        }
        .tab-btn {
            padding: 14px 24px;
            font-size: 15px;
            border: none;
            background: transparent;
            cursor: pointer;
            color: #6b7280;
            border-bottom: 2px solid transparent;
            transition: color 0.2s;
        }
        .tab-btn.active {
            color: #111827;
            font-weight: 600;
            border-bottom: 2px solid #7c3aed;
        }
        .tab-btn:hover:not(.active) {
            color: #374151;
        }
        .form-input {
            width: 100%;
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 15px;
            margin-top: 6px;
            outline: none;
            transition: border-color 0.2s;
            box-sizing: border-box;
        }
        .form-input:focus {
            border-color: #7c3aed;
            box-shadow: 0 0 0 3px rgba(124,58,237,0.08);
        }
        .form-label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
        }
        .form-label svg {
            width: 16px;
            height: 16px;
            color: #7c3aed;
        }
        .btn-save {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 12px 32px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.2s;
        }
        .btn-save:hover {
            opacity: 0.9;
        }
    </style>

    <div class="py-10" style="background:#f0f4f8; min-height:100vh;">
        <div style="max-width:700px; margin:0 auto; padding:0 16px;">

            {{-- Profile Header --}}
            <div class="profile-gradient" style="border-radius:18px; padding:32px 36px; display:flex; align-items:center; gap:24px; color:#fff; margin-bottom:24px;">
                <div class="avatar-circle">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div>
                    <h1 style="font-size:1.7rem; font-weight:700; margin:0 0 4px;">{{ auth()->user()->name }}</h1>
                    <p style="margin:0; opacity:0.88; font-size:15px;">{{ auth()->user()->email }}</p>
                </div>
            </div>

            {{-- Tabs Card --}}
            <div style="background:#fff; border-radius:18px; overflow:hidden; box-shadow:0 2px 16px rgba(0,0,0,0.07);">

                {{-- Tab Nav --}}
                <nav style="display:flex; border-bottom:1px solid #e5e7eb;">
                    <button id="tab-info" class="tab-btn active">Informasi</button>
                    <button id="tab-password" class="tab-btn">Password</button>
                    <button id="tab-delete" class="tab-btn">Hapus Akun</button>
                </nav>

                {{-- Tab: Informasi --}}
                <div id="content-info" style="padding:32px 36px;">

                    <h2 style="font-size:1.25rem; font-weight:700; margin:0 0 6px; color:#111827;">Informasi Akun</h2>
                    <p style="color:#6b7280; font-size:14px; margin:0 0 24px;">Perbarui nama dan alamat email Anda.</p>

                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        {{-- Nama Lengkap --}}
                        <div style="margin-bottom:18px;">
                            <label class="form-label">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 0112 15a9 9 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                Nama Lengkap
                            </label>
                            <input type="text" name="name" class="form-input"
                                value="{{ old('name', auth()->user()->name) }}" placeholder="Nama lengkap Anda">
                            @error('name')<p style="color:#dc2626;font-size:13px;margin-top:4px;">{{ $message }}</p>@enderror
                        </div>

                        {{-- Email --}}
                        <div style="margin-bottom:18px;">
                            <label class="form-label">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                Email
                            </label>
                            <input type="email" name="email" class="form-input"
                                value="{{ old('email', auth()->user()->email) }}" placeholder="Alamat email Anda">
                            @error('email')<p style="color:#dc2626;font-size:13px;margin-top:4px;">{{ $message }}</p>@enderror
                        </div>

                        {{-- No HP --}}
                        <div style="margin-bottom:18px;">
                            <label class="form-label">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                No HP
                            </label>
                            <input type="text" name="no_hp" class="form-input"
                                value="{{ old('no_hp', auth()->user()->no_hp) }}" placeholder="Nomor HP Anda">
                            @error('no_hp')<p style="color:#dc2626;font-size:13px;margin-top:4px;">{{ $message }}</p>@enderror
                        </div>

                        {{-- Alamat --}}
                        <div style="margin-bottom:18px;">
                            <label class="form-label">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                Alamat
                            </label>
                            <textarea name="alamat" rows="3" class="form-input" placeholder="Alamat Anda">{{ old('alamat', auth()->user()->alamat) }}</textarea>
                            @error('alamat')<p style="color:#dc2626;font-size:13px;margin-top:4px;">{{ $message }}</p>@enderror
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div style="margin-bottom:18px;">
                            <label class="form-label">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Tanggal Lahir
                            </label>
                            <input type="date" name="tanggal_lahir" class="form-input"
                                value="{{ old('tanggal_lahir', auth()->user()->tanggal_lahir) }}">
                            @error('tanggal_lahir')<p style="color:#dc2626;font-size:13px;margin-top:4px;">{{ $message }}</p>@enderror
                        </div>

                        {{-- Foto Profil --}}
                        <div style="margin-bottom:28px;">
                            <label class="form-label" style="margin-bottom:8px;">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Foto Profil
                            </label>
                            <input type="file" name="foto" accept="image/*"
                                style="font-size:14px; color:#374151;">
                        </div>

                        <div style="display:flex; align-items:center; gap:16px;">
                            <button type="submit" class="btn-save">Simpan Perubahan</button>
                            @if (session('status') === 'profile-updated')
                                <p style="color:#059669; font-size:14px; margin:0;">Tersimpan!</p>
                            @endif
                        </div>

                    </form>
                </div>

                {{-- Tab: Password --}}
                <div id="content-password" class="hidden" style="padding:32px 36px;">
                    @include('profile.partials.update-password-form')
                </div>

                {{-- Tab: Hapus Akun --}}
                <div id="content-delete" class="hidden" style="padding:32px 36px;">
                    @include('profile.partials.delete-user-form')
                </div>

            </div>
        </div>
    </div>

    <script>
        const tabs = ['info', 'password', 'delete'];
        tabs.forEach(name => {
            document.getElementById('tab-' + name).addEventListener('click', () => {
                tabs.forEach(n => {
                    document.getElementById('tab-' + n).classList.remove('active');
                    document.getElementById('content-' + n).classList.add('hidden');
                });
                document.getElementById('tab-' + name).classList.add('active');
                document.getElementById('content-' + name).classList.remove('hidden');
            });
        });
    </script>
</x-app-layout>