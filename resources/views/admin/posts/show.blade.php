<x-app-layout>
    @section("content")

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Single Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Back button -->
            <a href="{{ route('posts.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-4">
                ← Back to Posts
            </a>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <!-- Post Image -->
                <img class="w-full h-64 object-cover" src="{{ $post->image ? asset('storage/' . $post->image) : '/docs/images/blog/image-1.jpg' }}" alt="Post Image" />

                <div class="p-6">
                    <!-- Post Title -->
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>

                    <!-- Category Badge -->
                    <div class="text-sm text-blue-600 bg-blue-100 inline-flex items-center px-3 py-1 rounded-full mb-4">
                        {{ $post->category->name }}
                    </div>

                    <!-- Post Description -->
                    <p class="text-gray-700 text-lg leading-relaxed mb-6">{!! nl2br(e($post->description)) !!}</p>

                    <!-- Action Buttons -->
                    <div class="flex space-x-4">
                        <!-- Edit Button -->
                        <a href="{{ route('posts.edit', $post->id) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Edit
                            <svg class="w-3.5 h-3.5 ml-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.3 1.7a2 2 0 012.8 2.8L4 11.8l-2.2.4L1 11.8l.4-2.2L11.3 1.7z"/>
                            </svg>
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" onclick="return confirm('Are you sure you want to delete this post?')">
                                Delete
                                <svg class="w-3.5 h-3.5 ml-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 2h10a1 1 0 011 1v10a1 1 0 01-1 1H2a1 1 0 01-1-1V3a1 1 0 011-1zm2 3v6m4-6v6"/>
                                </svg>
                            </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
    @endsection
</x-app-layout>
