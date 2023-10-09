@foreach($projects as $year => $trimesters)
    @foreach($trimesters as $trimester => $projectsList)
        <h2>Year: {{ $year }} | Trimester: {{ $trimester }}</h2>
        @foreach($projectsList as $project)
            <a href="{{ route('projects.show', $project->id) }}">{{ $project->title }}</a><br>
        @endforeach
    @endforeach
@endforeach
