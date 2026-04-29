<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap');
        .fp * { font-family: 'Nunito', sans-serif; box-sizing: border-box; }

        .fp-header { margin-bottom: 24px; }
        .fp-icon {
            width: 48px; height: 48px; border-radius: 14px;
            background: linear-gradient(135deg, #147a6e, #1a9e8f);
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 4px 14px rgba(26,158,143,.28);
            margin-bottom: 16px;
        }
        .fp-title { font-size: 1.75rem; font-weight: 900; color: #1e3a35; letter-spacing: -0.5px; margin-bottom: 4px; }
        .fp-sub   { font-size: 0.86rem; font-weight: 400; color: #8ab5ae; line-height: 1.6; }

        /* Info box */
        .fp-info {
            background: #e8f8f6; border: 1.5px solid rgba(26,158,143,.2);
            border-radius: 12px; padding: 13px 16px;
            margin-bottom: 22px;
            display: flex; align-items: flex-start; gap: 10px;
        }
        .fp-info svg { width: 16px; height: 16px; color: #1a9e8f; flex-shrink: 0; margin-top: 1px; }
        .fp-info p { font-size: 0.82rem; font-weight: 500; color: #4a7068; line-height: 1.5; }

        /* Field */
        .fp-field { margin-bottom: 22px; }
        .fp-label { display: block; font-size: 0.8rem; font-weight: 700; color: #4a7068; margin-bottom: 7px; transition: color .2s; }
        .fp-field:focus-within .fp-label { color: #147a6e; }

        .fp-wrap { position: relative; }
        .fp-ico {
            position: absolute; left: 13px; top: 50%;
            transform: translateY(-50%);
            width: 17px; height: 17px; color: #b0d9d4;
            pointer-events: none; transition: color .2s;
        }
        .fp-field:focus-within .fp-ico { color: #1a9e8f; }

        .fp-input {
            width: 100%; border: 2px solid #c8e8e3; border-radius: 14px;
            background: #f0faf9; padding: 13px 14px 13px 42px;
            font-family: 'Nunito', sans-serif; font-size: 0.9rem; font-weight: 500;
            color: #1e3a35; outline: none;
            transition: border-color .2s, background .2s, box-shadow .2s;
            -webkit-appearance: none;
        }
        .fp-input::placeholder { color: #8ab5ae; font-weight: 400; }
        .fp-input:focus {
            border-color: #1a9e8f; background: #fff;
            box-shadow: 0 0 0 4px rgba(26,158,143,.1);
        }

        .fp-error { font-size: 0.76rem; color: #e05252; margin-top: 5px; font-weight: 600; }

        /* Submit */
        .fp-submit {
            width: 100%; padding: 14px; border: none; border-radius: 14px;
            background: linear-gradient(135deg, #147a6e 0%, #1a9e8f 60%, #22b5a4 100%);
            background-size: 200%; color: #fff;
            font-family: 'Nunito', sans-serif; font-size: 0.92rem; font-weight: 800;
            cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px;
            position: relative; overflow: hidden;
            transition: transform .2s, box-shadow .25s, background-position .4s;
            box-shadow: 0 5px 18px rgba(26,158,143,.32);
            margin-bottom: 20px;
        }
        .fp-submit:hover { transform: translateY(-2px); background-position: right center; box-shadow: 0 10px 26px rgba(26,158,143,.4); }
        .fp-submit:active { transform: translateY(0); }
        .fp-submit::after {
            content: ''; position: absolute; top: 0; left: -100%;
            width: 50%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,.22), transparent);
            transition: left .45s;
        }
        .fp-submit:hover::after { left: 160%; }

        /* Divider */
        .fp-divider { display: flex; align-items: center; gap: 12px; margin-bottom: 20px; }
        .fp-divider-line { flex: 1; height: 1.5px; background: #d4f0e8; border-radius: 2px; }
        .fp-divider-txt  { font-size: 0.76rem; font-weight: 600; color: #8ab5ae; }

        /* Back to login box */
        .fp-back {
            background: linear-gradient(135deg, #e8f8f6, #edfaf6);
            border: 2px dashed rgba(26,158,143,.22); border-radius: 16px;
            padding: 15px 18px;
            display: flex; align-items: center; justify-content: space-between; gap: 12px;
        }
        .fp-back p    { font-size: 0.83rem; font-weight: 800; color: #1e3a35; margin-bottom: 2px; }
        .fp-back span { font-size: 0.74rem; font-weight: 400; color: #8ab5ae; }
        .fp-back-btn {
            font-size: 0.85rem; font-weight: 800; color: white; background: #1a9e8f;
            text-decoration: none; display: inline-flex; align-items: center; gap: 5px;
            padding: 9px 16px; border-radius: 10px; white-space: nowrap;
            box-shadow: 0 3px 10px rgba(26,158,143,.28);
            transition: background .2s, transform .15s, box-shadow .2s; flex-shrink: 0;
        }
        .fp-back-btn:hover { background: #147a6e; transform: translateY(-1px); box-shadow: 0 6px 16px rgba(26,158,143,.35); }
        .fp-back-btn svg { width: 14px; height: 14px; }
    </style>

    <!-- Header -->
    <div class="fp fp-header">
        <div class="fp-icon">
            <svg width="22" height="22" fill="none" stroke="white" stroke-width="2.2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
            </svg>
        </div>
        <h2 class="fp-title">Lupa Password? 🔑</h2>
        <p class="fp-sub">Tenang, kami bantu reset password Anda</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Info -->
    <div class="fp fp-info">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <p>Masukkan email Anda dan kami akan mengirimkan link untuk mereset password.</p>
    </div>

    <form method="POST" action="{{ route('password.email') }}" class="fp">
        @csrf

        <!-- Email -->
        <div class="fp-field">
            <x-input-label for="email" :value="__('Email')" class="fp-label" />
            <div class="fp-wrap">
                <svg class="fp-ico" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <x-text-input
                    id="email"
                    class="fp-input"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    placeholder="nama@email.com"
                />
            </div>
            <x-input-error :messages="$errors->get('email')" class="fp-error" />
        </div>

        <!-- Submit -->
        <button type="submit" class="fp-submit">
            <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            Kirim Link Reset Password
        </button>

        <!-- Divider -->
        <div class="fp-divider">
            <div class="fp-divider-line"></div>
            <span class="fp-divider-txt">ingat password?</span>
            <div class="fp-divider-line"></div>
        </div>

        <!-- Back to login -->
        <div class="fp-back">
            <div>
                <p>Kembali masuk 👋</p>
                <span>Masuk ke akun wishlist Anda</span>
            </div>
            <a href="{{ route('login') }}" class="fp-back-btn">
                Masuk
                <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </form>
</x-guest-layout>