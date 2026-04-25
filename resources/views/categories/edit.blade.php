<x-app-layout>
    <div class="py-10">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="rounded-xl border border-white/10 bg-slate-800/70 p-6">
                <div class="mb-6 flex items-center gap-3">
                    <a href="{{ route('categories.index') }}" class="text-slate-400 hover:text-slate-200" title="Back">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </a>
                    <h2 class="text-3xl font-semibold text-slate-100">Edit Category</h2>
                </div>

                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label for="name" class="mb-2 block text-sm font-medium text-slate-300">Category</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name', $category->name) }}"
                            class="block w-full rounded-md border border-slate-700 bg-slate-900 px-3 py-2 text-slate-100 placeholder-slate-500 focus:border-indigo-500 focus:ring-indigo-500"
                        >
                        @error('name')
                            <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-3">
                        <a href="{{ route('categories.index') }}" class="rounded-lg border border-slate-600 px-4 py-2 text-sm font-medium text-slate-200 hover:bg-slate-700/60">Cancel</a>
                        <button type="submit" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-500">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
