<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Profile
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if(session('message'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        <strong>Success:</strong> {{ session('message') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf

                        <!-- GPA -->
                        <div class="mb-4">
                            <label for="gpa" class="block text-sm font-medium text-gray-700">GPA:</label>
                            <input type="number" step="0.1" min="0" max="7" name="gpa" id="gpa" value="{{ old('gpa', $user->gpa) }}" class="mt-1 block w-full rounded-md shadow-sm">
                        </div>

                        <!-- Roles -->
                        <div class="mb-4">
                            <span class="block text-sm font-medium text-gray-700">Roles:</span>
                            @foreach($roles as $role)
                            <label class="block mt-2">
                                <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'checked' : '' }}>
                                {{ ucfirst($role->name) }}
                            </label>
                            @endforeach
                        </div>

                        <div class="mt-4">
                            <x-button>
                                Save Changes
                            </x-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
