<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    
                    @can('export-product')
                    <div class="mt-6 border-t border-gray-200 dark:border-gray-700 pt-4">
                        <h3 class="font-medium text-lg text-gray-800 dark:text-gray-200 mb-2">Admin Actions</h3>
                        <a href="{{ route('products.export') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-800 transition ease-in-out duration-150">
                            {{ __('Export Products') }}
                        </a>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
