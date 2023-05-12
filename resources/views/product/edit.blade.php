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
                    Edit Product
                </h4>
                <form action="{{ route('product.update', $product) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-4">
                        <div class="px-4 pt-3">
                            <label class="block text-sm">
                                <span class="text-gray-700 ">Product Name</span>
                                <input name="product_name" value="{{ old('product_name') ?? $product->product_name }}"
                                    class="block w-full mt-1 text-sm border-gray-400 rounded-md focus:border-purple-400 focus:outline-none focus:shadow-outline-purple   form-input"
                                    placeholder="name of product ..." />
                                <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
                            </label>

                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-4">
                                <label class="block text-sm">
                                    <span class="text-gray-700 ">Product Price</span>
                                    <input name="price" value="{{ old('price') ?? $product->price }}"
                                        class="block w-full mt-1 text-sm border-gray-400 rounded-md focus:border-purple-400 focus:outline-none focus:shadow-outline-purple   form-input"
                                        placeholder="price of product ..." />
                                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                </label>

                                <label class="block text-sm">
                                    <span class="text-gray-700 ">
                                        Category
                                    </span>
                                    <select name="category_id" value="{{ old('category_id') }}"
                                        class="block w-full mt-1 text-sm  border-gray-400 rounded-md  form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple ">
                                        <option value="" disabled>category of product ...</option>
                                        @foreach ($categories as $category)
                                            <option {{ $product->category_id == $category->id ? 'selected' : '' }}
                                                value="{{ $category->id }}">{{ ucfirst($category->category_name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                                </label>
                            </div>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 ">Description</span>
                                <textarea name="description"
                                    class="block w-full mt-1 text-sm border-gray-400 rounded-md form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple "
                                    rows="3" placeholder="description of product ...">{{ old('description') ?? $product->description }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </label>
                        </div>

                        <div class="px-4 py-3">
                            <label class="block text-sm">
                                <span class="text-gray-700 ">Product Image</span>
                                <div class="mt-2 grid grid-cols-1 w-full h-44 border-4 border-purple-200 border-dashed">
                                    <div class="place-self-center">
                                        <img id="preview_image" src="{{ asset('images/' . $product->product_image) }}"
                                            alt="" class="h-40">
                                    </div>
                                </div>
                                <input id="product_image" name="product_image" onchange="previewImage()"
                                    class="block w-full mt-4 text-sm border-gray-400 rounded-md focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
                                    type="file" />
                                <x-input-error :messages="$errors->get('product_image')" class="mt-2" />
                            </label>
                        </div>
                    </div>
                    <button type="submit"
                        class="mt-4 w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Update Product
                    </button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <script type="text/javascript">
        function previewImage() {
            const product_image = document.querySelector('#product_image');
            const preview_image = document.querySelector('#preview_image');

            preview_image.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(product_image.files[0]);

            oFReader.onload = function(oFREvent) {
                preview_image.src = oFREvent.target.result;
            }

        }
    </script>
</x-app-layout>
