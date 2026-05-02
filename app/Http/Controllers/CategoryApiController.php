<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CategoryApiController extends Controller
{
    public function index()
    {
        try {
            $categories = Category::all();

            return response()->json([
                'message' => 'Categories retrieved successfully',
                'data' => $categories,
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal mengambil list kategori (API)', [
                'message' => $e->getMessage(),
            ]);

            return response()->json(['message' => 'Internal server error'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $category = Category::create([
                'name' => $validated['name'],
                'user_id' => Auth::id(),
            ]);

            Log::info('Menambah kategori (API)', ['category' => $category]);

            return response()->json([
                'message' => 'Kategori berhasil ditambahkan',
                'data' => $category,
            ], 201);
        } catch (\Throwable $e) {
            Log::error('Error saat menambah kategori (API)', [
                'message' => $e->getMessage(),
            ]);

            return response()->json(['message' => 'Internal server error'], 500);
        }
    }

    public function show(int $id)
    {
        try {
            $category = Category::find($id);

            if (! $category) {
                return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
            }

            return response()->json([
                'message' => 'Kategori retrieved successfully',
                'data' => $category,
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal mengambil kategori (API)', [
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
            ]);

            $category = Category::find($id);

            if (! $category) {
                return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
            }

            $category->update([
                'name' => $validated['name'],
            ]);

            Log::info('Update kategori (API)', ['category' => $category]);

            return response()->json([
                'message' => 'Kategori berhasil diupdate',
                'data' => $category,
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal update kategori (API)', [
                'message' => $e->getMessage(),
            ]);

            return response()->json(['message' => 'Internal server error'], 500);
        }
    }

    public function destroy(int $id)
    {
        try {
            $category = Category::find($id);

            if (! $category) {
                return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
            }

            $category->delete();

            Log::info('Hapus kategori (API)', ['id' => $id]);

            return response()->json(['message' => 'Kategori berhasil dihapus'], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal hapus kategori (API)', [
                'message' => $e->getMessage(),
            ]);

            return response()->json(['message' => 'Internal server error'], 500);
        }
    }
}
