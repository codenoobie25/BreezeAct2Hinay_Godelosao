<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Suppliers') }}
        </h2>
    </x-slot>

    @php
        $isEditing = isset($editingSupplier);
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 dark:border-green-900 dark:bg-green-900/20 dark:text-green-300">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ $isEditing ? __('Edit Supplier') : __('Add Supplier') }}
                </div>

                <div class="px-6 pb-6">
                    <form method="POST" action="{{ $isEditing ? route('suppliers.update', $editingSupplier) : route('suppliers.store') }}" class="grid gap-4 md:grid-cols-3">
                        @csrf
                        @if ($isEditing)
                            @method('PUT')
                        @endif

                        <div>
                            <label for="supplier_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Supplier Name') }}
                            </label>
                            <input
                                id="supplier_name"
                                name="supplier_name"
                                type="text"
                                value="{{ old('supplier_name', $editingSupplier->supplier_name ?? '') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                            >
                            @error('supplier_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contact_info" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Contact Info') }}
                            </label>
                            <input
                                id="contact_info"
                                name="contact_info"
                                type="text"
                                value="{{ old('contact_info', $editingSupplier->contact_info ?? '') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                            >
                            @error('contact_info')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="supplier_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Supplier Address') }}
                            </label>
                            <input
                                id="supplier_address"
                                name="supplier_address"
                                type="text"
                                value="{{ old('supplier_address', $editingSupplier->supplier_address ?? '') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                            >
                            @error('supplier_address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-3 flex items-center gap-3">
                            <x-primary-button>
                                {{ $isEditing ? __('Update Supplier') : __('Save Supplier') }}
                            </x-primary-button>

                            @if ($isEditing)
                                <a href="{{ route('suppliers.index') }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-gray-800">
                                    {{ __('Cancel') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Supplier List') }}
                </div>

                <div class="px-6 pb-6">
                    <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700/50">
                                <tr>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-700 dark:text-gray-200">{{ __('Supplier Name') }}</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-700 dark:text-gray-200">{{ __('Contact Info') }}</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-700 dark:text-gray-200">{{ __('Supplier Address') }}</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-700 dark:text-gray-200">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800">
                                @forelse ($suppliers as $supplier)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/40 transition-colors">
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ $supplier->supplier_name }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ $supplier->contact_info }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ $supplier->supplier_address }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                            <div class="flex items-center gap-2">
                                                <a href="{{ route('suppliers.edit', $supplier) }}" class="inline-flex items-center rounded-md bg-blue-600 px-3 py-2 text-xs font-semibold uppercase tracking-wider text-white hover:bg-blue-500">
                                                    {{ __('Edit') }}
                                                </a>

                                                <form method="POST" action="{{ route('suppliers.destroy', $supplier) }}" onsubmit="return confirm('Delete this supplier?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center rounded-md bg-red-600 px-3 py-2 text-xs font-semibold uppercase tracking-wider text-white hover:bg-red-500">
                                                        {{ __('Delete') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-6 text-center text-sm text-gray-500 dark:text-gray-400">
                                            {{ __('No suppliers found.') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
