@extends('layout.admin')

@section('title', 'Edit Produk')
@section('page-title', 'Edit Produk')

@section('content')
<div class="mx-auto max-w-4xl space-y-6">

    <div>
        <a href="{{ route('admin.products.index') }}"
           class="text-sm font-medium text-teal-700 hover:text-teal-800">
            &larr; Kembali ke Daftar Produk
        </a>

        <h2 class="mt-4 text-xl font-bold text-gray-800">
            Edit Produk
        </h2>
        <p class="mt-1 text-sm text-gray-500">
            Perbarui informasi {{ $product->name }}.
        </p>
    </div>

    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
            <ul class="list-inside list-disc space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product) }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-6 rounded-2xl border border-gray-200 bg-white p-5 shadow-sm sm:p-8">

        @csrf
        @method('PUT')

        <div>
            <label for="name" class="mb-2 block text-sm font-semibold text-gray-700">
                Nama Produk *
            </label>
            <input type="text" id="name" name="name"
                   value="{{ old('name', $product->name) }}"
                   required
                   class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-100">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="mb-2 block text-sm font-semibold text-gray-700">
                Deskripsi Produk
            </label>
            <textarea id="description" name="description" rows="4"
                      class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-100">{{ old('description', $product->description) }}</textarea>
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
                @selected(old('category_id', $product->category_id) == $category->id)
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
                    Harga (Rp) *
                </label>
                <input type="number" id="price" name="price"
                       value="{{ old('price', $product->price) }}"
                       min="0" step="0.01" required
                       class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-100">
                @error('price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="stock" class="mb-2 block text-sm font-semibold text-gray-700">
                    Stok *
                </label>
                <input type="number" id="stock" name="stock"
                       value="{{ old('stock', $product->stock) }}"
                       min="0" step="1" required
                       class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-100">
                @error('stock')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        @if ($product->image)
            <div>
                <p class="mb-2 text-sm font-semibold text-gray-700">Gambar Saat Ini</p>
                <img src="{{ asset('storage/' . $product->image) }}"
                     alt="{{ $product->name }}"
                     class="h-32 w-32 rounded-xl border border-gray-200 object-cover">
            </div>
        @endif

        <div>
            <label for="image" class="mb-2 block text-sm font-semibold text-gray-700">
                Ganti Gambar Produk
            </label>
            <input type="file" id="image" name="image" accept="image/*"
                   class="block w-full rounded-xl border border-gray-300 text-sm text-gray-600 file:mr-4 file:border-0 file:bg-teal-50 file:px-4 file:py-3 file:font-semibold file:text-teal-700">
            <p class="mt-2 text-xs text-gray-500">
                Kosongkan jika tidak ingin mengganti gambar. Maksimal 2 MB.
            </p>
            @error('image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col-reverse gap-3 border-t border-gray-100 pt-5 sm:flex-row sm:justify-end">
            <a href="{{ route('admin.products.index') }}"
               class="rounded-xl border border-gray-300 px-5 py-3 text-center text-sm font-semibold text-gray-700 hover:bg-gray-50">
                Batal
            </a>

            <button type="submit"
                    class="rounded-xl bg-teal-600 px-5 py-3 text-sm font-semibold text-white hover:bg-teal-700">
                Simpan Perubahan
            </button>
        </div>

    </form>
</div>
@endsection
