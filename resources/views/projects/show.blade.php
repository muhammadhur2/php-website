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
                    <!-- Project details -->
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold mb-2">Details:</h3>
                        <p class="pl-4 mb-2"><span class="font-semibold">Title:</span> {{ $project->title }}</p>
                        <p class="pl-4 mb-2"><span class="font-semibold">InP Name:</span> {{ $project->inp_name }}</p>
                        <p class="pl-4 mb-2"><span class="font-semibold">Description:</span> {{ $project->description }}</p>
                        <p class="pl-4 mb-2"><span class="font-semibold">Trimester:</span> {{ $project->trimester }}</p>
                        <p class="pl-4"><span class="font-semibold">Year:</span> {{ $project->year }}</p>
                    </div>

                    <!-- Project files -->
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold mb-2">Files:</h3>
                        @foreach($project->files as $file)
                            <div class="pl-4 mb-4">
                                @if($file->file_type === 'image')
                                    <img src="{{ asset('storage/' . $file->file_path) }}" alt="Project Image" class="shadow rounded w-1/2 h-auto">
                                @else
                                    <a href="{{ asset('storage/' . $file->file_path) }}" download class="text-blue-500 hover:text-blue-700 hover:underline">Download PDF</a>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <!-- Project actions for students -->
                    @if(!auth()->user()->is_business)
                        @php
                            $hasApplied = $project->applications->where('student_id', auth()->id())->first();
                        @endphp
                        <div class="mb-6">
                            <h3 class="text-2xl font-bold mb-2">Actions:</h3>
                            <div class="pl-4">
                            @if(!$hasApplied)
                                @if(auth()->user()->applications->count() < 3)
                                    <form action="{{ route('projects.apply', $project) }}" method="POST">
                                        @csrf
                                        <textarea name="justification" required placeholder="Why do you want to work on this project?" class="w-full h-32 border rounded-lg mb-4"></textarea>
                                        <x-primary-button class="ml-3" type="submit" >
         Apply For This Project
            </x-primary-button>                                     </form>
                                @else
                                    <p>You've already applied to 3 projects.</p>
                                @endif
                            @else
                                <p class="font-semibold text-green-600">You've applied for this project!</p>
                            @endif
                            </div>
                        </div>
                    @endif

                    <!-- Show all the students who applied for this project -->
                    <h3 class="text-2xl font-bold mb-2">Students who applied:</h3>
                    <ul>
                        @foreach($project->applications as $application)
                            <li>
                                {{ $application->student->name }}: <br>
                                Justification: {{ $application->justification }}
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
