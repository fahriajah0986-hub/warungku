@extends('layout.admin')

@section('title', 'Edit Kategori')
@section('page-title', 'Edit Kategori')

@section('content')
<div class="w-full max-w-5xl space-y-6">
    <div>
        <a href="{{ route('admin.categories.index') }}"
            class="group mb-6 inline-flex w-fit items-center gap-3 rounded-xl border border-teal-100 bg-white px-4 py-3 text-sm font-semibold text-gray-700 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:border-teal-300 hover:bg-teal-50 hover:text-teal-700 hover:shadow-md">
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
                <span class="text-sm font-semibold">Kembali ke Daftar Kategori</span>
                <span class="mt-0.5 text-xs font-normal text-gray-400 group-hover:text-teal-600">
                    Lihat semua kategori
                </span>
            </span>
        </a>

        <h2 class="mt-4 text-xl font-bold text-gray-800">
            Edit Kategori
        </h2>
        <p class="mt-1 text-sm text-gray-500">
            Perbarui informasi kategori {{ $category->name }}.
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

    <form action="{{ route('admin.categories.update', $category) }}"
          method="POST"
          class="space-y-6 rounded-2xl border border-gray-200 bg-white p-5 shadow-sm sm:p-8">

        @csrf
        @method('PUT')

        <div>
            <label for="name" class="mb-2 block text-sm font-semibold text-gray-700">
                Nama Kategori *
            </label>
            <input type="text" id="name" name="name"
                   value="{{ old('name', $category->name) }}"
                   minlength="2" maxlength="255" required
                   class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-100">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="mb-2 block text-sm font-semibold text-gray-700">
                Deskripsi Kategori
            </label>
            <textarea id="description" name="description" rows="4"
                      class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-100">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col-reverse gap-3 border-t border-gray-100 pt-5 sm:flex-row sm:justify-end">
            <a href="{{ route('admin.categories.index') }}"
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
