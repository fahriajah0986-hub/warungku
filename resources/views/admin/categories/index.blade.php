@extends('layout.admin')

@section('title', 'Daftar Kategori')
@section('page-title', 'Manajemen Kategori')

@section('content')
<div class="space-y-6">

    {{-- Header Halaman --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Daftar Kategori
            </h1>
            <p class="mt-1 text-sm text-gray-500">
                Kelola kategori produk Warungku.
            </p>
        </div>

        <a href="{{ route('admin.categories.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-xl bg-teal-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-teal-700">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-5 w-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="2">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Kategori
        </a>
    </div>

    {{-- Notifikasi Berhasil --}}
    @if (session('success'))
        <div class="flex items-start gap-3 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-700">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="mt-0.5 h-5 w-5 shrink-0"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="2">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M5 13l4 4L19 7"/>
            </svg>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    {{-- Notifikasi Error --}}
    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
            <p class="font-semibold">Terjadi kesalahan:</p>
            <ul class="mt-2 list-inside list-disc space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Pencarian dan Filter --}}
    <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
        <form action="{{ route('admin.categories.index') }}"
              method="GET"
              class="flex flex-col gap-4 lg:flex-row lg:items-end">

            <div class="flex-1">
                <label for="search"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    Cari Kategori
                </label>

                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <circle cx="11" cy="11" r="8"/>
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="m21 21-4.35-4.35"/>
                    </svg>

                    <input
                        type="text"
                        name="search"
                        id="search"
                        value="{{ $search ?? request('search') }}"
                        placeholder="Masukkan nama kategori..."
                        class="w-full rounded-lg border border-gray-300 py-3 pl-10 pr-4 text-sm text-gray-700 outline-none transition placeholder:text-gray-400 focus:border-teal-500 focus:ring-2 focus:ring-teal-100"
                    >
                </div>
            </div>

            <div class="w-full lg:w-64">
                <label for="filter"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    Filter Kategori
                </label>

                <select
                    name="filter"
                    id="filter"
                    class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm text-gray-700 outline-none transition focus:border-teal-500 focus:ring-2 focus:ring-teal-100"
                >
                    <option value="all"
                        {{ ($filter ?? request('filter', 'all')) === 'all' ? 'selected' : '' }}>
                        Semua Kategori
                    </option>

                    <option value="has_products"
                        {{ ($filter ?? request('filter', 'all')) === 'has_products' ? 'selected' : '' }}>
                        Memiliki Produk
                    </option>

                    <option value="empty"
                        {{ ($filter ?? request('filter', 'all')) === 'empty' ? 'selected' : '' }}>
                        Belum Memiliki Produk
                    </option>
                </select>
            </div>

            <div class="flex flex-wrap gap-2">
                <button
                    type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-teal-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-teal-700"
                >
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-4 w-4"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <circle cx="11" cy="11" r="8"/>
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="m21 21-4.35-4.35"/>
                    </svg>
                    Cari
                </button>

                <a
                    href="{{ route('admin.categories.index') }}"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50"
                >
                    Reset
                </a>
            </div>
        </form>
    </div>

    {{-- Tabel Kategori --}}
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
        <div class="flex flex-col gap-1 border-b border-gray-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-gray-800">
                    Data Kategori
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Daftar kategori yang tersedia.
                </p>
            </div>

            <span class="text-sm text-gray-500">
                Total: {{ $categories->total() }} kategori
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            No.
                        </th>

                        <th scope="col"
                            class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Nama Kategori
                        </th>

                        <th scope="col"
                            class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Slug
                        </th>

                        <th scope="col"
                            class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Jumlah Produk
                        </th>

                        <th scope="col"
                            class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse ($categories as $category)
                        <tr class="transition hover:bg-gray-50">
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                {{ $categories->firstItem() + $loop->index }}
                            </td>

                            <td class="whitespace-nowrap px-6 py-4">
                                <span class="text-sm font-semibold text-gray-800">
                                    {{ $category->name }}
                                </span>
                            </td>

                            <td class="whitespace-nowrap px-6 py-4">
                                <span class="rounded-md bg-gray-100 px-2.5 py-1 text-xs text-gray-600">
                                    {{ $category->slug }}
                                </span>
                            </td>

                            <td class="whitespace-nowrap px-6 py-4 text-center">
                                @if ($category->products_count > 0)
                                    <span class="inline-flex items-center rounded-full bg-teal-50 px-3 py-1 text-xs font-semibold text-teal-700">
                                        {{ $category->products_count }} produk
                                    </span>
                                @else
                                    <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-500">
                                        0 produk
                                    </span>
                                @endif
                            </td>

                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a
                                        href="{{ route('admin.categories.show', $category) }}"
                                        class="rounded-lg border border-blue-200 px-3 py-2 text-xs font-semibold text-blue-600 transition hover:bg-blue-50"
                                    >
                                        Detail
                                    </a>

                                    <a
                                        href="{{ route('admin.categories.edit', $category) }}"
                                        class="rounded-lg border border-amber-200 px-3 py-2 text-xs font-semibold text-amber-600 transition hover:bg-amber-50"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.categories.destroy', $category) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori {{ addslashes($category->name) }}?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-lg border border-red-200 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-50"
                                        >
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-14 text-center">
                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-7 w-7 text-gray-400"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor"
                                         stroke-width="1.5">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2h7m7-7l-4 4m0 0l-4-4m4 4V10"/>
                                    </svg>
                                </div>

                                @if (request()->filled('search') || request('filter', 'all') !== 'all')
                                    <h3 class="mt-4 text-sm font-semibold text-gray-800">
                                        Kategori tidak ditemukan
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500">
                                        Coba ubah kata pencarian atau filter kategori.
                                    </p>
                                    <a href="{{ route('admin.categories.index') }}"
                                       class="mt-4 inline-flex text-sm font-semibold text-teal-600 hover:text-teal-700">
                                        Tampilkan semua kategori
                                    </a>
                                @else
                                    <h3 class="mt-4 text-sm font-semibold text-gray-800">
                                        Belum ada kategori
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500">
                                        Tambahkan kategori untuk mulai mengelompokkan produk.
                                    </p>
                                    <a href="{{ route('admin.categories.create') }}"
                                       class="mt-4 inline-flex text-sm font-semibold text-teal-600 hover:text-teal-700">
                                        + Tambah kategori pertama
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if ($categories->hasPages())
            <div class="border-t border-gray-200 px-5 py-4">
                {{ $categories->links() }}
            </div>
        @endif
    </div>

</div>
@endsection