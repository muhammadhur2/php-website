<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Business Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white text-gray-900">
                    {{ __("You're logged in as a Business!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-bold text-2xl mb-6">Project Management</h2>
            <a href="{{ route('projects.index') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-black font-bold py-2 px-4 rounded-lg mb-2 mr-2">View My Projects</a>
            <a href="{{ route('projects.create') }}" class="inline-block bg-green-500 hover:bg-green-600 text-black font-bold py-2 px-4 rounded-lg mb-2">Add New Project</a>
        </div>
    </div>
</x-app-layout>
