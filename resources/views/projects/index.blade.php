<x-app>

@section('content')
<h1>Projects</h1>

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
@endsection

</x-app>