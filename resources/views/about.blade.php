<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-6">Data Diri</h3>
                    <table class="w-full text-left">
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <tr class="py-3">
                                <td class="py-3 pr-8 font-semibold text-gray-600 dark:text-gray-400 w-40">Nama</td>
                                <td class="py-3 text-gray-800 dark:text-gray-200">Andhika Prima Hutama</td>
                            </tr>
                            <tr>
                                <td class="py-3 pr-8 font-semibold text-gray-600 dark:text-gray-400">NIM</td>
                                <td class="py-3 text-gray-800 dark:text-gray-200">20230140239</td>
                            </tr>
                            <tr>
                                <td class="py-3 pr-8 font-semibold text-gray-600 dark:text-gray-400">Program Studi</td>
                                <td class="py-3 text-gray-800 dark:text-gray-200">Teknik Informatika</td>
                            </tr>
                            <tr>
                                <td class="py-3 pr-8 font-semibold text-gray-600 dark:text-gray-400">Hobi</td>
                                <td class="py-3 text-gray-800 dark:text-gray-200">main</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
