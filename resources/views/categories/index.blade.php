<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 px-4 py-3 rounded" style="background:#0f2f21;border:1px solid #1f6f4f;color:#a6e6c8;">
                    {{ session('success') }}
                </div>
            @endif

            <div class="rounded-lg p-5" style="background:#1f2b3f;border:1px solid rgba(255,255,255,0.06);">
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-semibold" style="color:#e7edf7;">Category List</h2>
                        <p class="mt-1 text-sm" style="color:#90a0b8;">Manage your category</p>
                    </div>
                    <a href="{{ route('categories.create') }}"
                       class="inline-flex items-center rounded-lg px-4 py-2 text-sm font-medium"
                       style="background:#5451e8;color:#e9ecff;"
                       onmouseover="this.style.background='#6360f0'"
                       onmouseout="this.style.background='#5451e8'">
                        <span class="mr-1.5 text-base leading-none">+</span>
                        Add Category
                    </a>
                </div>

                <div class="overflow-x-auto rounded-lg" style="border:1px solid rgba(255,255,255,0.08);">
                    <table class="min-w-full text-sm">
                        <thead style="background:#39445c;color:#c5d0e2;" class="uppercase text-xs">
                            <tr>
                                <th class="px-6 py-3 text-left">No</th>
                                <th class="px-6 py-3 text-left">Name</th>
                                <th class="px-6 py-3 text-left">Total Product</th>
                                <th class="px-6 py-3 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody style="background:#1f2b3f;color:#c7d2e5;">
                            @forelse ($categories as $index => $category)
                                <tr style="border-top:1px solid rgba(255,255,255,0.06);">
                                    <td class="px-6 py-3">{{ $index + 1 }}</td>
                                    <td class="px-6 py-3">{{ $category->name }}</td>
                                    <td class="px-6 py-3">{{ $category->products_count }}</td>
                                    <td class="px-6 py-3">
                                        <div class="flex items-center gap-3">
                                            <a href="{{ route('categories.edit', $category->id) }}" style="color:#aab6cc;" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125" />
                                                </svg>
                                            </a>
                                            <form method="POST" action="{{ route('categories.destroy', $category->id) }}" onsubmit="return confirm('Delete this category?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="color:#aab6cc;" title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-5 text-center" style="color:#95a4ba;border-top:1px solid rgba(255,255,255,0.06);">No categories found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
