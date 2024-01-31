<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    {{ __("Your Recipes") }}
                </div>
            </div> 
            <a href="{{ route('Dashboard.create') }}" class="float-right  mt-3 mb-4 p-2 bg-blue-500 text-white rounded hover:bg-blue-600">New Recipe</a>

            <div class=" mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($recipes as $recipe)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        @if ($recipe->image)
                            <img class="w-full h-48 object-cover" src="{{ asset($recipe->image) }}" alt="Recipe Image">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <p class="text-gray-500">No image available</p>
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="text-xl font-semibold mb-2">{{ $recipe->title }}</h3>
                            <p class="text-gray-700 dark:text-gray-300">{{ $recipe->ingredients }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $recipes->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
