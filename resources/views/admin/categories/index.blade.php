@extends('layout.admin')

@section('title', 'Kategori')
@section('page-title', 'Manajemen Kategori')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-xl font-bold text-gray-800">Daftar Kategori</h2>
            <p class="mt-1 text-sm text-gray-500">
                Kelompokkan produk sembako agar lebih mudah dikelola.
            </p>
        </div>

        <a href="{{ route('admin.categories.create') }}"
           class="inline-flex items-center justify-center rounded-xl bg-teal-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-teal-700">
            + Tambah Kategori
        </a>
    </div>

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            <ul class="list-inside list-disc space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Tabel kategori --}}
    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[650px] text-left text-sm">
                <thead class="bg-gray-50 text-xs uppercase tracking-wider text-gray-500">
                    <tr>
                        <th class="px-6 py-4">Nama Kategori</th>
                        <th class="px-6 py-4">Slug</th>
                        <th class="px-6 py-4">Jumlah Produk</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse ($categories as $category)
                        <tr class="transition hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <p class="font-semibold text-gray-800">
                                    {{ $category->name }}
                                </p>
                                <p class="mt-1 text-xs text-gray-500">
                                    {{ $category->description ?: 'Tidak ada deskripsi' }}
                                </p>
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ $category->slug }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="rounded-full bg-teal-50 px-3 py-1 text-xs font-semibold text-teal-700">
                                    {{ $category->products_count }} produk
                                </span>
                            </td>

                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.categories.show', $category) }}"
                                       class="rounded-lg border border-gray-200 px-3 py-2 text-xs font-medium text-gray-600 hover:bg-gray-100">
                                        Detail
                                    </a>

                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                       class="rounded-lg bg-teal-50 px-3 py-2 text-xs font-semibold text-teal-700 hover:bg-teal-100">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.categories.destroy', $category) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus kategori ini? Produk di dalamnya tidak akan ikut terhapus.')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-700 hover:bg-red-100">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-16 text-center">
                                <h3 class="font-semibold text-gray-800">
                                    Belum ada kategori
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    Tambahkan kategori pertama untuk produk sembako.
                                </p>
                                <a href="{{ route('admin.categories.create') }}"
                                   class="mt-4 inline-flex rounded-xl bg-teal-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-teal-700">
                                    Tambah Kategori
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($categories->hasPages())
            <div class="border-t border-gray-100 px-6 py-4">
                {{ $categories->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
