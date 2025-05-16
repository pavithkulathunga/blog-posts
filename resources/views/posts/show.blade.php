<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="max-w-3xl py-6 mx-auto bg-white shadow sm:px-6 lg:px-8 dark:bg-gray-800 sm:rounded-lg">
        <article class="p-6 prose dark:prose-invert max-w-none">
            <p class="mb-4 text-gray-500 dark:text-gray-400">By {{ $post->user->name ?? 'Unknown' }} on {{ $post->created_at->format('M d, Y') }}</p>
            {!! nl2br(e($post->content)) !!}
        </article>

        <hr class="my-6 border-gray-300 dark:border-gray-700">

        {{-- Comments Section --}}
        <section>
            <h3 class="mb-4 text-lg font-semibold text-gray-700 dark:text-gray-300">Comments</h3>

            @if($post->comments->count())
                <ul class="mb-6 space-y-4">
                    @foreach($post->comments as $comment)
                        <li class="p-3 border rounded bg-gray-50 dark:bg-gray-900">
                            <p class="text-sm text-gray-700 dark:text-gray-300">{{ $comment->content }}</p>
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">By {{ $comment->user->name ?? 'Anonymous' }} on {{ $comment->created_at->format('M d, Y H:i') }}</p>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="mb-6 text-gray-500 dark:text-gray-400">No comments yet.</p>
            @endif

            {{-- Comment Form --}}
            @auth
                <form action="{{ route('comments.store', $post) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Add a comment:</label>
                        <textarea name="content" id="content" rows="4" required
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Post Comment</button>
                </form>
            @else
                <p class="text-gray-500 dark:text-gray-400">Please <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">login</a> to comment.</p>
            @endauth
        </section>
    </div>
</x-app-layout>
