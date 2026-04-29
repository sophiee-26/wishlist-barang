<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap');

        .rf * { font-family: 'Nunito', sans-serif; box-sizing: border-box; }

        .rf-header { margin-bottom: 24px; }
        .rf-title  { font-size: 1.75rem; font-weight: 900; color: #1e3a35; letter-spacing: -0.5px; margin-bottom: 4px; }
        .rf-sub    { font-size: 0.88rem; font-weight: 400; color: #8ab5ae; }

        /* Field */
        .rf-field  { margin-bottom: 16px; }
        .rf-label  { display: block; font-size: 0.8rem; font-weight: 700; color: #4a7068; margin-bottom: 7px; transition: color .2s; }
        .rf-field:focus-within .rf-label { color: #147a6e; }

        .rf-wrap { position: relative; }
        .rf-ico {
            position: absolute; left: 13px; top: 50%;
            transform: translateY(-50%);
            width: 17px; height: 17px; color: #b0d9d4;
            pointer-events: none; transition: color .2s;
        }
        .rf-field:focus-within .rf-ico { color: #1a9e8f; }

        .rf-input {
            width: 100%; border: 2px solid #c8e8e3; border-radius: 14px;
            background: #f0faf9; padding: 13px 14px 13px 42px;
            font-family: 'Nunito', sans-serif; font-size: 0.9rem; font-weight: 500;
            color: #1e3a35; outline: none;
            transition: border-color .2s, background .2s, box-shadow .2s;
            -webkit-appearance: none;
        }
        .rf-input::placeholder { color: #8ab5ae; font-weight: 400; }
        .rf-input:focus {
            border-color: #1a9e8f; background: #fff;
            box-shadow: 0 0 0 4px rgba(26,158,143,.1);
        }
        .rf-input-pwd { padding-right: 48px; }

        /* Toggle */
        .rf-toggle {
            position: absolute; right: 13px; top: 50%;
            transform: translateY(-50%);
            background: none; border: none; cursor: pointer;
            padding: 5px; color: #b0d9d4; border-radius: 8px;
            display: flex; align-items: center;
            transition: color .2s, background .2s, transform .15s;
        }
        .rf-toggle:hover { color: #1a9e8f; background: #e8f8f6; transform: translateY(-50%) scale(1.1); }
        .rf-toggle svg { width: 17px; height: 17px; }

        /* Hint */
        .rf-hint { font-size: 0.72rem; color: #8ab5ae; margin-top: 5px; font-weight: 400; }
        .rf-error { font-size: 0.76rem; color: #e05252; margin-top: 5px; font-weight: 600; }

        /* Terms */
        .rf-terms {
            display: flex; align-items: flex-start; gap: 9px;
            margin-bottom: 22px; margin-top: 4px;
        }
        .rf-terms input[type="checkbox"] {
            width: 16px; height: 16px; border-radius: 5px; flex-shrink: 0;
            cursor: pointer; accent-color: #1a9e8f; margin-top: 1px;
        }
        .rf-terms label {
            font-size: 0.82rem; font-weight: 500; color: #4a7068;
            cursor: pointer; line-height: 1.5;
        }
        .rf-terms a { color: #1a9e8f; font-weight: 700; text-decoration: none; }
        .rf-terms a:hover { opacity: .75; }

        /* Submit */
        .rf-submit {
            width: 100%; padding: 14px; border: none; border-radius: 14px;
            background: linear-gradient(135deg, #147a6e 0%, #1a9e8f 60%, #22b5a4 100%);
            background-size: 200%;
            color: #fff; font-family: 'Nunito', sans-serif;
            font-size: 0.92rem; font-weight: 800;
            cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px;
            position: relative; overflow: hidden;
            transition: transform .2s, box-shadow .25s, background-position .4s;
            box-shadow: 0 5px 18px rgba(26,158,143,.32);
            margin-bottom: 20px;
        }
        .rf-submit:hover { transform: translateY(-2px); background-position: right center; box-shadow: 0 10px 26px rgba(26,158,143,.4); }
        .rf-submit:active { transform: translateY(0); }
        .rf-submit::after {
            content: ''; position: absolute; top: 0; left: -100%;
            width: 50%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,.22), transparent);
            transition: left .45s;
        }
        .rf-submit:hover::after { left: 160%; }

        /* Divider */
        .rf-divider { display: flex; align-items: center; gap: 12px; margin-bottom: 20px; }
        .rf-divider-line { flex: 1; height: 1.5px; background: #d4f0e8; border-radius: 2px; }
        .rf-divider-txt { font-size: 0.76rem; font-weight: 600; color: #8ab5ae; }

        /* Login box */
        .rf-login {
            background: linear-gradient(135deg, #e8f8f6, #edfaf6);
            border: 2px dashed rgba(26,158,143,.22); border-radius: 16px;
            padding: 15px 18px;
            display: flex; align-items: center; justify-content: space-between; gap: 12px;
        }
        .rf-login p    { font-size: 0.83rem; font-weight: 800; color: #1e3a35; margin-bottom: 2px; }
        .rf-login span { font-size: 0.74rem; font-weight: 400; color: #8ab5ae; }
        .rf-login-btn {
            font-size: 0.85rem; font-weight: 800; color: white; background: #1a9e8f;
            text-decoration: none; display: inline-flex; align-items: center; gap: 5px;
            padding: 9px 16px; border-radius: 10px; white-space: nowrap;
            box-shadow: 0 3px 10px rgba(26,158,143,.28);
            transition: background .2s, transform .15s, box-shadow .2s; flex-shrink: 0;
        }
        .rf-login-btn:hover { background: #147a6e; transform: translateY(-1px); box-shadow: 0 6px 16px rgba(26,158,143,.35); }
        .rf-login-btn svg { width: 14px; height: 14px; }
    </style>

    <!-- Header -->
    <div class="rf rf-header">
        <h2 class="rf-title">Buat Akun 🎉</h2>
        <p class="rf-sub">Daftar gratis dan mulai simpan wishlist impianmu</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="rf">
        @csrf

        <!-- Name -->
        <div class="rf-field">
            <x-input-label for="name" :value="__('Nama Lengkap')" class="rf-label" />
            <div class="rf-wrap">
                <svg class="rf-ico" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                <x-text-input
                    id="name"
                    class="rf-input"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Masukkan nama lengkap Anda"
                />
            </div>
            <x-input-error :messages="$errors->get('name')" class="rf-error" />
        </div>

        <!-- Email -->
        <div class="rf-field">
            <x-input-label for="email" :value="__('Email')" class="rf-label" />
            <div class="rf-wrap">
                <svg class="rf-ico" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <x-text-input
                    id="email"
                    class="rf-input"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autocomplete="username"
                    placeholder="nama@email.com"
                />
            </div>
            <x-input-error :messages="$errors->get('email')" class="rf-error" />
        </div>

        <!-- Password -->
        <div class="rf-field">
            <x-input-label for="password" :value="__('Password')" class="rf-label" />
            <div class="rf-wrap">
                <svg class="rf-ico" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                <x-text-input
                    id="password"
                    class="rf-input rf-input-pwd"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Minimal 8 karakter"
                />
                <button type="button" class="rf-toggle" id="pwd-btn" onclick="togglePwd('password','ic-eye-1','ic-off-1')" aria-label="Tampilkan password">
                    <svg id="ic-eye-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <svg id="ic-off-1" style="display:none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="rf-error" />
            <p class="rf-hint">Password harus mengandung huruf, angka, dan karakter khusus</p>
        </div>

        <!-- Confirm Password -->
        <div class="rf-field">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="rf-label" />
            <div class="rf-wrap">
                <svg class="rf-ico" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                <x-text-input
                    id="password_confirmation"
                    class="rf-input rf-input-pwd"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Ulang password Anda"
                />
                <button type="button" class="rf-toggle" onclick="togglePwd('password_confirmation','ic-eye-2','ic-off-2')" aria-label="Tampilkan konfirmasi password">
                    <svg id="ic-eye-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <svg id="ic-off-2" style="display:none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="rf-error" />
        </div>

        <!-- Terms -->
        <div class="rf-terms">
            <input id="agree_terms" type="checkbox" name="agree_terms" required>
            <label for="agree_terms">
                Saya setuju dengan <a href="#">Syarat &amp; Ketentuan</a> yang berlaku
            </label>
        </div>

        <!-- Submit -->
        <button type="submit" class="rf-submit">
            <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
            </svg>
            Buat Akun
        </button>

        <!-- Divider -->
        <div class="rf-divider">
            <div class="rf-divider-line"></div>
            <span class="rf-divider-txt">sudah punya akun?</span>
            <div class="rf-divider-line"></div>
        </div>

        <!-- Login box -->
        <div class="rf-login">
            <div>
                <p>Masuk sekarang! 👋</p>
                <span>Lanjutkan ke wishlist impianmu</span>
            </div>
            <a href="{{ route('login') }}" class="rf-login-btn">
                Masuk
                <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </form>

    <script>
        function togglePwd(inputId, eyeId, offId) {
            const inp = document.getElementById(inputId);
            const eye = document.getElementById(eyeId);
            const off = document.getElementById(offId);
            const show = inp.type === 'password';
            inp.type        = show ? 'text'  : 'password';
            eye.style.display = show ? 'none'  : '';
            off.style.display = show ? ''      : 'none';
        }
    </script>
</x-guest-layout>