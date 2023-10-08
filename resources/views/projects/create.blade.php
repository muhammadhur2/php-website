<x-app>


<h1>Add New Project</h1>

<form action="{{ route('projects.store') }}" method="POST">
    @csrf

    <label for="title">Title:</label>
    <input type="text" name="title" value="{{ old('title') }}">
    @error('title') <span>{{ $message }}</span> @enderror

    <label for="inp_name">InP Name:</label>
    <input type="text" name="inp_name" value="{{ old('inp_name') }}">
    @error('inp_name') <span>{{ $message }}</span> @enderror

    <label for="inp_email">InP Email:</label>
    <input type="email" name="inp_email" value="{{ old('inp_email') }}">
    @error('inp_email') <span>{{ $message }}</span> @enderror

    <label for="description">Description:</label>
    <textarea name="description">{{ old('description') }}</textarea>
    @error('description') <span>{{ $message }}</span> @enderror

    <label for="students_needed">Number of Students:</label>
    <input type="number" name="students_needed" min="3" max="6" value="{{ old('students_needed') }}">
    @error('students_needed') <span>{{ $message }}</span> @enderror

    <label for="trimester">Trimester:</label>
    <select name="trimester">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
    @error('trimester') <span>{{ $message }}</span> @enderror

    <label for="year">Year:</label>
    <input type="number" name="year" value="{{ old('year', date('Y')) }}">
    @error('year') <span>{{ $message }}</span> @enderror

    <input type="submit" value="Add Project">
</form>

</x-app>