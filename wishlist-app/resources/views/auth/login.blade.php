<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap');

        .lf * { font-family: 'Nunito', sans-serif; box-sizing: border-box; }

        .lf-header { margin-bottom: 28px; }
        .lf-title  { font-size: 1.75rem; font-weight: 900; color: #1e3a35; letter-spacing: -0.5px; margin-bottom: 4px; }
        .lf-sub    { font-size: 0.88rem; font-weight: 400; color: #8ab5ae; }

        .lf-field  { margin-bottom: 18px; }
        .lf-label  { display: block; font-size: 0.8rem; font-weight: 700; color: #4a7068; margin-bottom: 7px; transition: color .2s; }
        .lf-field:focus-within .lf-label { color: #147a6e; }

        .lf-wrap-input { position: relative; }
        .lf-ico { position: absolute; left: 13px; top: 50%; transform: translateY(-50%); width: 17px; height: 17px; color: #b0d9d4; pointer-events: none; transition: color .2s; }
        .lf-field:focus-within .lf-ico { color: #1a9e8f; }

        .lf-input {
            width: 100%; border: 2px solid #c8e8e3; border-radius: 14px;
            background: #f0faf9; padding: 13px 14px 13px 42px;
            font-family: 'Nunito', sans-serif; font-size: 0.9rem; font-weight: 500; color: #1e3a35;
            outline: none; transition: border-color .2s, background .2s, box-shadow .2s; -webkit-appearance: none;
        }
        .lf-input::placeholder { color: #8ab5ae; font-weight: 400; }
        .lf-input:focus { border-color: #1a9e8f; background: #fff; box-shadow: 0 0 0 4px rgba(26,158,143,.1); }
        .lf-input-pwd { padding-right: 48px; }

        .lf-toggle { position: absolute; right: 13px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; padding: 5px; color: #b0d9d4; border-radius: 8px; display: flex; align-items: center; transition: color .2s, background .2s, transform .15s; }
        .lf-toggle:hover { color: #1a9e8f; background: #e8f8f6; transform: translateY(-50%) scale(1.1); }
        .lf-toggle svg { width: 17px; height: 17px; }

        .lf-error { font-size: 0.76rem; color: #e05252; margin-top: 5px; font-weight: 600; }

        .lf-remember { display: flex; align-items: center; gap: 8px; margin-bottom: 22px; }
        .lf-remember input { width: 16px; height: 16px; border-radius: 5px; cursor: pointer; accent-color: #1a9e8f; flex-shrink: 0; }
        .lf-remember label { font-size: 0.83rem; font-weight: 600; color: #4a7068; cursor: pointer; user-select: none; transition: color .2s; }
        .lf-remember label:hover { color: #1e3a35; }

        .lf-actions { display: flex; align-items: center; justify-content: space-between; gap: 14px; margin-bottom: 24px; }
        .lf-forgot { font-size: 0.83rem; font-weight: 700; color: #1a9e8f; text-decoration: none; white-space: nowrap; transition: opacity .2s; }
        .lf-forgot:hover { opacity: .7; }

        .lf-btn {
            flex: 1; padding: 13px 20px; border: none; border-radius: 14px;
            background: linear-gradient(135deg, #147a6e 0%, #1a9e8f 60%, #22b5a4 100%);
            background-size: 200%; color: #fff;
            font-family: 'Nunito', sans-serif; font-size: 0.92rem; font-weight: 800;
            cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px;
            position: relative; overflow: hidden;
            transition: transform .2s, box-shadow .25s, background-position .4s;
            box-shadow: 0 5px 18px rgba(26,158,143,.32);
        }
        .lf-btn:hover { transform: translateY(-2px); background-position: right center; box-shadow: 0 10px 26px rgba(26,158,143,.4); }
        .lf-btn:active { transform: translateY(0); }
        .lf-btn::after { content: ''; position: absolute; top: 0; left: -100%; width: 50%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,.22), transparent); transition: left .45s; }
        .lf-btn:hover::after { left: 160%; }

        .lf-divider { display: flex; align-items: center; gap: 12px; margin-bottom: 20px; }
        .lf-divider-line { flex: 1; height: 1.5px; background: #d4f0e8; border-radius: 2px; }
        .lf-divider-txt { font-size: 0.76rem; font-weight: 600; color: #8ab5ae; }

        .lf-register {
            background: linear-gradient(135deg, #e8f8f6, #edfaf6);
            border: 2px dashed rgba(26,158,143,.22); border-radius: 16px;
            padding: 15px 18px;
            display: flex; align-items: center; justify-content: space-between; gap: 12px;
        }
        .lf-register p    { font-size: 0.83rem; font-weight: 800; color: #1e3a35; margin-bottom: 2px; }
        .lf-register span { font-size: 0.74rem; font-weight: 400; color: #8ab5ae; }
        .lf-register-btn {
            font-size: 0.85rem; font-weight: 800; color: white; background: #1a9e8f;
            text-decoration: none; display: inline-flex; align-items: center; gap: 5px;
            padding: 9px 16px; border-radius: 10px; white-space: nowrap;
            box-shadow: 0 3px 10px rgba(26,158,143,.28);
            transition: background .2s, transform .15s, box-shadow .2s; flex-shrink: 0;
        }
        .lf-register-btn:hover { background: #147a6e; transform: translateY(-1px); box-shadow: 0 6px 16px rgba(26,158,143,.35); }
        .lf-register-btn svg { width: 14px; height: 14px; }
    </style>

    <!-- Header -->
    <div class="lf lf-header">
        <h2 class="lf-title">Masuk 👋</h2>
        <p class="lf-sub">Selamat kembali! Silakan masuk ke akun Anda</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="lf">
        @csrf

        <!-- Email Address -->
        <div class="lf-field">
            <x-input-label for="email" :value="__('Email')" class="lf-label" />
            <div class="lf-wrap-input">
                <svg class="lf-ico" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <x-text-input
                    id="email"
                    class="lf-input"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="nama@email.com"
                />
            </div>
            <x-input-error :messages="$errors->get('email')" class="lf-error" />
        </div>

        <!-- Password -->
        <div class="lf-field">
            <x-input-label for="password" :value="__('Password')" class="lf-label" />
            <div class="lf-wrap-input">
                <svg class="lf-ico" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                <x-text-input
                    id="password"
                    class="lf-input lf-input-pwd"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Masukkan password"
                />
                <button type="button" class="lf-toggle" id="pwd-btn" onclick="togglePwd()" aria-label="Tampilkan password">
                    <svg id="ic-eye" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <svg id="ic-eye-off" style="display:none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="lf-error" />
        </div>

        <!-- Remember Me -->
        <div class="lf-remember">
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me">Ingat saya</label>
        </div>

        <!-- Forgot + Submit -->
        <div class="lf-actions">
            @if (Route::has('password.request'))
                <a class="lf-forgot" href="{{ route('password.request') }}">Lupa password?</a>
            @endif
            <button type="submit" class="lf-btn">
                <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                </svg>
                Masuk
            </button>
        </div>

        <!-- Divider -->
        <div class="lf-divider">
            <div class="lf-divider-line"></div>
            <span class="lf-divider-txt">atau</span>
            <div class="lf-divider-line"></div>
        </div>

        <!-- Register -->
        <div class="lf-register">
            <div>
                <p>Belum punya akun? 🎉</p>
                <span>Daftar gratis, simpan wishlist tanpa batas</span>
            </div>
            <a href="{{ route('register') }}" class="lf-register-btn">
                Daftar
                <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </form>

    <script>
        function togglePwd() {
            const inp    = document.getElementById('password');
            const eyeOn  = document.getElementById('ic-eye');
            const eyeOff = document.getElementById('ic-eye-off');
            const btn    = document.getElementById('pwd-btn');
            const show   = inp.type === 'password';
            inp.type             = show ? 'text'  : 'password';
            eyeOn.style.display  = show ? 'none'  : '';
            eyeOff.style.display = show ? ''      : 'none';
            btn.setAttribute('aria-label', show ? 'Sembunyikan password' : 'Tampilkan password');
        }
    </script>
</x-guest-layout>