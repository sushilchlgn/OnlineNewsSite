<x-app-layout>
    @section("content")

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($category) ? __('Update Category') : __('Add Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white relative overflow-x-auto shadow sm:rounded-lg">
                <div class="w-full max-w-xs">
                    <form class="bg-white rounded px-8 pt-6 pb-8 mb-4" 
                          action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}" 
                          method="POST">
                        @csrf
                        @if (isset($category))
                            @method('PUT') <!-- Use PUT method for updates -->
                        @endif

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
                                Category
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="category" 
                                type="text" 
                                name="name" 
                                placeholder="Enter Category"
                                value="{{ isset($category) ? $category->name : '' }}" 
                                required>
                        </div>

                        <div class="flex items-center justify-between">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                {{ isset($category) ? 'Update Category' : 'Add Category' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
