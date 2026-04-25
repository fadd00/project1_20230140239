<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">
                    <div>
                        <h3 class="text-sm text-gray-500 dark:text-gray-400">Name</h3>
                        <p class="text-lg font-medium">{{ $category->name }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm text-gray-500 dark:text-gray-400">Owner</h3>
                        <p>{{ $category->user?->name ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm text-gray-500 dark:text-gray-400">Product</h3>
                        <p>{{ $category->product?->name ?? 'N/A' }}</p>
                    </div>

                    <div class="pt-4 flex justify-end gap-2">
                        <a href="{{ route('categories.edit', $category->id) }}" class="px-4 py-2 bg-amber-500 hover:bg-amber-600 rounded text-white text-sm font-medium">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Delete this category?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded text-white text-sm font-medium">Delete</button>
                        </form>
                        <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 rounded text-white text-sm font-medium">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
