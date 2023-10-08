<x-app>

    <h1 class="text-2xl font-bold mb-6">Edit Project: {{ $project->title }}</h1>

    <form action="{{ route('projects.update', $project) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="flex flex-col space-y-2">
            <label for="title" class="block mb-2">Title:</label>
            <input type="text" name="title" value="{{ old('title', $project->title) }}" class="border rounded w-full py-2 px-3">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col space-y-2">
            <label for="inp_name" class="block mb-2">InP Name:</label>
            <input type="text" name="inp_name" value="{{ old('inp_name', $project->inp_name) }}" class="border rounded w-full py-2 px-3">
            @error('inp_name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col space-y-2">
            <label for="inp_email" class="block mb-2">InP Email:</label>
            <input type="email" name="inp_email" value="{{ old('inp_email', $project->inp_email) }}" class="border rounded w-full py-2 px-3">
            @error('inp_email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col space-y-2">
            <label for="description" class="block mb-2">Description:</label>
            <textarea name="description" class="border rounded w-full py-2 px-3">{{ old('description', $project->description) }}</textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col space-y-2">
            <label for="students_needed" class="block mb-2">Number of Students:</label>
            <input type="number" name="students_needed" min="3" max="6" value="{{ old('students_needed', $project->students_needed) }}" class="border rounded w-full py-2 px-3">
            @error('students_needed') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col space-y-2">
            <label for="trimester" class="block mb-2">Trimester:</label>
            <select name="trimester" class="border rounded w-full py-2 px-3">
                @for ($i = 1; $i <= 3; $i++)
                    <option value="{{ $i }}" @if(old('trimester', $project->trimester) == $i) selected @endif>{{ $i }}</option>
                @endfor
            </select>
            @error('trimester') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col space-y-2">
            <label for="year" class="block mb-2">Year:</label>
            <input type="number" name="year" value="{{ old('year', $project->year) }}" class="border rounded w-full py-2 px-3">
            @error('year') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-blue font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Update Project
        </button>
    </div>

    </form>

</x-app>
