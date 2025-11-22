<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

                <!-- Back -->
                <div class="mb-4">
                    <a href="{{ route('admin.dashboard') }}" class="text-sm text-indigo-600 hover:underline">&larr; Back to Posts</a>
                </div>

                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <!-- Title -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Title</label>
                        <input
                            type="text"
                            name="title"
                            placeholder="Enter post title"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 
                                   text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500
                                    focus:ring-indigo-500"
                            required>
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Description</label>
                        <textarea
                            name="description"
                            rows="4"
                            placeholder="Write your post description..."
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 
                                   text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500
                                    focus:ring-indigo-500"
                            required></textarea>
                    </div>

                    <!-- Image -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Upload Image</label>
                        <input
                        id="image"
                            type="file"
                            name="image"
                            accept="image/*"
                            class="w-full text-sm text-gray-600 dark:text-gray-300 file:mr-4 file:py-2 file:px-4
                                   file:rounded-md file:border-0 file:font-semibold file:bg-indigo-50 file:text-indigo-700
                                   hover:file:bg-indigo-100">
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Allowed: JPG, JPEG, PNG (max 2MB)</p>
                    </div>

                  

                    <!-- Submit -->
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="px-5 py-2 bg-indigo-600 text-white rounded-md font-medium hover:bg-indigo-700 
                            transition">
                            Create Post
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


</x-app-layout>