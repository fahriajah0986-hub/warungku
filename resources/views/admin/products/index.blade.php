@extends('layout.admin')

@section('title', 'Produk')
@section('page-title', 'Manajemen Produk')

@section('content')
<div class="space-y-6">

    {{-- Header --}}

<form action="{{ route('admin.products.index') }}" method="GET"
      class="flex flex-col gap-3 sm:flex-row sm:flex-wrap">

    <input
        type="text"
        name="search"
        value="{{ $search ?? '' }}"
        placeholder="Cari nama produk..."
        class="min-w-0 flex-1 rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-100">

    <select
        name="stock_status"
        class="rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-100">
        <option value="">Semua Stok</option>
        <option value="available" @selected(($stockStatus ?? '') === 'available')>
            Tersedia
        </option>
        <option value="low" @selected(($stockStatus ?? '') === 'low')>
            Menipis (1–5)
        </option>
        <option value="out" @selected(($stockStatus ?? '') === 'out')>
            Habis
        </option>
    </select>

    <button type="submit"
            class="rounded-xl bg-teal-600 px-5 py-3 text-sm font-semibold text-white hover:bg-teal-700">
        Terapkan
    </button>

    @if (request('search') || request('stock_status'))
        <a href="{{ route('admin.products.index') }}"
           class="rounded-xl border border-gray-300 px-5 py-3 text-center text-sm font-semibold text-gray-700 hover:bg-gray-50">
            Reset
        </a>
    @endif
</form>

    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-xl font-bold text-gray-800">
                Daftar Produk
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                Kelola produk sembako Warungku.
            </p>
        </div>

        <a href="{{ route('admin.products.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-xl bg-teal-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-teal-700">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Produk
        </a>
    </div>

    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    {{-- Notifikasi error --}}
    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            <ul class="list-inside list-disc space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Tabel produk --}}
    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[750px] text-left text-sm">
                
                <thead class="bg-gray-50 text-xs uppercase tracking-wider text-gray-500">
                    <tr>
                        <th class="px-6 py-4">Produk</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Harga</th>
                        <th class="px-6 py-4">Stok</th>
                        <th class="px-6 py-4">Status Stok</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse ($products as $product)
                        <tr class="transition hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if ($product->image)
                                        <img
                                            src="{{ asset('storage/' . $product->image) }}"
                                            alt="{{ $product->name }}"
                                            class="h-12 w-12 rounded-xl border border-gray-200 object-cover">
                                    @else
                                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-teal-50 text-teal-600">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-6 w-6" fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M3 9l1.5-5h15L21 9M5 9v11h14V9M9 20v-6h6v6M3 9h18"/>
                                            </svg>
                                        </div>
                                    @endif

                                    <div>
                                        <p class="font-semibold text-gray-800">
                                            {{ $product->name }}
                                        </p>
                                        <p class="mt-1 text-xs text-gray-500">
                                            {{ $product->slug }}
                                        </p>
                                    </div>
                                </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex rounded-full bg-teal-50 px-3 py-1 text-xs font-semibold text-teal-700">
                                        {{ $product->category?->name ?? 'Belum berkategori' }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-700">
                                    Rp{{ number_format((float) $product->price, 0, ',', '.') }}
                                </td>
                            <td class="px-6 py-4">
                                @if ($product->stock <= 0)
                                    <span class="rounded-full bg-red-50 px-3 py-1 text-xs font-semibold text-red-700">
                                        Habis
                                    </span>
                                @elseif ($product->stock <= 5)
                                    <span class="rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700">
                                        Menipis
                                    </span>
                                @else
                                    <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700">
                                        Tersedia
                                    </span>
                                @endif
                            </td>

                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.products.show', $product) }}"
                                       class="rounded-lg border border-gray-200 px-3 py-2 text-xs font-medium text-gray-600 transition hover:bg-gray-100">
                                        Detail
                                    </a>

                                    <a href="{{ route('admin.products.edit', $product) }}"
                                       class="rounded-lg bg-teal-50 px-3 py-2 text-xs font-semibold text-teal-700 transition hover:bg-teal-100">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.products.destroy', $product) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-700 transition hover:bg-red-100">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">
                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gray-100 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-7 w-7" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor"
                                         stroke-width="1.5">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M3 9l1.5-5h15L21 9M5 9v11h14V9M9 20v-6h6v6"/>
                                    </svg>
                                </div>

                                <h3 class="mt-4 font-semibold text-gray-800">
                                    Belum ada produk
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    Tambahkan produk sembako pertama kamu.
                                </p>

                                <a href="{{ route('admin.products.create') }}"
                                   class="mt-4 inline-flex rounded-xl bg-teal-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-teal-700">
                                    Tambah Produk
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($products->hasPages())
            <div class="border-t border-gray-100 px-6 py-4">
                {{ $products->links() }}
            </div>
        @endif
    </div>

</div>
@endsection