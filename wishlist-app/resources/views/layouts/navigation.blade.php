<nav x-data="{ open: false }" style="background: linear-gradient(135deg, #0f6b5e 0%, #1a9e8f 60%, #22b5a4 100%); box-shadow: 0 2px 16px rgba(26,158,143,.25); font-family: 'Nunito', sans-serif;">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap');
        nav, nav * { font-family: 'Nunito', sans-serif !important; }
    </style>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" style="display:inline-flex;align-items:center;gap:8px;text-decoration:none;color:white;font-size:1.2rem;font-weight:900;letter-spacing:-0.4px;opacity:1;transition:opacity .2s;">
                        <span style="display:inline-flex;align-items:center;justify-content:center;width:32px;height:32px;background:rgba(255,255,255,.2);border-radius:9px;font-size:16px;">❤️</span>
                        <span>WishList</span>
                    </a>
                </div>

                <!-- Nav Links -->
                <div class="hidden sm:flex sm:items-center sm:ms-10 gap-1">
                    <a href="{{ route('dashboard') }}"
                        style="display:inline-flex;align-items:center;gap:6px;padding:7px 14px;border-radius:9px;font-size:0.85rem;font-weight:700;text-decoration:none;transition:background .2s,color .2s;
                        {{ request()->routeIs('dashboard') ? 'background:rgba(255,255,255,.22);color:white;' : 'color:rgba(255,255,255,.75);' }}">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dashboard
                    </a>
                    <a href="/wishlist"
                        style="display:inline-flex;align-items:center;gap:6px;padding:7px 14px;border-radius:9px;font-size:0.85rem;font-weight:700;text-decoration:none;transition:background .2s,color .2s;
                        {{ request()->is('wishlist*') && !request()->routeIs('dashboard') ? 'background:rgba(255,255,255,.22);color:white;' : 'color:rgba(255,255,255,.75);' }}">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                        Wishlist
                    </a>
                </div>
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button style="display:inline-flex;align-items:center;gap:8px;padding:7px 14px;border-radius:10px;background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.2);color:white;font-family:'Nunito',sans-serif;font-size:0.85rem;font-weight:700;cursor:pointer;transition:background .2s;">
                            <span style="display:inline-flex;align-items:center;justify-content:center;width:26px;height:26px;background:rgba(255,255,255,.25);border-radius:50%;font-size:13px;">👤</span>
                            <span>{{ Auth::user()->name }}</span>
                            <svg style="width:14px;height:14px;fill:currentColor;" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            <span style="display:inline-flex;align-items:center;gap:8px;font-family:'Nunito',sans-serif;font-weight:600;">
                                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                Pengaturan Profil
                            </span>
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <span style="display:inline-flex;align-items:center;gap:8px;font-family:'Nunito',sans-serif;font-weight:600;color:#be123c;">
                                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                    Keluar
                                </span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" style="display:inline-flex;align-items:center;justify-content:center;padding:8px;border-radius:8px;background:transparent;border:none;color:rgba(255,255,255,.8);cursor:pointer;transition:background .2s;">
                    <svg style="width:22px;height:22px;" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden" style="background:rgba(0,0,0,.15);border-top:1px solid rgba(255,255,255,.1);">
        <div style="padding:8px 12px 12px;">
            <a href="{{ route('dashboard') }}"
                style="display:flex;align-items:center;gap:8px;padding:10px 14px;border-radius:10px;font-size:0.88rem;font-weight:700;text-decoration:none;margin-bottom:4px;
                {{ request()->routeIs('dashboard') ? 'background:rgba(255,255,255,.2);color:white;' : 'color:rgba(255,255,255,.8);' }}">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Dashboard
            </a>
            <a href="/wishlist"
                style="display:flex;align-items:center;gap:8px;padding:10px 14px;border-radius:10px;font-size:0.88rem;font-weight:700;text-decoration:none;
                {{ request()->is('wishlist*') && !request()->routeIs('dashboard') ? 'background:rgba(255,255,255,.2);color:white;' : 'color:rgba(255,255,255,.8);' }}">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
                Wishlist
            </a>
        </div>

        <div style="padding:12px;border-top:1px solid rgba(255,255,255,.1);">
            <div style="padding:4px 14px 10px;">
                <div style="font-size:0.9rem;font-weight:800;color:white;">{{ Auth::user()->name }}</div>
                <div style="font-size:0.78rem;color:rgba(255,255,255,.6);">{{ Auth::user()->email }}</div>
            </div>
            <a href="{{ route('profile.edit') }}" style="display:flex;align-items:center;gap:8px;padding:10px 14px;border-radius:10px;font-size:0.85rem;font-weight:700;color:rgba(255,255,255,.85);text-decoration:none;">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Pengaturan Profil
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" style="display:flex;align-items:center;gap:8px;padding:10px 14px;border-radius:10px;font-size:0.85rem;font-weight:700;color:#fca5a5;text-decoration:none;"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Keluar
                </a>
            </form>
        </div>
    </div>
</nav>