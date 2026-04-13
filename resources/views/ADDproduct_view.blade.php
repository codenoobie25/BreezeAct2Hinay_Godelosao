<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col items-center">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-auto w-full max-w-2xl">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-xl text-center">
                    {{ __("Product Details") }}
                </div>
                <form method="POST" action="{{ route('products.add') }}" class="mt-2 flex flex-col items-center">
                    @csrf
                    <!-- Add your product input fields here -->
                    <div class="mb-4 w-full max-w-sm">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 text-left">
                            {{ __('Product Name') }}
                        </label>
                        <input type="text" name="productname" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 text-left">
                            {{ __('Product Price') }}
                        </label>
                        <input type="text" name="productprice" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 text-left">
                            {{ __('Status') }}
                        </label>
                        <select name="status" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <option value="available">{{ __('Available') }}</option>
                            <option value="outofstock">{{ __('Out of Stock') }}</option>
                        </select>
                    </div>
                    <!-- Add more fields as needed -->
                    <x-primary-button class="mb-5">
                        {{ __('Save Product') }}
                    </x-primary-button>
                </form>
            </div>
            <a href="{{ route('products.index') }}">
                <x-primary-button class="mt-4">
                    {{ __('Go to Products') }}
                </x-primary-button>
            </a>
        </div>
    </div>
</x-app-layout>