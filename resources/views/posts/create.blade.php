<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create New Post') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl py-6 mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('posts.store') }}" method="POST" class="p-6 bg-white shadow dark:bg-gray-800 sm:rounded-lg">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="body" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content</label>
                <textarea name="body" id="body" rows="8" required
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500">{{ old('body') }}</textarea>
                @error('body')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700">Publish Post</button>
        </form>
    </div>
</x-app-layout>
