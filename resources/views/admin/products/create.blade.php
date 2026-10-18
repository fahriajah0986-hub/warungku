@extends('layout.admin')

@section('title', 'Tambah Produk')
@section('page-title', 'Tambah Produk')

@section('content')
<div class="mx-auto max-w-4xl space-y-6">

    <div>
        <a href="{{ route('admin.products.index') }}"
           class="inline-flex items-center gap-2 text-sm font-medium text-teal-700 hover:text-teal-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor"
                 stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali ke Daftar Produk
        </a>

        <h2 class="mt-4 text-xl font-bold text-gray-800">
            Tambah Produk Baru
        </h2>
        <p class="mt-1 text-sm text-gray-500">
            Masukkan informasi produk sembako yang ingin dijual.
        </p>
    </div>

    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
            <p class="mb-2 font-semibold">Periksa kembali data berikut:</p>
            <ul class="list-inside list-disc space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-6 rounded-2xl border border-gray-200 bg-white p-5 shadow-sm sm:p-8">

        @csrf

        <div>
            <label for="name" class="mb-2 block text-sm font-semibold text-gray-700">
                Nama Produk <span class="text-red-500">*</span>
            </label>
            <input type="text" id="name" name="name"
                   value="{{ old('name') }}"
                   placeholder="Contoh: Beras Premium 5 Kg"
                   required
                   class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-teal-500 focus:ring-2 focus:ring-teal-100">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="mb-2 block text-sm font-semibold text-gray-700">
                Deskripsi Produk
            </label>
            <textarea id="description" name="description" rows="4"
                      placeholder="Jelaskan detail produk..."
                      class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-teal-500 focus:ring-2 focus:ring-teal-100">{{ old('description') }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        

<div>
    <label for="category_id" class="mb-2 block text-sm font-semibold text-gray-700">
        Kategori Produk <span class="text-red-500">*</span>
    </label>

    <select
        id="category_id"
        name="category_id"
        required
        class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm outline-none transition focus:border-teal-500 focus:ring-2 focus:ring-teal-100"
    >
        <option value="">Pilih kategori produk</option>

        @foreach ($categories as $category)
            <option
                value="{{ $category->id }}"
                @selected(old('category_id') == $category->id)
            >
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    @error('category_id')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>


        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
            <div>
                <label for="price" class="mb-2 block text-sm font-semibold text-gray-700">
                    Harga (Rp) <span class="text-red-500">*</span>
                </label>
                <input type="number" id="price" name="price"
                       value="{{ old('price') }}"
                       min="0" step="0.01" placeholder="15000" required
                       class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-teal-500 focus:ring-2 focus:ring-teal-100">
                @error('price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="stock" class="mb-2 block text-sm font-semibold text-gray-700">
                    Stok <span class="text-red-500">*</span>
                </label>
                <input type="number" id="stock" name="stock"
                       value="{{ old('stock', 0) }}"
                       min="0" step="1" required
                       class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-teal-500 focus:ring-2 focus:ring-teal-100">
                @error('stock')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="image" class="mb-2 block text-sm font-semibold text-gray-700">
                Gambar Produk
            </label>
            <input type="file" id="image" name="image"
                   accept="image/*"
                   class="block w-full rounded-xl border border-gray-300 text-sm text-gray-600 file:mr-4 file:border-0 file:bg-teal-50 file:px-4 file:py-3 file:font-semibold file:text-teal-700 hover:file:bg-teal-100">
            <p class="mt-2 text-xs text-gray-500">
                Opsional. Format gambar yang didukung mengikuti validasi server, maksimal 2 MB.
            </p>
            @error('image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col-reverse gap-3 border-t border-gray-100 pt-5 sm:flex-row sm:justify-end">
            <a href="{{ route('admin.products.index') }}"
               class="rounded-xl border border-gray-300 px-5 py-3 text-center text-sm font-semibold text-gray-700 transition hover:bg-gray-50">
                Batal
            </a>

            <button type="submit"
                    class="rounded-xl bg-teal-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-teal-700">
                Simpan Produk
            </button>
        </div>

    </form>
</div>
@endsection
