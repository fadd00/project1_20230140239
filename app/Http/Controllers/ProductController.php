<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('user')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $users = \App\Models\User::all();
        return view('products.create', compact('users'));
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
            'user_id.required' => 'Owner tidak boleh kosong.',
            'user_id.exists' => 'Owner yang dipilih tidak valid.',
        ];

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
        ], $messages);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $users = \App\Models\User::all();
        return view('products.edit', compact('product', 'users'));
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
            'user_id.required' => 'Owner tidak boleh kosong.',
            'user_id.exists' => 'Owner yang dipilih tidak valid.',
        ];

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
        ], $messages);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
