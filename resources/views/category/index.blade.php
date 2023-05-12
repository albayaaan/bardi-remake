<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <h4 class="mb-4 text-lg font-semibold text-gray-600">
                    Table Category
                </h4>
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <form method="POST" action="{{ route('category.store') }}"
                            class="m-1 flex justify-center text-sm">
                            <div class="md:w-10/12 w-1/2 me-2">
                                <input name="category_name" value="{{ old('category_name') }}"
                                    class="block w-full text-sm border-gray-400 rounded-md focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
                                    placeholder="input new category ..." />
                                <x-input-error :messages="$errors->get('category_name')" class="mt-2" />
                            </div>
                            <div>
                                @csrf
                                <button
                                    class="px-5 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Add Category
                                </button>
                            </div>
                        </form>
                        <table class="w-full mt-3 whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 ">
                                    <th class="px-4 py-3">No</th>
                                    <th class="px-4 py-3">Category Name</th>
                                    <th class="px-4 py-3">Total Product</th>
                                    <th class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y ">
                                @foreach ($categories as $category)
                                    <tr class="text-gray-700 ">
                                        <td class="px-4 py-3">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center">
                                                <div>
                                                    <p class="font-semibold">{{ ucfirst($category->category_name) }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $category->product_count }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center space-x-4 text-sm">
                                                <form action="{{ route('category.destroy', $category) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg  focus:outline-none focus:shadow-outline-gray"
                                                        aria-label="Delete">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
