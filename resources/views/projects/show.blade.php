<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Project: {{ $project->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Title: {{ $project->title }}</h3>
                    <p>InP Name: {{ $project->inp_name }}</p>
                    <p>Description: {{ $project->description }}</p>
                    <p>Trimester: {{ $project->trimester }}</p>
                    <p>Year: {{ $project->year }}</p>

                    @foreach($project->files as $file)
                        @if($file->file_type === 'image')
                            <img src="{{ asset('storage/' . $file->file_path) }}" alt="Project Image" class="mb-4">
                        @else
                            <a href="{{ asset('storage/' . $file->file_path) }}" download class="mb-4">Download PDF</a>
                        @endif
                    @endforeach


                    @if(!auth()->user()->is_business) <!-- Only show to students -->
                        @if(!$project->selectedStudents->contains(auth()->id()))
                            @if(auth()->user()->hasReachedProjectLimit())
                                <p>You've already applied to 3 projects.</p>
                            @else
                                <form action="{{ route('projects.select', $project) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Select me for this project</button>
                                </form>
                            @endif
                        @else
                            <p>You've been selected for this project!</p>
                        @endif
                    @endif
                    <!-- Add any other details you'd like to display here -->
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
