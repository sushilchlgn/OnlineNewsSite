@php use Carbon\Carbon; @endphp
<x-app-layout>
    @section("content")

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="p-6 bg-white rounded-lg shadow-md">
                <a href="{{ route('comments.create') }}">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right mb-4">
                        Add Comment
                    </button>
                </a>

                <!-- Comment List Start -->
                <div class="mb-3">
                    <div class="border-b pb-4 mb-6">
                        <h4 class="text-lg font-bold text-gray-800">Comments</h4>
                    </div>
                    @if ($comment && $comment->count() > 0)
                        <div class="space-y-6">
                            @foreach ($comment as $item)
                                <div class="flex space-x-4 mb-4">
                                    <img src="img/user.jpg" alt="User Image" class="w-12 h-12 rounded-full">
                                    <div class="flex-1">
                                        <div class="text-gray-800 font-semibold">
                                            <a href="#" class="hover:underline">{{ $item->user->name }}</a>
                                            <span class="text-sm text-gray-500">
                                                <i>{{Carbon::parse($item->created_at)->format('d M, Y') }}</i>
                                            </span>
                                        </div>
                                        <p class="text-gray-600">{{ $item->body }}</p>

                                        @if (auth()->check())
                                            <button class="text-blue-500 hover:underline text-sm mt-2"
                                                onclick="showReplyForm({{ $item->id }})">Reply</button>
                                        @else
                                            <p class="text-sm text-gray-500 mt-2">
                                                Please <a href="{{ route('login') }}"
                                                    class="text-blue-500 hover:underline">login</a> to reply.
                                            </p>
                                        @endif

                                        <!-- Reply Form -->
                                        <div id="reply-form-{{ $item->id }}" class="mt-4 hidden">
                                            <form action="{{ route('comments.reply', $item->id) }}" method="POST">
                                                @csrf
                                                <textarea name="body" cols="30" rows="2"
                                                    class="w-full p-2 rounded border border-gray-300"></textarea>
                                                <button type="submit"
                                                    class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                                    Submit Reply
                                                </button>
                                            </form>
                                        </div>

                                        <!-- Show Replies -->
                                        @if ($item->replies && $item->replies->count() > 0)
                                            <div class="mt-4 space-y-4">
                                                @foreach ($item->replies as $reply)
                                                    <div class="flex space-x-4">
                                                        <img src="img/user.jpg" alt="User Image" class="w-10 h-10 rounded-full">
                                                        <div class="flex-1">
                                                            <div class="text-gray-800 font-semibold">
                                                                <a href="#" class="hover:underline">{{ $reply->user->name }}</a>
                                                                <span class="text-sm text-gray-500">
                                                                    <i>{{Carbon::parse($reply->created_at)->format('d M, Y') }}</i>
                                                                </span>
                                                            </div>
                                                            <p class="text-gray-600">{{ $reply->body }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">No Comments</p>
                    @endif
                </div>
                <!-- Comment List End -->
            </div>
        </div>
    </div>

    @endsection
</x-app-layout>

<script>
    function showReplyForm(commentId) {
        const replyForm = document.getElementById('reply-form-' + commentId);
        if (replyForm.classList.contains('hidden')) {
            replyForm.classList.remove('hidden');
        } else {
            replyForm.classList.add('hidden');
        }
    }
</script>