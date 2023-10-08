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
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>InP Name</th>
                                <th>Description</th>
                                <th>Trimester</th>
                                <th>Year</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->inp_name }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->trimester }}</td>
                                    <td>{{ $project->year }}</td>
                                    <td>
                                        <a href="{{ route('projects.edit', $project) }}">Edit</a> |
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $projects->links() }}  <!-- Laravel pagination links -->

                    <a href="{{ route('projects.create') }}">Add New Project</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
