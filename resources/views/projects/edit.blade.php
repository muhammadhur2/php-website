<x-app>

@section('content')
<h1>Edit Project: {{ $project->title }}</h1>

<form action="{{ route('projects.update', $project) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- The form fields here will be similar to the create view, but with value attributes set to the current project's attributes. For example: -->
    <input type="text" name="title" value="{{ old('title', $project->title) }}">

    <!-- ... rest of the form fields ... -->

    <input type="submit" value="Update Project">
</form>
@endsection

</x-app>