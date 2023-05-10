<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <h4 class="mb-4 text-lg font-semibold text-gray-600">
                    Add Product
                </h4>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-4">

                    <div class="px-4 py-3 mb-8 ">
                        <label class="block text-sm">
                            <span class="text-gray-700 ">Product Name</span>
                            <input
                                class="block w-full mt-1 text-sm border-gray-400 rounded-md focus:border-purple-400 focus:outline-none focus:shadow-outline-purple   form-input"
                                placeholder="name of product ..." />
                        </label>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-4">
                            <label class="block text-sm">
                                <span class="text-gray-700 ">Product Prize</span>
                                <input
                                    class="block w-full mt-1 text-sm border-gray-400 rounded-md focus:border-purple-400 focus:outline-none focus:shadow-outline-purple   form-input"
                                    placeholder="prize of product ..." />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 ">
                                    Category
                                </span>
                                <select
                                    class="block w-full mt-1 text-sm  border-gray-400 rounded-md  form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple ">
                                    <option value="" disabled selected>category of product ...</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>

                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 ">Description</span>
                            <textarea
                                class="block w-full mt-1 text-sm border-gray-400 rounded-md form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple "
                                rows="3" placeholder="description of product ..."></textarea>
                        </label>
                    </div>
                    <div class="flex justify-center">
                        <div class="lg:max-w-lg max-w-xs">
                            <div class="px-4 py-3">
                                <label class="inline-block mb-2 text-sm text-gray-700">Product Image</label>
                                <div class="flex items-center justify-center w-full">
                                    <label
                                        class="flex flex-col w-full h-40 border-4 border-purple-200 border-dashed hover:bg-gray-100 hover:border-gray-300">
                                        <div class="flex flex-col items-center justify-center pt-12">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-8 h-8 text-gray-400 group-hover:text-gray-600" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <p
                                                class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                                Upload image</p>
                                        </div>
                                        <input type="file" class="opacity-0" />
                                    </label>
                                </div>
                            </div>
                            <div class="flex justify-center p-2">
                                <button
                                    class="w-full px-4 py-2 text-white bg-purple-600 hover:bg-purple-700 rounded shadow-xl">Add
                                    Product</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
