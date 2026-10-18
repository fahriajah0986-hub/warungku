@extends('layout.admin')

@section('title', 'Detail Kategori')

@section('page-title', 'Detail Kategori')

@section('content')
<div class="mx-auto max-w-3xl space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-gray-800">
                Detail Kategori
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                Informasi kategori produk Warungku.
            </p>
        </div>

        <a
            href="{{ route('admin.categories.index') }}"
            class="rounded-xl border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50"
        >
            Kembali
        </a>
    </div>

    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

        <div class="space-y-5">
            <div>
                <p class="text-sm text-gray-500">Nama Kategori</p>
                <p class="mt-1 text-lg font-semibold text-gray-800">
                    {{ $category->name }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Slug</p>
                <p class="mt-1 text-gray-800">
                    {{ $category->slug }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Deskripsi</p>
                <p class="mt-1 text-gray-800">
                    {{ $category->description ?: 'Tidak ada deskripsi.' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Jumlah Produk</p>
                <p class="mt-1 font-semibold text-teal-700">
                    {{ $category->products()->count() }} produk
                </p>
            </div>
        </div>

        <div class="mt-6 border-t border-gray-100 pt-5">
            <a
                href="{{ route('admin.categories.edit', $category) }}"
                class="inline-flex rounded-xl bg-teal-600 px-5 py-3 text-sm font-semibold text-white hover:bg-teal-700"
            >
                Edit Kategori
            </a>
        </div>

    </div>
</div>
@endsection