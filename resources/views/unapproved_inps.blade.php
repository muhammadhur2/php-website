<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Unapproved InPs
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-gray-900">
                    <table class="w-full bg-white border rounded">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/2 text-left py-3 px-4 uppercase font-semibold text-sm border-b">INP Name</th>
                                <th class="w-1/2 text-left py-3 px-4 uppercase font-semibold text-sm border-b">Email</th>
                                <th class="w-1/2 text-left py-3 px-4 uppercase font-semibold text-sm border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @forelse($inps as $inp)
                                <tr>
                                    <td class="w-1/2 text-left py-3 px-4 border-b">{{ $inp->name }}</td>
                                    <td class="w-1/2 text-left py-3 px-4 border-b">{{ $inp->email }}</td>
                                    <td class="w-1/2 text-left py-3 px-4 border-b">
                                    <div class="flex items-center">
        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
            Button
        </button>
        <form method="POST" action="{{ route('inps.approve', $inp->id) }}">
            @csrf
            @method('POST')
            <button type="submit" class="ml-3 text-blue-500 hover:underline">Approve</button>
        </form>
    </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4">All InPs are approved!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
