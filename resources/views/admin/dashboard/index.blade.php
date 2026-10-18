
@extends('layout.admin')

@section('title', 'Dashboard Admin - Warungku')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">

    <!-- Welcome -->
    <section class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-teal-800 to-emerald-600 p-6 text-white shadow-sm sm:p-8">
        <div class="relative z-10 max-w-2xl">
            <p class="text-sm font-medium text-teal-100">PANEL ADMINISTRASI</p>

            <h2 class="mt-2 text-2xl font-bold tracking-tight sm:text-3xl">
                Selamat Datang di Warungku
            </h2>

            <p class="mt-3 max-w-xl text-sm leading-6 text-teal-50 sm:text-base">
                Kelola tokomu jadi jauh lebih cepat
            </p>
        </div>

        <svg class="absolute -right-8 -top-12 h-48 w-48 text-white/10 sm:h-64 sm:w-64"
             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.5">
            <circle cx="12" cy="12" r="10"/>
            <circle cx="12" cy="12" r="7"/>
            <circle cx="12" cy="12" r="4"/>
        </svg>
    </section>

    <!-- Summary cards -->
    <section>
        <div class="mb-4">
            <h3 class="text-lg font-bold text-slate-800">Ringkasan Toko</h3>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">

            <!-- Total products -->
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:shadow-md">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Total Produk</p>
                        <p class="mt-3 text-3xl font-bold text-slate-800">0</p>
                        <p class="mt-2 text-xs text-slate-400">Produk terdaftar</p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-teal-50 text-teal-700">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.8">
                            <path d="M4 7h16v13H4z"/>
                            <path d="m4 7 2-4h12l2 4M9 11h6"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total categories -->
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:shadow-md">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Total Kategori</p>
                        <p class="mt-3 text-3xl font-bold text-slate-800">0</p>
                        <p class="mt-2 text-xs text-slate-400">Kategori produk</p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-700">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.8">
                            <path d="M4 4h7v7H4zM14 4h6v4h-6zM14 11h6v9h-6zM4 14h7v6H4z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total transactions -->
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:shadow-md">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Total Transaksi</p>
                        <p class="mt-3 text-3xl font-bold text-slate-800">0</p>
                        <p class="mt-2 text-xs text-slate-400">Transaksi tercatat</p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-50 text-amber-700">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.8">
                            <path d="M6 3h9l4 4v14H6z"/>
                            <path d="M14 3v5h5M9 13h7M9 17h7"/>
                        </svg>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Quick menu -->
    <section>
        <div class="mb-4">
            <h3 class="text-lg font-bold text-slate-800">Menu Cepat</h3>
            <p class="mt-1 text-sm text-slate-500">Akses fitur pengelolaan toko.</p>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

            <!-- Products -->
            <a href="{{ url('/admin/products') }}"
               class="group rounded-2xl border border-slate-200 bg-white p-5 transition hover:-translate-y-1 hover:border-teal-300 hover:shadow-md">
                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-teal-50 text-teal-700 transition group-hover:bg-teal-100">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8">
                        <path d="M4 7h16v13H4z"/>
                        <path d="m4 7 2-4h12l2 4M9 11h6"/>
                    </svg>
                </div>

                <h4 class="font-semibold text-slate-800">Kelola Produk</h4>
                <p class="mt-2 text-sm leading-5 text-slate-500">Tambah, edit, dan atur produk toko.</p>

                <span class="mt-4 inline-flex items-center gap-2 text-sm font-medium text-teal-700">
                    Buka produk
                    <svg class="h-4 w-4 transition group-hover:translate-x-1" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8">
                        <path d="M5 12h14M13 6l6 6-6 6"/>
                    </svg>
                </span>
            </a>

            <!-- Categories -->
            <a href="{{ url('/admin/categories') }}"
               class="group rounded-2xl border border-slate-200 bg-white p-5 transition hover:-translate-y-1 hover:border-teal-300 hover:shadow-md">
                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-700 transition group-hover:bg-blue-100">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8">
                        <path d="M4 4h7v7H4zM14 4h6v4h-6zM14 11h6v9h-6zM4 14h7v6H4z"/>
                    </svg>
                </div>

                <h4 class="font-semibold text-slate-800">Kelola Kategori</h4>
                <p class="mt-2 text-sm leading-5 text-slate-500">Atur kategori dan kelompok produk.</p>

                <span class="mt-4 inline-flex items-center gap-2 text-sm font-medium text-teal-700">
                    Buka kategori
                    <svg class="h-4 w-4 transition group-hover:translate-x-1" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8">
                        <path d="M5 12h14M13 6l6 6-6 6"/>
                    </svg>
                </span>
            </a>

            <!-- Transactions -->
            <a href="{{ url('/admin/transactions') }}"
               class="group rounded-2xl border border-slate-200 bg-white p-5 transition hover:-translate-y-1 hover:border-teal-300 hover:shadow-md">
                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-amber-50 text-amber-700 transition group-hover:bg-amber-100">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8">
                        <path d="M6 3h9l4 4v14H6z"/>
                        <path d="M14 3v5h5M9 13h7M9 17h7"/>
                    </svg>
                </div>

                <h4 class="font-semibold text-slate-800">Transaksi</h4>
                <p class="mt-2 text-sm leading-5 text-slate-500">Lihat dan kelola transaksi penjualan.</p>

                <span class="mt-4 inline-flex items-center gap-2 text-sm font-medium text-teal-700">
                    Buka transaksi
                    <svg class="h-4 w-4 transition group-hover:translate-x-1" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8">
                        <path d="M5 12h14M13 6l6 6-6 6"/>
                    </svg>
                </span>
            </a>

            <!-- Reports -->
            <a href="{{ url('/admin/reports') }}"
               class="group rounded-2xl border border-slate-200 bg-white p-5 transition hover:-translate-y-1 hover:border-teal-300 hover:shadow-md">
                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-purple-50 text-purple-700 transition group-hover:bg-purple-100">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8">
                        <path d="M4 20V10M10 20V4M16 20v-7M22 20H2"/>
                    </svg>
                </div>

                <h4 class="font-semibold text-slate-800">Laporan Penjualan</h4>
                <p class="mt-2 text-sm leading-5 text-slate-500">Pantau ringkasan penjualan toko.</p>

                <span class="mt-4 inline-flex items-center gap-2 text-sm font-medium text-teal-700">
                    Buka laporan
                    <svg class="h-4 w-4 transition group-hover:translate-x-1" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8">
                        <path d="M5 12h14M13 6l6 6-6 6"/>
                    </svg>
                </span>
            </a>

        </div>
    </section>

    <!-- Recent activity -->
    <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-600">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="12" r="9"/>
                    <path d="M12 7v5l3 2"/>
                </svg>
            </div>

            <div>
                <h3 class="font-bold text-slate-800">Aktivitas Terbaru</h3>
                <p class="mt-1 text-sm text-slate-500">Riwayat aktivitas pengelolaan toko.</p>
            </div>
        </div>

        <div class="mt-5 rounded-xl border border-dashed border-slate-200 px-4 py-8 text-center">
            <p class="text-sm font-medium text-slate-600">Belum ada aktivitas</p>
            <p class="mt-1 text-sm text-slate-400">
                Aktivitas akan ditampilkan setelah fitur produk dan transaksi aktif.
            </p>
        </div>
    </section>

</div>
@endsection
