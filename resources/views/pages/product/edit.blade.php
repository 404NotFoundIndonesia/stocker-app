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
                <li>
                    <h2 class="font-semibold text-xl text-gray-500 hover:text-gray-800 leading-tight">
                        <a href="{{ route('product.show', $product->id) }}">{{ $product->code ?? $product->name }}</a>
                    </h2>
                </li>
                <li>
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                </li>
                <li aria-current="page">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Edit Barang
                    </h2>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg shadow-md">
                <div class="p-6">
                    <form action="{{ route('product.update', $product->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <div>
                                <x-label for="code" :value="__('Kode')" />

                                <x-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code', $product->code)" required autofocus />
                                <small class="text-red-500">{{ $errors->first('code') }}</small>
                            </div>
                            <div>
                                <x-label for="name" :value="__('Nama Barang')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $product->name)" />
                                <small class="text-red-500">{{ $errors->first('name') }}</small>
                            </div>
                            <div>
                                <x-label for="current_stock" :value="__('Stok')" />

                                <x-input id="current_stock" class="block mt-1 w-full" type="number" min="0" name="current_stock" :value="old('current_stock', $product->current_stock)" />
                                <small class="text-red-500">{{ $errors->first('current_stock') }}</small>
                            </div>
                            <div>
                                <x-label for="unit" :value="__('Satuan')" />

                                <select name="unit" id="unit" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($units as $unit)
                                    <option value="{{ $unit }}" {{ old('unit', $product->unit) === $unit ? 'selected' : '' }}>{{ $unit }}</option>
                                    @endforeach
                                </select>
                                <small class="text-red-500">{{ $errors->first('unit') }}</small>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4 bg-gray-200 hover:bg-gray-300 active:bg-gray-300 text-black" type="reset">
                                {{ __('Reset') }}
                            </x-button>
                            <x-button class="ml-2">
                                {{ __('Simpan') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
