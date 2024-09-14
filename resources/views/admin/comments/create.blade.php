<x-app-layout>
    @section("content")

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Post')}}
            <!-- {{ isset($post) ? __('Edit Post') : __('Add Post') }} -->
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-white shadow sm:rounded-lg">
                <div class="w-full max-w-lg">
                    <form action="{{route("comments.store")}}" method="POST" class="space-y-6">
                        @csrf
                        @method('POST')
                        
                        <!-- Description -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                Description
                            </label>
                            <textarea 
                                id="description" 
                                name="body" 
                                style="height:150px" 
                                placeholder="Enter your description about news" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                 required></textarea>
                        </div>

                        <!-- Post title -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
                                Post Title
                            </label>
                            <select 
                                id="category" 
                                name="post_id" 
                                class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                required>
                                <option value="">Select Post Title</option>
                                @foreach ($post as $item )
                                <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-between">
                            <button 
                                type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{-- isset($post) ? 'Update Post' : 'Add Post' --}}
                                Add comment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
</x-app-layout>
