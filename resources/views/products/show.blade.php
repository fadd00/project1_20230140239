<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-3">
                <a href="{{ route('products.index') }}"
                   class="flex items-center justify-center w-8 h-8 rounded-lg transition-colors"
                   style="color:#5a6478;"
                   onmouseover="this.style.background='rgba(255,255,255,0.06)';this.style.color='#dde1ec'"
                   onmouseout="this.style.background='transparent';this.style.color='#5a6478'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
                    </svg>
                </a>
                <div>
                    <h2 class="font-semibold leading-tight" style="font-size:20px;color:#e8eaf0;">
                        Product Detail
                    </h2>
                    <p class="text-xs mt-0.5" style="color:#5a6478;">
                        Viewing product #{{ $product->id }}
                    </p>
                </div>
            </div>

            <div class="flex gap-2.5">
                {{-- Edit Button --}}
                <a href="{{ route('products.edit', $product->id) }}"
                   class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg text-sm font-medium transition-colors"
                   style="border:1.5px solid #d97706;color:#d97706;background:transparent;"
                   onmouseover="this.style.background='rgba(217,119,6,0.08)'"
                   onmouseout="this.style.background='transparent'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                    </svg>
                    Edit
                </a>

                {{-- Delete Button --}}
                <form method="POST" action="{{ route('products.destroy', $product->id) }}"
                      onsubmit="return confirm('Delete this product?')">
                    @csrf @method('DELETE')
                    <button type="submit"
                            class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg text-sm font-medium transition-colors"
                            style="border:1.5px solid #dc2626;color:#dc2626;background:transparent;"
                            onmouseover="this.style.background='rgba(220,38,38,0.08)'"
                            onmouseout="this.style.background='transparent'">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <polyline points="3 6 5 6 21 6"/>
                            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                            <path d="M10 11v6M14 11v6"/>
                            <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
                        </svg>
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="rounded-xl overflow-hidden"
                 style="background:#1a1f2e;border:0.5px solid rgba(255,255,255,0.08);">

                {{-- Product Name --}}
                <div class="grid px-6 py-4" style="grid-template-columns:160px 1fr;align-items:center;border-bottom:0.5px solid rgba(255,255,255,0.06);">
                    <span class="text-sm" style="color:#5a6478;">Product Name</span>
                    <span class="font-semibold" style="color:#e8eaf0;">{{ $product->name }}</span>
                </div>

                {{-- Quantity --}}
                <div class="grid px-6 py-4" style="grid-template-columns:160px 1fr;align-items:center;border-bottom:0.5px solid rgba(255,255,255,0.06);">
                    <span class="text-sm" style="color:#5a6478;">Quantity</span>
                    @if($product->qty > 0)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium w-fit"
                              style="background:#15803d;color:#bbf7d0;">
                            {{ $product->qty }} In Stock
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium w-fit"
                              style="background:#991b1b;color:#fecaca;">
                            Out of Stock
                        </span>
                    @endif
                </div>

                {{-- Price --}}
                <div class="grid px-6 py-4" style="grid-template-columns:160px 1fr;align-items:center;border-bottom:0.5px solid rgba(255,255,255,0.06);">
                    <span class="text-sm" style="color:#5a6478;">Price</span>
                    <span class="font-bold font-mono" style="color:#e8eaf0;font-size:15px;">
                        Rp&nbsp; {{ number_format($product->price, 0, ',', '.') }}
                    </span>
                </div>

                {{-- Category --}}
                <div class="grid px-6 py-4" style="grid-template-columns:160px 1fr;align-items:center;border-bottom:0.5px solid rgba(255,255,255,0.06);">
                    <span class="text-sm" style="color:#5a6478;">Category</span>
                    <span class="text-sm" style="color:#dde1ec;">{{ $product->category?->name ?? 'N/A' }}</span>
                </div>

                {{-- Owner --}}
                <div class="grid px-6 py-4" style="grid-template-columns:160px 1fr;align-items:center;border-bottom:0.5px solid rgba(255,255,255,0.06);">
                    <span class="text-sm" style="color:#5a6478;">Owner</span>
                    @if($product->user)
                        <div class="flex items-center gap-2.5">
                            <div class="w-7 h-7 rounded-full flex items-center justify-center text-xs font-semibold flex-shrink-0"
                                 style="background:#4f46e5;color:#c7d2fe;">
                                {{ strtoupper(substr($product->user->name, 0, 1)) }}
                            </div>
                            <span class="text-sm" style="color:#dde1ec;">{{ $product->user->name }}</span>
                        </div>
                    @else
                        <span class="text-sm italic" style="color:#5a6478;">N/A</span>
                    @endif
                </div>

                {{-- Created At --}}
                <div class="grid px-6 py-4" style="grid-template-columns:160px 1fr;align-items:center;border-bottom:0.5px solid rgba(255,255,255,0.06);">
                    <span class="text-sm" style="color:#5a6478;">Created At</span>
                    <span class="text-sm" style="color:#dde1ec;">
                        {{ $product->created_at ? $product->created_at->format('d M Y, H:i') : '-' }}
                    </span>
                </div>

                {{-- Updated At --}}
                <div class="grid px-6 py-4" style="grid-template-columns:160px 1fr;align-items:center;">
                    <span class="text-sm" style="color:#5a6478;">Updated At</span>
                    <span class="text-sm" style="color:#dde1ec;">
                        {{ $product->updated_at ? $product->updated_at->format('d M Y, H:i') : '-' }}
                    </span>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>