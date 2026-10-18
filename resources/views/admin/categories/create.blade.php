@extends('layout.admin')

@section('title', 'Tambah Kategori')
@section('page-title', 'Tambah Kategori')

@section('content')
<div class="mx-auto max-w-3xl space-y-6">

    <div>
        <a href="{{ route('admin.categories.index') }}"
           class="inline-flex items-center gap-2 py-2 text-base font-semibold text-teal-700 transition hover:text-teal-900">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali ke Daftar Kategori
        </a>

        <h2 class="mt-4 text-xl font-bold text-gray-800">
            Tambah Kategori Baru
        </h2>
        <p class="mt-1 text-sm text-gray-500">
            Buat kategori untuk mengelompokkan produk sembako.
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

    <form action="{{ route('admin.categories.store') }}"
          method="POST"
          class="space-y-6 rounded-2xl border border-gray-200 bg-white p-5 shadow-sm sm:p-8">

        @csrf

        <div>
            <label for="name" class="mb-2 block text-sm font-semibold text-gray-700">
                Nama Kategori <span class="text-red-500">*</span>
            </label>

            <input type="text"
                   id="name"
                   name="name"
                   value="{{ old('name') }}"
                   placeholder="Contoh: Beras dan Biji-bijian"
                   minlength="2"
                   maxlength="255"
                   required
                   class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-teal-500 focus:ring-2 focus:ring-teal-100">

            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="mb-2 block text-sm font-semibold text-gray-700">
                Deskripsi Kategori
            </label>

            <textarea id="description"
                      name="description"
                      rows="4"
                      placeholder="Jelaskan jenis produk yang termasuk dalam kategori ini..."
                      class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-teal-500 focus:ring-2 focus:ring-teal-100">{{ old('description') }}</textarea>

            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col-reverse gap-3 border-t border-gray-100 pt-5 sm:flex-row sm:justify-end">
            <a href="{{ route('admin.categories.index') }}"
               class="rounded-xl border border-gray-300 px-5 py-3 text-center text-sm font-semibold text-gray-700 transition hover:bg-gray-50">
                Batal
            </a>

            <button type="submit"
                    class="rounded-xl bg-teal-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-teal-700">
                Simpan Kategori
            </button>
        </div>

    </form>
</div>
@endsection
