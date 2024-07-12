<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Barang
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg shadow-md">
                <div class="p-3 flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4">
                    <div>
                        <form action="" method="get">
                            <x-input class="block mt-1 w-full" type="search" placeholder="Kode, nama barang" name="q" :value="request()->query('q')" />
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('product.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Barang Baru
                        </a>
                    </div>
                </div>
                <div class="relative overflow-x-auto border-b border-gray-200">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Kode
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Barang
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Stok
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Satuan
                                </th>
                                <th scope="col" class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($products))
                                @foreach ($products as $product)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-indigo-600 whitespace-nowrap dark:text-white">
                                        <a href="{{ route('product.show', $product->id) }}" class="hover:underline">{{ $product->code ?? '-' }}</a>
                                    </th>
                                    <td class="px-6 py-4">{{ $product->name }}</td>
                                    <td class="px-6 py-4">{{ $product->current_stock }}</td>
                                    <td class="px-6 py-4">{{ $product->unit }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('product.edit', $product->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="post" onsubmit="return confirm('Apakah Anda yakin?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="p-3 text-center">Barang tidak ada.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="p-3">
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
