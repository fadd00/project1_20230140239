<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['user', 'category'])->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::query()->orderBy('name')->get();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Nama tidak boleh kosong.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'qty.required' => 'Quantity tidak boleh kosong.',
            'qty.integer' => 'Quantity harus berupa angka bulat.',
            'qty.min' => 'Quantity tidak boleh kurang dari 0.',
            'price.required' => 'Price tidak boleh kosong.',
            'price.numeric' => 'Price harus berupa angka.',
            'price.min' => 'Price tidak boleh kurang dari 0.',
            'category_id.required' => 'Kategori tidak boleh kosong.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
        ];

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ], $messages);

        $validated['user_id'] = Auth::id();

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        $product->load(['user', 'category']);
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::query()->orderBy('name')->get();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $messages = [
            'name.required' => 'Nama tidak boleh kosong.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'qty.required' => 'Quantity tidak boleh kosong.',
            'qty.integer' => 'Quantity harus berupa angka bulat.',
            'qty.min' => 'Quantity tidak boleh kurang dari 0.',
            'price.required' => 'Price tidak boleh kosong.',
            'price.numeric' => 'Price harus berupa angka.',
            'price.min' => 'Price tidak boleh kurang dari 0.',
            'category_id.required' => 'Kategori tidak boleh kosong.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
        ];

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ], $messages);

        $validated['user_id'] = $product->user_id ?? Auth::id();

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
