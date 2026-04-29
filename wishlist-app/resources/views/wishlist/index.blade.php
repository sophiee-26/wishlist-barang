<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap');

        .wl * { font-family: 'Nunito', sans-serif; box-sizing: border-box; }

        .wl-page {
            min-height: 100vh;
            background: #f0faf9;
            padding: 32px 0 56px;
        }
        .wl-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ══ HEADER ══ */
        .wl-header-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 16px;
            flex-wrap: wrap;
        }
        .wl-page-title {
            font-size: 1.75rem; font-weight: 900;
            color: #1e3a35; letter-spacing: -0.5px;
            margin-bottom: 3px;
        }
        .wl-page-sub {
            font-size: 0.83rem; color: #8ab5ae; font-weight: 400;
        }

        /* ══ USER CARD ══ */
        .wl-user-card {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #fff;
            border: 1.5px solid rgba(26,158,143,.12);
            border-radius: 50px;
            padding: 6px 16px 6px 6px;
            box-shadow: 0 2px 10px rgba(26,158,143,.08);
            text-decoration: none;
            transition: box-shadow .2s, transform .2s;
        }
        .wl-user-card:hover {
            box-shadow: 0 4px 18px rgba(26,158,143,.15);
            transform: translateY(-1px);
        }
        .wl-user-avatar {
            width: 38px; height: 38px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #1a9e8f;
            flex-shrink: 0;
        }
        .wl-user-avatar-initials {
            width: 38px; height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #147a6e, #1a9e8f);
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-weight: 900; font-size: 15px;
            flex-shrink: 0;
            border: 2px solid #1a9e8f;
        }
        .wl-user-info { display: flex; flex-direction: column; line-height: 1.3; }
        .wl-user-name { font-size: 0.85rem; font-weight: 800; color: #1e3a35; }
        .wl-user-link { font-size: 0.7rem; color: #1a9e8f; font-weight: 600; }

        .wl-header-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .wl-add-btn {
            display: inline-flex; align-items: center; gap: 7px;
            background: linear-gradient(135deg, #147a6e, #1a9e8f, #22b5a4);
            color: #fff; font-family: 'Nunito', sans-serif;
            font-size: 0.88rem; font-weight: 800;
            padding: 11px 20px; border-radius: 12px;
            text-decoration: none; white-space: nowrap;
            box-shadow: 0 4px 16px rgba(26,158,143,.3);
            transition: transform .2s, box-shadow .2s;
        }
        .wl-add-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(26,158,143,.4); }
        .wl-add-btn svg { flex-shrink: 0; }

        /* ══ STATS ══ */
        .wl-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin-bottom: 24px;
        }
        .wl-stat {
            background: #fff;
            border-radius: 16px;
            padding: 18px 20px;
            border-left: 3px solid;
            box-shadow: 0 1px 8px rgba(26,158,143,.07);
            transition: transform .2s, box-shadow .2s;
        }
        .wl-stat:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(26,158,143,.11); }
        .wl-stat-teal   { border-left-color: #1a9e8f; }
        .wl-stat-violet { border-left-color: #7c5cfc; }
        .wl-stat-green  { border-left-color: #22c87a; }

        .wl-stat-label {
            font-size: 0.65rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: 0.13em;
            color: #8ab5ae; margin-bottom: 6px;
        }
        .wl-stat-value { font-size: 1.8rem; font-weight: 900; line-height: 1; }
        .wl-stat-teal   .wl-stat-value { color: #1a9e8f; }
        .wl-stat-violet .wl-stat-value { color: #7c5cfc; font-size: 1.25rem; }
        .wl-stat-green  .wl-stat-value { color: #22c87a; }

        /* ══ FILTER ══ */
        .wl-filter-card {
            background: #fff;
            border-radius: 16px;
            padding: 20px 22px;
            margin-bottom: 28px;
            box-shadow: 0 1px 8px rgba(26,158,143,.07);
            border: 1.5px solid rgba(26,158,143,.08);
        }
        .wl-filter-row {
            display: flex;
            gap: 12px;
            align-items: flex-end;
        }
        .wl-filter-group { flex: 1; }
        .wl-filter-label {
            display: block;
            font-size: 0.72rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: 0.1em;
            color: #4a7068; margin-bottom: 6px;
        }
        .wl-filter-input,
        .wl-filter-select {
            width: 100%;
            border: 1.5px solid #c8e8e3; border-radius: 10px;
            background: #f5fcfb;
            padding: 10px 13px;
            font-family: 'Nunito', sans-serif;
            font-size: 0.86rem; font-weight: 500; color: #1e3a35;
            outline: none;
            transition: border-color .2s, background .2s, box-shadow .2s;
            -webkit-appearance: none;
            height: 42px;
        }
        .wl-filter-input::placeholder { color: #a8cfc9; font-weight: 400; }
        .wl-filter-input:focus,
        .wl-filter-select:focus {
            border-color: #1a9e8f; background: #fff;
            box-shadow: 0 0 0 3px rgba(26,158,143,.1);
        }
        .wl-filter-actions { display: flex; gap: 8px; align-items: flex-end; flex-shrink: 0; }
        .wl-filter-btn {
            height: 42px; padding: 0 20px; border: none; border-radius: 10px;
            background: linear-gradient(135deg, #147a6e, #1a9e8f);
            color: #fff; font-family: 'Nunito', sans-serif;
            font-size: 0.86rem; font-weight: 800;
            cursor: pointer; display: flex; align-items: center; gap: 6px;
            box-shadow: 0 3px 12px rgba(26,158,143,.25);
            transition: transform .15s, box-shadow .2s;
            white-space: nowrap;
        }
        .wl-filter-btn:hover { transform: translateY(-1px); box-shadow: 0 6px 18px rgba(26,158,143,.35); }
        .wl-reset-btn {
            height: 42px; padding: 0 16px; border-radius: 10px;
            background: #f0faf9; border: 1.5px solid #c8e8e3;
            color: #4a7068; font-family: 'Nunito', sans-serif;
            font-size: 0.86rem; font-weight: 700;
            text-decoration: none; display: flex; align-items: center;
            transition: background .2s, border-color .2s;
            white-space: nowrap;
        }
        .wl-reset-btn:hover { background: #e0f7f3; border-color: #1a9e8f; color: #147a6e; }

        /* ══ CARD GRID ══ */
        .wl-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .wl-card {
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 1px 8px rgba(26,158,143,.07);
            border: 1.5px solid rgba(26,158,143,.08);
            display: flex; flex-direction: column;
            transition: transform .25s, box-shadow .25s;
        }
        .wl-card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(26,158,143,.13); }

        .wl-stripe { height: 3px; }
        .wl-stripe-high   { background: linear-gradient(90deg,#ef4444,#fca5a5); }
        .wl-stripe-medium { background: linear-gradient(90deg,#f59e0b,#fde68a); }
        .wl-stripe-low    { background: linear-gradient(90deg,#22c87a,#a7f3d0); }
        .wl-stripe-default{ background: linear-gradient(90deg,#1a9e8f,#a8edd6); }

        .wl-card-img {
            position: relative; height: 160px; overflow: hidden;
            background: linear-gradient(135deg,#e8f8f6,#d4f0e8);
            flex-shrink: 0;
        }
        .wl-card-img img {
            width: 100%; height: 100%; object-fit: cover;
            transition: transform .3s;
        }
        .wl-card:hover .wl-card-img img { transform: scale(1.05); }

        .wl-img-empty {
            height: 160px; flex-shrink: 0;
            background: linear-gradient(135deg,#e8f8f6,#d4f0e8);
            display: flex; flex-direction: column;
            align-items: center; justify-content: center; gap: 4px;
            position: relative;
        }
        .wl-img-empty-icon { font-size: 1.8rem; }
        .wl-img-empty-txt  { font-size: 0.72rem; color: #8ab5ae; font-weight: 500; }

        .wl-priority-badge {
            position: absolute; top: 8px; right: 8px;
            font-family: 'Nunito', sans-serif;
            font-size: 0.65rem; font-weight: 800;
            padding: 3px 9px; border-radius: 20px;
            color: #fff; letter-spacing: 0.03em;
            box-shadow: 0 2px 6px rgba(0,0,0,.18);
        }
        .wl-badge-high    { background: #ef4444; }
        .wl-badge-medium  { background: #f59e0b; }
        .wl-badge-low     { background: #22c87a; }
        .wl-badge-default { background: #94a3b8; }

        .wl-overlay {
            position: absolute; inset: 0;
            background: rgba(0,0,0,.35);
            display: flex; align-items: center; justify-content: center;
        }
        .wl-overlay-badge {
            background: #22c87a; color: #fff;
            font-family: 'Nunito', sans-serif;
            font-size: 0.78rem; font-weight: 800;
            padding: 6px 16px; border-radius: 20px;
        }

        .wl-body { padding: 16px; flex: 1; display: flex; flex-direction: column; }

        .wl-name {
            font-size: 0.95rem; font-weight: 800; color: #1e3a35;
            margin-bottom: 10px; line-height: 1.35;
            transition: color .2s;
        }
        .wl-card:hover .wl-name { color: #1a9e8f; }

        .wl-price-block {
            padding-bottom: 10px; margin-bottom: 10px;
            border-bottom: 1.5px solid #e8f8f6;
        }
        .wl-price-lbl { font-size: 0.68rem; font-weight: 600; color: #8ab5ae; margin-bottom: 1px; }
        .wl-price-val {
            font-size: 1.2rem; font-weight: 900;
            background: linear-gradient(135deg,#1a9e8f,#7c5cfc);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .wl-status-pill {
            display: inline-flex; align-items: center; gap: 4px;
            font-size: 0.72rem; font-weight: 700;
            padding: 4px 12px; border-radius: 20px;
            margin-bottom: 12px;
        }
        .wl-pill-bought  { background: #dcfce7; color: #15803d; }
        .wl-pill-pending { background: #fef9c3; color: #a16207; }

        .wl-btns { display: flex; gap: 7px; margin-top: auto; margin-bottom: 8px; }
        .wl-btn {
            flex: 1; display: inline-flex; align-items: center; justify-content: center; gap: 4px;
            font-family: 'Nunito', sans-serif; font-size: 0.76rem; font-weight: 800;
            padding: 8px 6px; border-radius: 9px; text-decoration: none;
            transition: filter .15s, transform .15s;
        }
        .wl-btn:hover { transform: translateY(-1px); filter: brightness(0.94); }
        .wl-btn-edit { background: #fef3c7; color: #92400e; border: 1.5px solid #fde68a; }
        .wl-btn-shop { background: #e0f2fe; color: #075985; border: 1.5px solid #bae6fd; }

        .wl-del-form { margin: 0; }
        .wl-btn-del {
            width: 100%; height: 34px; border: 1.5px solid #fecdd3;
            border-radius: 9px; background: #fff1f2; color: #be123c;
            font-family: 'Nunito', sans-serif; font-size: 0.76rem; font-weight: 800;
            cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 4px;
            transition: background .15s;
        }
        .wl-btn-del:hover { background: #fecdd3; }

        .wl-empty {
            text-align: center; padding: 72px 24px;
            background: #fff; border-radius: 20px;
            border: 2px dashed rgba(26,158,143,.2);
            box-shadow: 0 1px 8px rgba(26,158,143,.05);
        }
        .wl-empty-icon  { font-size: 3.5rem; margin-bottom: 14px; }
        .wl-empty-title { font-size: 1.25rem; font-weight: 900; color: #1e3a35; margin-bottom: 6px; }
        .wl-empty-sub   { font-size: 0.85rem; color: #8ab5ae; margin-bottom: 24px; line-height: 1.6; }
        .wl-empty-btn {
            display: inline-flex; align-items: center; gap: 7px;
            background: linear-gradient(135deg,#147a6e,#1a9e8f);
            color: #fff; font-family: 'Nunito', sans-serif;
            font-size: 0.88rem; font-weight: 800;
            padding: 12px 24px; border-radius: 12px; text-decoration: none;
            box-shadow: 0 4px 16px rgba(26,158,143,.28);
            transition: transform .2s, box-shadow .2s;
        }
        .wl-empty-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(26,158,143,.38); }

        /* ══ RESPONSIVE ══ */
        @media (max-width: 960px) {
            .wl-grid { grid-template-columns: repeat(2,1fr); }
        }
        @media (max-width: 640px) {
            .wl-grid { grid-template-columns: 1fr; }
            .wl-stats { grid-template-columns: 1fr; }
            .wl-filter-row { flex-wrap: wrap; }
            .wl-filter-group { flex: 1 1 45%; }
            .wl-header-top { flex-direction: column; align-items: flex-start; }
            .wl-user-info { display: none; }
        }
    </style>

    <div class="wl wl-page">
        <div class="wl-container">

            <!-- Header -->
            <div class="wl-header-top">
                <div>
                    <h1 class="wl-page-title">📦 Wishlist Saya</h1>
                    <p class="wl-page-sub">Kelola barang-barang impian Anda dengan mudah</p>
                </div>

                {{-- Kanan: User Card + Tombol Tambah --}}
                <div class="wl-header-right">

                    {{-- User Card dengan foto profil --}}
                    <a href="{{ route('profile.edit') }}" class="wl-user-card">
                        @if(auth()->user()->foto)
                            <img
                                src="{{ asset('storage/' . auth()->user()->foto) }}"
                                alt="{{ auth()->user()->name }}"
                                class="wl-user-avatar"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                            >
                            <div class="wl-user-avatar-initials" style="display:none;">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                        @else
                            <div class="wl-user-avatar-initials">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                        @endif
                        <div class="wl-user-info">
                            <span class="wl-user-name">{{ auth()->user()->name }}</span>
                            <span class="wl-user-link">Lihat Profil →</span>
                        </div>
                    </a>

                    {{-- Tombol Tambah --}}
                    <a href="/wishlist/create" class="wl-add-btn">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Barang
                    </a>
                </div>
            </div>

            @php
                $total = $wishlists->sum('harga');
                $purchased = $wishlists->where('status', 1)->count();
            @endphp

            <!-- Stats -->
            <div class="wl-stats">
                <div class="wl-stat wl-stat-teal">
                    <p class="wl-stat-label">Total Barang</p>
                    <p class="wl-stat-value">{{ $wishlists->count() }}</p>
                </div>
                <div class="wl-stat wl-stat-violet">
                    <p class="wl-stat-label">Total Harga</p>
                    <p class="wl-stat-value">Rp {{ number_format($total) }}</p>
                </div>
                <div class="wl-stat wl-stat-green">
                    <p class="wl-stat-label">Sudah Dibeli</p>
                    <p class="wl-stat-value">{{ $purchased }}</p>
                </div>
            </div>

            <!-- Filter -->
            <div class="wl-filter-card">
                <form method="GET" action="/wishlist" class="wl-filter-row">
                    <div class="wl-filter-group">
                        <label class="wl-filter-label">🔍 Cari Barang</label>
                        <input type="text"
                            name="search"
                            placeholder="Ketik nama barang..."
                            value="{{ request('search') }}"
                            class="wl-filter-input">
                    </div>

                    <div class="wl-filter-group">
                        <label class="wl-filter-label">⭐ Prioritas</label>
                        <select name="prioritas" class="wl-filter-select">
                            <option value="">Semua Prioritas</option>
                            <option value="Tinggi" {{ request('prioritas') == 'Tinggi' ? 'selected' : '' }}>🔴 Tinggi</option>
                            <option value="Sedang" {{ request('prioritas') == 'Sedang' ? 'selected' : '' }}>🟡 Sedang</option>
                            <option value="Rendah" {{ request('prioritas') == 'Rendah' ? 'selected' : '' }}>🟢 Rendah</option>
                        </select>
                    </div>

                    <div class="wl-filter-actions">
                        <button type="submit" class="wl-filter-btn">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 115 11a6 6 0 0112 0z"/>
                            </svg>
                            Cari
                        </button>
                        @if(request('search') || request('prioritas'))
                            <a href="/wishlist" class="wl-reset-btn">Reset</a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Cards -->
            @if($wishlists->count() > 0)
                <div class="wl-grid">
                    @foreach($wishlists as $wishlist)
                        @php
                            $p = $wishlist->prioritas;
                            $stripeMap = ['Tinggi'=>'high','Sedang'=>'medium','Rendah'=>'low'];
                            $badgeMap  = ['Tinggi'=>'high','Sedang'=>'medium','Rendah'=>'low'];
                            $iconMap   = ['Tinggi'=>'🔴','Sedang'=>'🟡','Rendah'=>'🟢'];
                            $stripe    = $stripeMap[$p] ?? 'default';
                            $badge     = $badgeMap[$p]  ?? 'default';
                            $icon      = $iconMap[$p]   ?? '⚪';
                        @endphp

                        <div class="wl-card">
                            <div class="wl-stripe wl-stripe-{{ $stripe }}"></div>

                            @if($wishlist->gambar)
                                <div class="wl-card-img">
                                    <img src="{{ $wishlist->gambar }}" alt="{{ $wishlist->nama_barang }}">
                                    <span class="wl-priority-badge wl-badge-{{ $badge }}">{{ $icon }} {{ $p }}</span>
                                    @if($wishlist->status)
                                        <div class="wl-overlay"><span class="wl-overlay-badge">✅ Sudah Dibeli</span></div>
                                    @endif
                                </div>
                            @else
                                <div class="wl-img-empty">
                                    <span class="wl-img-empty-icon">📷</span>
                                    <span class="wl-img-empty-txt">Belum ada gambar</span>
                                    <span class="wl-priority-badge wl-badge-{{ $badge }}">{{ $icon }} {{ $p }}</span>
                                    @if($wishlist->status)
                                        <div class="wl-overlay"><span class="wl-overlay-badge">✅ Sudah Dibeli</span></div>
                                    @endif
                                </div>
                            @endif

                            <div class="wl-body">
                                <h2 class="wl-name">{{ $wishlist->nama_barang }}</h2>

                                <div class="wl-price-block">
                                    <p class="wl-price-lbl">Harga Produk</p>
                                    <p class="wl-price-val">Rp {{ number_format($wishlist->harga) }}</p>
                                </div>

                                @if($wishlist->status)
                                    <span class="wl-status-pill wl-pill-bought">✅ Sudah Dibeli</span>
                                @else
                                    <span class="wl-status-pill wl-pill-pending">⏳ Belum Dibeli</span>
                                @endif

                                <div class="wl-btns">
                                    <a href="/wishlist/{{ $wishlist->id }}/edit" class="wl-btn wl-btn-edit">✏️ Edit</a>
                                    @if($wishlist->link_toko)
                                        <a href="{{ $wishlist->link_toko }}" target="_blank" class="wl-btn wl-btn-shop">🛒 Toko</a>
                                    @endif
                                </div>

                                <form action="/wishlist/{{ $wishlist->id }}" method="POST" class="wl-del-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus barang ini?')"
                                        class="wl-btn-del">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

            @else
                <div class="wl-empty">
                    <div class="wl-empty-icon">📭</div>
                    <h3 class="wl-empty-title">Wishlist Masih Kosong</h3>
                    <p class="wl-empty-sub">Anda belum menambahkan barang apapun.<br>Mari tambahkan barang impian Anda sekarang!</p>
                    <a href="/wishlist/create" class="wl-empty-btn">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Barang Pertama
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>