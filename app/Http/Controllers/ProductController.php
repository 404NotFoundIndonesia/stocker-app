<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|View
     */
    public function index(Request $request): View
    {
        return view('pages.product.index', [
            'products' => Product::search($request->query('q'))->render($request->query('size')),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|View
     */
    public function create(): View
    {
        return view('pages.product.create', [
            'units' => Product::availableUnits(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        try {
            $input = $request->validated();
            $input['current_stock'] = $input['initial_stock'];

            Product::create($input);

            return redirect()->route('product.index')->with('success', 'Berhasil menambahkan barang baru');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return back()->with('error', 'Gagal menambahkan barang baru');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product): View
    {
        return view('pages.product.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product): View
    {
        return view('pages.product.edit', [
            'product' => $product,
            'units' => Product::availableUnits(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        try {
            $input = $request->validated();
            $product->update($input);

            return back()->with('success', 'Berhasil memperbarui barang');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return back()->with('error', 'Gagal memperbarui barang');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product): RedirectResponse
    {
        try {
            $product->delete();

            return back()->with('success', 'Berhasil menghapus barang');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return back()->with('error', 'Gagal menghapus barang');
        }
    }
}
