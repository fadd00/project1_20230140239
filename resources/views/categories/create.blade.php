<x-app-layout>
    <div class="py-8">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="rounded-lg p-6" style="background:#1f2b3f;border:1px solid rgba(255,255,255,0.06);">
                <div class="mb-6 flex items-center gap-3">
                    <a href="{{ route('categories.index') }}" title="Back" style="color:#90a0b8;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </a>
                    <h2 class="text-3xl font-semibold" style="color:#e7edf7;">Add Category</h2>
                </div>

                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    <div class="mb-6">
                        <label for="name" class="mb-2 block text-sm font-medium" style="color:#c5d0e2;">Category</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name') }}"
                            placeholder="Electronic"
                            class="block w-full rounded-md px-3 py-2"
                            style="border:1px solid #38475f;background:#0e1a32;color:#d6deec;"
                        >
                        @error('name')
                            <p class="mt-2 text-xs" style="color:#fca5a5;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-3">
                        <a href="{{ route('categories.index') }}"
                           class="rounded-lg px-4 py-2 text-sm font-medium"
                           style="border:1px solid #5e6b83;color:#d6deec;"
                           onmouseover="this.style.background='#27354d'"
                           onmouseout="this.style.background='transparent'">Cancel</a>
                        <button type="submit"
                                class="rounded-lg px-4 py-2 text-sm font-medium"
                                style="background:#5451e8;color:#e9ecff;"
                                onmouseover="this.style.background='#6360f0'"
                                onmouseout="this.style.background='#5451e8'">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
