<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Business Dashboard') }} <!-- Changed from generic "Dashboard" -->
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in as a Business!") }} <!-- Added distinction -->
                </div>
            </div>
        </div>
    </div>

    <h2>Project Management</h2>
<a href="{{ route('projects.index') }}">View My Projects</a>
<a href="{{ route('projects.create') }}">Add New Project</a>
</x-app-layout>
