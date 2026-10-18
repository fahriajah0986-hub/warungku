
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Warungku')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 text-slate-800 antialiased">

    <div class="min-h-screen md:flex">

        <!-- Sidebar -->
        <aside
            id="adminSidebar"
            class="hidden w-full shrink-0 bg-teal-950 text-white md:block md:min-h-screen md:w-64"
        >
            <!-- Brand -->
            <div class="flex items-center justify-between border-b border-white/10 px-6 py-6">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-teal-600">
                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.8">
                            <path d="M3 10h18l-2-6H5l-2 6Z"/>
                            <path d="M5 10v10h14V10M9 20v-6h6v6"/>
                            <path d="M3 10a3 3 0 0 0 6 0 3 3 0 0 0 6 0 3 3 0 0 0 6 0"/>
                        </svg>
                    </div>

                    <div>
                        <h1 class="text-xl font-bold tracking-wide">Warungku</h1>
                        <p class="mt-1 text-xs text-teal-300">Admin Panel</p>
                    </div>
                </a>

                <button
                    type="button"
                    id="closeSidebar"
                    class="rounded-lg p-2 text-teal-100 hover:bg-white/10 md:hidden"
                    aria-label="Tutup menu"
                >
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2">
                        <path d="m18 6-12 12M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="space-y-2 p-4">
                <p class="px-4 pb-2 pt-1 text-xs font-semibold uppercase tracking-wider text-teal-400">
                    Menu Utama
                </p>

                <a href="{{ route('admin.dashboard') }}"
                   @class([
                       'flex items-center gap-3 rounded-xl px-4 py-3 font-medium transition',
                       'bg-teal-700 text-white' => request()->routeIs('admin.dashboard'),
                       'text-teal-100 hover:bg-white/10' => !request()->routeIs('admin.dashboard'),
                   ])>
                    <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8">
                        <rect x="3" y="3" width="7" height="7" rx="1.5"/>
                        <rect x="14" y="3" width="7" height="7" rx="1.5"/>
                        <rect x="3" y="14" width="7" height="7" rx="1.5"/>
                        <rect x="14" y="14" width="7" height="7" rx="1.5"/>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ url('/admin/products') }}"
                   @class([
                       'flex items-center gap-3 rounded-xl px-4 py-3 transition',
                       'bg-teal-700 text-white' => request()->is('admin/products*'),
                       'text-teal-100 hover:bg-white/10' => !request()->is('admin/products*'),
                   ])>
                    <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8">
                        <path d="M4 7h16v13H4z"/>
                        <path d="m4 7 2-4h12l2 4M9 11h6"/>
                    </svg>
                    Produk
                </a>

                <a href="{{ url('/admin/categories') }}"
                   @class([
                       'flex items-center gap-3 rounded-xl px-4 py-3 transition',
                       'bg-teal-700 text-white' => request()->is('admin/categories*'),
                       'text-teal-100 hover:bg-white/10' => !request()->is('admin/categories*'),
                   ])>
                    <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8">
                        <path d="M4 4h7v7H4zM14 4h6v4h-6zM14 11h6v9h-6zM4 14h7v6H4z"/>
                    </svg>
                    Kategori
                </a>

                <a href="{{ url('/admin/transactions') }}"
                   @class([
                       'flex items-center gap-3 rounded-xl px-4 py-3 transition',
                       'bg-teal-700 text-white' => request()->is('admin/transactions*'),
                       'text-teal-100 hover:bg-white/10' => !request()->is('admin/transactions*'),
                   ])>
                    <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8">
                        <path d="M6 3h9l4 4v14H6z"/>
                        <path d="M14 3v5h5M9 13h7M9 17h7"/>
                    </svg>
                    Transaksi
                </a>

                <a href="{{ url('/admin/reports') }}"
                   @class([
                       'flex items-center gap-3 rounded-xl px-4 py-3 transition',
                       'bg-teal-700 text-white' => request()->is('admin/reports*'),
                       'text-teal-100 hover:bg-white/10' => !request()->is('admin/reports*'),
                   ])>
                    <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8">
                        <path d="M4 20V10M10 20V4M16 20v-7M22 20H2"/>
                    </svg>
                    Laporan Penjualan
                </a>

                <!-- Logout -->
                <div class="mt-6 border-t border-white/10 pt-4">
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf

                        <button type="submit"
                                class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-teal-200 transition hover:bg-red-500/10 hover:text-red-300">
                            <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8">
                                <path d="M10 17l5-5-5-5M15 12H3"/>
                                <path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7"/>
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </nav>

            <div class="mx-4 mt-6 rounded-xl border border-white/10 bg-white/5 p-4">
                <p class="text-xs font-medium text-teal-200">Sistem Manajemen</p>
                <p class="mt-1 text-sm font-semibold">Warungku</p>
                <p class="mt-1 text-xs text-teal-300">Panel Administrasi</p>
            </div>
        </aside>

        <!-- Overlay mobile -->
        <div
            id="sidebarOverlay"
            class="fixed inset-0 z-40 hidden bg-slate-950/50 md:hidden"
            aria-hidden="true"
        ></div>

        <!-- Main area -->
        <div class="min-w-0 flex-1">

            <!-- Header -->
            <header class="sticky top-0 z-30 flex items-center gap-4 border-b border-slate-200 bg-white px-4 py-4 sm:px-6">
                <button
                    type="button"
                    id="openSidebar"
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg border border-slate-200 text-slate-600 transition hover:bg-slate-100 md:hidden"
                    aria-label="Buka menu"
                    aria-controls="adminSidebar"
                    aria-expanded="false"
                >
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8">
                        <path d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <div class="min-w-0 flex-1">
                    <h2 class="truncate text-lg font-semibold sm:text-xl">
                        @yield('page-title', 'Dashboard')
                    </h2>
                    <p class="mt-1 hidden text-sm text-slate-500 sm:block">
                        Kelola toko sembako Warungku
                    </p>
                </div>

                <div class="hidden items-center gap-3 sm:flex">
                    <div class="text-right">
                        <p class="text-sm font-semibold text-slate-800">
                            {{ auth()->user()->name }}
                        </p>
                        <p class="text-xs text-slate-500">Administrator</p>
                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-teal-100 font-semibold text-teal-800">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                </div>
            </header>

            <!-- Page content -->
            <main class="min-w-0 p-4 sm:p-6 lg:p-8">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Mobile sidebar script -->
    <script>
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const openButton = document.getElementById('openSidebar');
        const closeButton = document.getElementById('closeSidebar');

        function openMenu() {
            sidebar.classList.remove('hidden');
            sidebar.classList.add(
                'fixed', 'inset-y-0', 'left-0', 'z-50',
                'block', 'w-72', 'max-w-[85vw]', 'overflow-y-auto',
                'shadow-xl'
            );

            overlay.classList.remove('hidden');
            openButton.setAttribute('aria-expanded', 'true');
            document.body.classList.add('overflow-hidden');
        }

        function closeMenu() {
            sidebar.classList.add('hidden');
            sidebar.classList.remove(
                'fixed', 'inset-y-0', 'left-0', 'z-50',
                'block', 'w-72', 'max-w-[85vw]', 'overflow-y-auto',
                'shadow-xl'
            );

            overlay.classList.add('hidden');
            openButton.setAttribute('aria-expanded', 'false');
            document.body.classList.remove('overflow-hidden');
        }

        openButton.addEventListener('click', openMenu);
        closeButton.addEventListener('click', closeMenu);
        overlay.addEventListener('click', closeMenu);

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeMenu();
            }
        });

        window.addEventListener('resize', function () {
            if (window.innerWidth >= 768) {
                closeMenu();
            }
        });
    </script>

</body>
</html>
