<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::latest()->paginate(10); // Mengambil 10 produk terbaru dari database.
        return view('products.index', compact('products')); //Mengirimkannya ke tampilan view products/index.blade.php.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ // Ini adalah proses validasi otomatis sebelum menyimpan data. Jika ada input yang tidak sesuai aturan, Laravel akan otomatis kembali ke halaman form dan menampilkan pesan error.
            'name' => 'required', //required artinya wajib diisi (tidak boleh kosong)
            'stock' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        Product::create($request->all()); //Ini perintah untuk menyimpan data baru ke tabel products di database.
        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('succsess', 'Produk berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) //untuk menghapus produk
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }
}
