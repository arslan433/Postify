<x-app-layout>
    <!-- Header slot -->
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 dark:text-gray-100">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-10 bg-wite dark:bg-gray800 rounded-2xl shadow-lg overflow-hidden mb-10">

        <!-- Blog Image -->
        <div class="w-full h-[450px] overflow-hidden">
            <img
                src="/images/{{ $post->image }}"
                alt="Blog Image"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
            />
        </div>

        <!-- Content -->
        <div class="p-8">
            <!-- Title -->
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 leading-snug">
                {{ $post->title }}
            </h1>

            <!-- Date -->
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                Published on: <span class="font-medium">{{ $post->created_at->format('d M, Y') }}</span>
            </p>

            <!-- Description -->
            <p class="text-gray-700 dark:text-gray-300 text-lg leading-relaxed">
                {{ $post->description }}
            </p>
        </div>
    </div>
</x-app-layout>
