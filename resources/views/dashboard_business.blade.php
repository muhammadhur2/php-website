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
            <h1 class="font-bold text-2xl mb-6">Project Management</h1>
          

            <x-primary-button class="ml-3" >
           <a href="{{ route('projects.index') }}" >View My Projects</a>
            </x-primary-button>

            <x-primary-button class="ml-3">
            <a href="{{ route('projects.create') }}" >Add New Project</a>
            </x-primary-button>


          
        </div>
    </div>
</x-app-layout>
