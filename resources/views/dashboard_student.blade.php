<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All INPs
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-6">
                <div class="text-gray-900">
                    <table class="w-full bg-white border rounded">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm border-b">INP Name</th>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm border-b">Email</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($inps as $inp)
                                <tr>
                                    <td class="w-1/3 text-left py-3 px-4 border-b">{{ $inp->name }}</td>
                                    <td class="w-1/3 text-left py-3 px-4 border-b">{{ $inp->email }}</td>
                                    <td class="text-left py-3 px-4 border-b">
                                        <a href="{{ route('inps.details', $inp->id) }}" class="text-blue-500">View Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $inps->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
