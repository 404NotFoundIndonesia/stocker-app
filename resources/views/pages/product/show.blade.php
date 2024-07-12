<x-app-layout>
    <x-slot name="header">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <h2 class="font-semibold text-xl text-gray-500 hover:text-gray-800 leading-tight">
                        <a href="{{ route('product.index') }}">Barang</a>
                    </h2>
                </li>
                <li>
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                </li>
                <li aria-current="page">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ $product->code ?? $product->name }}
                    </h2>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg shadow-md">
                <div class="p-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white">{{ $product->name }}</h3>
                            <small>{{ $product->code ?? '-' }}</small>
                        </div>

                        <div class="flex items-center">
                            <a href="{{ route('product.edit', $product->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </div>
                    </div>

                    <hr class="my-3">

                    <dl class="flex items-center space-x-6">
                        <div>
                            <dt class="mb-1 text-sm font-semibold leading-none text-gray-600 dark:text-white">Stok</dt>
                            <dd class="mb-4 text-sm font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $product->current_stock }} {{ $product->unit }}</dd>
                        </div>
                        <div>
                            <dt class="mb-1 text-sm font-semibold leading-none text-gray-600 dark:text-white">Terakhir Diperbarui</dt>
                            <dd class="mb-4 text-sm font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $product->updated_at }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
