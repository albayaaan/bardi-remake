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
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-4">
                        <div class="px-4 pt-3 mb-8 ">
                            <label class="block text-sm">
                                <span class="text-gray-700 ">Product Name</span>
                                <input
                                    class="block w-full mt-1 text-sm border-gray-400 rounded-md focus:border-purple-400 focus:outline-none focus:shadow-outline-purple   form-input"
                                    placeholder="name of product ..." name="product_name" />
                            </label>

                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-4">
                                <label class="block text-sm">
                                    <span class="text-gray-700 ">Product Prize</span>
                                    <input
                                        class="block w-full mt-1 text-sm border-gray-400 rounded-md focus:border-purple-400 focus:outline-none focus:shadow-outline-purple   form-input"
                                        placeholder="prize of product ..." name="prize" />
                                </label>

                                <label class="block text-sm">
                                    <span class="text-gray-700 ">
                                        Category
                                    </span>
                                    <select name="category_id"
                                        class="block w-full mt-1 text-sm  border-gray-400 rounded-md  form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple ">
                                        <option value="" disabled selected>category of product ...</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ ucfirst($category->category_name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 ">Description</span>
                                <textarea name="description"
                                    class="block w-full mt-1 text-sm border-gray-400 rounded-md form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple "
                                    rows="3" placeholder="description of product ..."></textarea>
                            </label>
                        </div>

                        <div class="px-4 py-3 mb-8 ">
                            <label class="block text-sm">
                                <span class="text-gray-700 ">Product Image</span>
                                <div class="mt-2 grid grid-cols-1 w-full h-40 border-4 border-purple-200 border-dashed">
                                    <div class="place-self-center">
                                        <p class="text-xl tracking-wider text-gray-400">
                                            Preview Image</p>
                                    </div>
                                </div>
                                <input name="product_image"
                                    class="block w-full mt-4 text-sm border-gray-400 rounded-md focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
                                    type="file" />
                            </label>
                        </div>
                    </div>
                    <button type="submit"
                        class=" w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Add Product
                    </button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</x-app-layout>
