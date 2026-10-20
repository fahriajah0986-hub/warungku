
@extends('layout.admin')

@section('title', 'Detail Produk')
@section('page-title', 'Detail Produk')

@section('content')
<div class="mx-auto max-w-5xl space-y-6">

    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <a href="{{ route('admin.products.index') }}"
                class="group inline-flex w-fit items-center gap-3 rounded-xl border border-teal-100 bg-white px-4 py-3 text-sm font-semibold text-gray-700 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:border-teal-300 hover:bg-teal-50 hover:text-teal-700 hover:shadow-md">

                    <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-teal-50 text-teal-700 transition-colors group-hover:bg-teal-600 group-hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </span>

                    <span class="flex flex-col">
                        <span class="text-sm font-semibold">Kembali ke Daftar Produk</span>
                        <span class="mt-0.5 text-xs font-normal text-gray-400 group-hover:text-teal-600">
                            Lihat semua produk
                        </span>
                    </span>
                </a>

            <h2 class="mt-3 text-xl font-bold text-gray-800">
                Detail Produk
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                Informasi lengkap produk Warungku.
            </p>
        </div>

        <a href="{{ route('admin.products.edit', $product) }}"
           class="inline-flex items-center justify-center rounded-xl bg-teal-600 px-5 py-3 text-sm font-semibold text-white hover:bg-teal-700">
            Edit Produk
        </a>
    </div>

    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">
        <div class="grid grid-cols-1 md:grid-cols-2">

            {{-- Gambar Produk --}}
            <div class="flex min-h-[320px] items-center justify-center bg-gray-50 p-6 sm:min-h-[420px]">
                @if ($product->image)                
                <img
                    src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->name }}"
                    class="h-full max-h-[420px] w-full object-contain"
                    loading="lazy">

                @else
                    <div class="flex h-56 w-full flex-col items-center justify-center rounded-xl border border-dashed border-gray-300 bg-white text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-16 w-16" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor"
                             stroke-width="1.2">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M3 9l1.5-5h15L21 9M5 9v11h14V9M9 20v-6h6v6"/>
                        </svg>
                        <p class="mt-3 text-sm">Belum ada gambar produk</p>
                    </div>
                @endif
            </div>

            {{-- Informasi Produk --}}
            <div class="space-y-6 p-6 sm:p-8">

                <div>
                    <p class="text-sm text-gray-500">Nama Produk</p>
                    <h3 class="mt-1 text-2xl font-bold text-gray-800">
                        {{ $product->name }}
                    </h3>
                    <p class="mt-2 text-sm text-gray-400">
                        Slug: {{ $product->slug }}
                    </p>
                </div>

                <div class="border-t border-gray-100 pt-5">
                    <p class="text-sm text-gray-500">Harga Produk</p>
                    <p class="mt-1 text-2xl font-bold text-teal-700">
                        Rp{{ number_format((float) $product->price, 0, ',', '.') }}
                    </p>
                </div>

                <div class="border-t border-gray-100 pt-5">
                    <p class="text-sm text-gray-500">Stok Tersedia</p>
                    <p class="mt-1 text-xl font-semibold text-gray-800">
                        {{ $product->stock }} unit
                    </p>

                    @if ($product->stock <= 0)
                        <span class="mt-2 inline-block rounded-full bg-red-50 px-3 py-1 text-xs font-semibold text-red-700">
                            Stok Habis
                        </span>
                    @elseif ($product->stock <= 5)
                        <span class="mt-2 inline-block rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700">
                            Stok Menipis
                        </span>
                    @else
                        <span class="mt-2 inline-block rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700">
                            Stok Tersedia
                        </span>
                    @endif
                </div>

                <div class="border-t border-gray-100 pt-5">
                    <p class="text-sm text-gray-500">Deskripsi</p>
                    <p class="mt-2 whitespace-pre-line text-sm leading-7 text-gray-700">
                        {{ $product->description ?: 'Belum ada deskripsi produk.' }}
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-4 border-t border-gray-100 pt-5 sm:grid-cols-2">
                    <div>
                        <p class="text-xs text-gray-500">Dibuat pada</p>
                        <p class="mt-1 text-sm font-medium text-gray-700">
                            {{ $product->created_at->format('d M Y, H:i') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500">Terakhir diperbarui</p>
                        <p class="mt-1 text-sm font-medium text-gray-700">
                            {{ $product->updated_at->format('d M Y, H:i') }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Hapus Produk --}}
    <div class="flex flex-col gap-3 rounded-2xl border border-red-100 bg-red-50 p-5 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="font-semibold text-red-800">Hapus Produk</h3>
            <p class="mt-1 text-sm text-red-700">
                Produk ini akan dihapus dari daftar Warungku.
            </p>
        </div>

        <form action="{{ route('admin.products.destroy', $product) }}"
              method="POST"
              onsubmit="return confirm('Yakin ingin menghapus produk {{ $product->name }}? Tindakan ini tidak dapat dibatalkan.')">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="rounded-xl border border-red-200 bg-white px-5 py-3 text-sm font-semibold text-red-700 hover:bg-red-100">
                Hapus Produk
            </button>
        </form>
    </div>

</div>
@endsection
