<x-app-layout>
    <div class="py-8">
        <div class="mx-auto w-full px-4 sm:px-6 lg:px-8">
            <div class="mx-auto w-full md:w-1/2 rounded-lg p-6" style="background:#1f2b3f;border:1px solid rgba(255,255,255,0.06);">
                <div class="mb-4 flex items-center gap-3">
                    <a href="{{ route('products.index') }}" title="Back" style="color:#90a0b8;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </a>
                    <div>
                        <h2 class="text-2xl font-semibold" style="color:#e7edf7;">Add Product</h2>
                        <p class="mt-0.5 text-sm" style="color:#90a0b8;">Fill in the details to add a new product</p>
                    </div>
                </div>

                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="mb-2 block text-sm font-medium" style="color:#c5d0e2;">Nama Produk</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name') }}"
                            placeholder="e.g. Wireless Headphones"
                            class="block w-full rounded-md px-3 py-2"
                            style="border:1px solid #38475f;background:#0e1a32;color:#d6deec;"
                        >
                        @error('name')
                            <p class="mt-2 text-xs" style="color:#fca5a5;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="category_id" class="mb-2 block text-sm font-medium" style="color:#c5d0e2;">Kategori</label>
                        <select
                            name="category_id"
                            id="category_id"
                            class="block w-full rounded-md px-3 py-2"
                            style="border:1px solid #38475f;background:#0e1a32;color:#d6deec;"
                        >
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-2 text-xs" style="color:#fca5a5;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="qty" class="mb-2 block text-sm font-medium" style="color:#c5d0e2;">Quantity</label>
                            <input
                                type="number"
                                name="qty"
                                id="qty"
                                value="{{ old('qty', 0) }}"
                                class="block w-full rounded-md px-3 py-2"
                                style="border:1px solid #38475f;background:#0e1a32;color:#d6deec;"
                            >
                            @error('qty')
                                <p class="mt-2 text-xs" style="color:#fca5a5;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="price" class="mb-2 block text-sm font-medium" style="color:#c5d0e2;">Price (Rp)</label>
                            <input
                                type="number"
                                step="0.01"
                                name="price"
                                id="price"
                                value="{{ old('price', 0) }}"
                                class="block w-full rounded-md px-3 py-2"
                                style="border:1px solid #38475f;background:#0e1a32;color:#d6deec;"
                            >
                            @error('price')
                                <p class="mt-2 text-xs" style="color:#fca5a5;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-5 flex items-center justify-end gap-3">
                        <a href="{{ route('products.index') }}"
                           class="rounded-lg px-4 py-2 text-sm font-medium"
                           style="border:1px solid #5e6b83;color:#d6deec;"
                           onmouseover="this.style.background='#27354d'"
                           onmouseout="this.style.background='transparent'">Cancel</a>
                        <button type="submit"
                                class="rounded-lg px-4 py-2 text-sm font-medium"
                                style="background:#5451e8;color:#e9ecff;"
                                onmouseover="this.style.background='#6360f0'"
                                onmouseout="this.style.background='#5451e8'">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
