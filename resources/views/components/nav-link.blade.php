@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

<a href="{{route('posts.index')}}" class="inline-flex items-center px-1 pt-1  border-indigo-400 text-sm font-medium leading-5 text-gray-900  transition duration-150 ease-in-out">
    Posts
</a>
<a href="{{route('category.index')}}" class="inline-flex items-center px-1 pt-1  border-indigo-400 text-sm font-medium leading-5 text-gray-900  transition duration-150 ease-in-out">
    Category
</a>
<a href="{{route('comments.index')}}" class="inline-flex items-center px-1 pt-1  border-indigo-400 text-sm font-medium leading-5 text-gray-900  transition duration-150 ease-in-out">
    Comment
</a>
