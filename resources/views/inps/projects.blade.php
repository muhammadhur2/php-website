<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Projects by {{ $inp->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">Title</th>
                                <th class="border px-4 py-2">Description</th>
                                <th class="border px-4 py-2">Trimester</th>
                                <th class="border px-4 py-2">Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td class="border px-4 py-2">{{ $project->title }}</td>
                                    <td class="border px-4 py-2">{{ $project->description }}</td>
                                    <td class="border px-4 py-2">{{ $project->trimester }}</td>
                                    <td class="border px-4 py-2">{{ $project->year }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
