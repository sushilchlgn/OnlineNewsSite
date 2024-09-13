<x-app-layout>
    @section("content")

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($post) ? __('Edit Post') : __('Add Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-white shadow sm:rounded-lg">
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                        <strong class="font-bold">Whoops!</strong>
                        <ul class="mt-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="w-full max-w-lg">
                    <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" class="space-y-6">
                        @csrf
                        @if (isset($post))
                            @method('PUT') <!-- Use PUT method for updates -->
                        @endif

                        <!-- Title -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                Title
                            </label>
                            <input 
                                type="text" 
                                id="title" 
                                name="title" 
                                placeholder="Enter your title" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                value="{{ old('title', isset($post) ? $post->title : '') }}" 
                                required>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                Description
                            </label>
                            <textarea 
                                id="description" 
                                name="description" 
                                style="height:150px" 
                                placeholder="Enter your description about news" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>{{ old('description', isset($post) ? $post->description : '') }}</textarea>
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
                                Category
                            </label>
                            <select 
                                id="category" 
                                name="category_id" 
                                class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ (old('category_id', isset($post) ? $post->category_id : '') == $category->id) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-between">
                            <button 
                                type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ isset($post) ? 'Update Post' : 'Add Post' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
</x-app-layout>
