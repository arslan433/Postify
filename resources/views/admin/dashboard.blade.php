<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto p-6">

        <!-- Greeting -->
        <h5 class="text-xl mb-4 text-gray-800 dark:text-gray-200">Hi Admin </h5>

        <!-- Create Post Button -->
        <div class="mb-6">
            <a href="{{ route('post.create') }}"
               class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow">
                + Create Post
            </a>
        </div>

        <!-- Posts Table -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
            <table class="w-full border-collapse">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                    <tr>
                        <th class="p-4 text-left">Image</th>
                        <th class="p-4 text-left">Title</th>
                        <th class="p-4 text-left">Date</th>
                        <th class="p-4 text-left">Actions</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700 dark:text-gray-300">

                    @foreach ($posts as $post)
                        <tr class="border-b dark:border-gray-700">

                            <!-- Image -->
                            <td class="p-4">
                                <img src="/images/{{ $post->image }}" class="w-16 h-16 object-cover rounded">
                            </td>

                            <!-- Title -->
                            <td class="p-4 font-medium">
                                {{ $post->title }}
                            </td>

                            <!-- Date -->
                            <td class="p-4">
                                {{ $post->created_at->format('d M, Y') }}
                            </td>

                            <!-- Actions -->
                            <td class="p-4 flex gap-3">

                                <!-- Edit -->
                                <a href="{{ route('post.edit', $post->id) }}"
                                   class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded">
                                    Edit
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('post.delete', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>

</x-app-layout>
