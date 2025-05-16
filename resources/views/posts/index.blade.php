<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('All Posts') }}
        </h2>
    </x-slot>

    <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-4 font-medium text-green-600">
                {{ session('success') }}
            </div>
        @endif

        @hasanyrole('admin|editor')
            <div class="mb-4">
                <a href="{{ route('posts.create') }}" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Create New Post</a>
            </div>
        @endhasanyrole

        @if($posts->count())
            <div class="overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">Title</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">Author</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">Created At</th>
                            @hasanyrole('admin|editor')
                                <th class="px-6 py-3"></th>
                            @endhasanyrole
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                        @foreach($posts as $post)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('posts.show', $post) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400">
                                        {{ $post->title }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $post->user->name ?? 'Unknown' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $post->created_at->format('M d, Y') }}</td>
                                @hasanyrole('admin|editor')
                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <a href="{{ route('posts.edit', $post) }}" class="mr-4 text-yellow-600 hover:text-yellow-900">Edit</a>
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    </td>
                                @endhasanyrole
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        @else
            <p>No posts found.</p>
        @endif
    </div>
</x-app-layout>
