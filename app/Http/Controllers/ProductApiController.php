<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductApiController extends Controller
{
    public function index()
    {
        try {
            $products = Product::with(['user', 'category'])->get();

            return response()->json([
                'message' => 'Products retrieved successfully',
                'data' => $products,
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal mengambil list produk (API)', [
                'message' => $e->getMessage(),
            ]);

            return response()->json(['message' => 'Internal server error'], 500);
        }
    }

    public function store(StoreProductRequest $request)
    {
        try {
            $validated = $request->validated();

            $validated['user_id'] = Auth::id();

            $product = Product::create($validated);

            Log::info('Menambah data produk (API)', [
                'list' => $product,
            ]);

            return response()->json([
                'message' => 'Produk berhasil ditambahkan!!',
                'data' => $product,
            ], 201);
        } catch (\Throwable $e) {
            Log::error('Error saat menambah product (API)', [
                'message' => $e->getMessage(),
            ]);

            return response()->json(['message' => 'Internal server error'], 500);
        }
    }

    public function show(int $id)
    {
        try {
            $product = Product::with(['user', 'category'])->find($id);

            if (! $product) {
                return response()->json([
                    'message' => 'Product tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'message' => 'Product retrieved successfully',
                'data' => $product,
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal mengambil data produk (API)', [
                'message' => $e->getMessage(),
            ]);

            return response()->json(['message' => 'Internal server error'], 500);
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'qty' => 'required|integer|min:0',
                'price' => 'required|numeric|min:0',
                'category_id' => 'required|exists:categories,id',
            ]);

            $product = Product::find($id);

            if (! $product) {
                return response()->json([
                    'message' => 'Product tidak ditemukan',
                ], 404);
            }

            $validated['user_id'] = Auth::id();

            $product->update($validated);

            Log::info('Mengubah data produk (API)', [
                'list' => $product,
            ]);

            return response()->json([
                'message' => 'Produk berhasil diupdate',
                'data' => $product,
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal update product (API)', [
                'message' => $e->getMessage(),
            ]);

            return response()->json(['message' => 'Internal server error'], 500);
        }
    }

    public function destroy(int $id)
    {
        try {
            $product = Product::find($id);

            if (! $product) {
                return response()->json([
                    'message' => 'Product tidak ditemukan',
                ], 404);
            }

            $product->delete();

            Log::info('Menghapus data produk (API)', [
                'id' => $id,
            ]);

            return response()->json([
                'message' => 'Produk berhasil dihapus',
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal hapus product (API)', [
                'message' => $e->getMessage(),
            ]);

            return response()->json(['message' => 'Internal server error'], 500);
        }
    }
}
