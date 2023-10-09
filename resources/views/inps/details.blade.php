<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            INP Details: {{ $inp->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">INP Information:</h3>
                    <p><strong>Name:</strong> {{ $inp->name }}</p>
                    <p><strong>Email:</strong> {{ $inp->email }}</p>

                    <h3 class="text-lg font-semibold mt-6 mb-4">Projects Offered:</h3>
                    <ul>
                        @foreach($projects as $project)
                            <li>
                                <a href="{{ route('projects.show', $project->id) }}">{{ $project->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
