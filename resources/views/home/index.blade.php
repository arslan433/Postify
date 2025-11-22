<x-app-layout>
    <!-- Header slot (optional small heading) -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome to Postify') }}
        </h2>
    </x-slot>

    <div class="py-12 justify-items-center">
        <div class="max-w-7xl mx-3 max-sm:px-2 max-lg:px-4 ">

            <!-- 🌟 Landing Section -->
            <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-2xl shadow-lg py-16 text-center mb-16">
                <h1 class="text-5xl font-extrabold mb-4 px-4">Share Your Ideas with the World </h1>
                <p class="text-indigo-100 text-lg mb-8 max-w-2xl mx-auto">
                    Postify is a modern blogging platform built with Laravel where admins can post blogs, share insights, and inspire readers.
                </p>
                <a href="{{ route('register') }}" class="bg-white text-indigo-700 font-semibold px-6 py-3 rounded-md hover:bg-gray-100 transition">
                    Get Started
                </a>
            </section>

            <!-- 📰 Blog Posts Section -->
            <section>
                <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-8 text-center">Latest Posts</h2>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- All Posts -->
                    
                    @foreach ($posts as $post)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                        <img
                            src="/images/{{ $post->image }}"
                            alt="Blog Image"
                            class="w-full h-64 object-cover rounded-lg shadow" />
                        <div class="p-5">
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">{{ $post->title }}</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-3">
                                {{ Str::limit($post->description, 100) }}...
                            </p>
                            <div class="flex justify-between items-center text-sm text-gray-500 dark:text-gray-400">
                                <span>{{ $post->created_at->format('d M, Y') }}</span>
                                <a href="{{ route('post.detail', $post->id) }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">Read More -></a>
                            </div>
                        </div>
                    </div>

                    @endforeach


                </div>
            </section>


        </div>
    </div>
</x-app-layout>