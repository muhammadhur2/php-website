<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Projects
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                          <strong>Error:</strong> <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    @if (session('message'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                            <strong>Success:</strong> <span class="block sm:inline">{{ session('message') }}</span>
                        </div>
                    @endif

                    <table class="w-full bg-white border rounded-lg">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm border-b border-gray-200">Title</th>
                                <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm border-b border-gray-200">InP Name</th>
                                <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm border-b border-gray-200">Description</th>
                                <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm border-b border-gray-200">Trimester</th>
                                <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm border-b border-gray-200">Year</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm border-b border-gray-200">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($projects as $project)
                                <tr>
                                    <td class="w-1/6 text-left py-3 px-4 border-b border-gray-200"><a href="{{ route('projects.show', $project) }}" class="text-blue-500">{{ $project->title }}</a></td>
                                    <td class="w-1/6 text-left py-3 px-4 border-b border-gray-200">{{ $project->inp_name }}</td>
                                    <td class="w-1/6 text-left py-3 px-4 border-b border-gray-200">{{ $project->description }}</td>
                                    <td class="w-1/6 text-left py-3 px-4 border-b border-gray-200">{{ $project->trimester }}</td>
                                    <td class="w-1/6 text-left py-3 px-4 border-b border-gray-200">{{ $project->year }}</td>
                                    <td class="text-left py-3 px-4 border-b border-gray-200">
                                        <a href="{{ route('projects.edit', $project) }}" class="text-blue-500">Edit</a> |
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-8">
                        {{ $projects->links() }}

                        <a href="{{ route('projects.create') }}" class="inline-block bg-green-500 hover:bg-green-600 text-black font-bold py-2 px-4 rounded-lg mt-4">Add New Project</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
