<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;


class ProjectController extends Controller
{
    public function index()
{
    $projects = Project::paginate(5);
    return view('projects.index', compact('projects'));
}

public function create()
{
    return view('projects.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|min:5|unique:projects,title,NULL,id,trimester,' . $request->trimester . ',year,' . $request->year,
        'inp_name' => 'required|string|min:5',
        'inp_email' => 'required|string|email|',
        'description' => 'required|regex:/^(\w+\s?){3,}$/',
        'students_needed' => 'required|integer|min:3|max:6',
        'trimester' => 'required|integer|min:1|max:3',
        'year' => 'required|integer',
    ]);

    Project::create($validatedData);

    return redirect()->route('projects.index');
}

public function edit(Project $project)
{
    return view('projects.edit', compact('project'));
}

public function update(Request $request, Project $project)
{
    // Similar validation as store but considering unique constraints for update
    // Then, update the project with validated data.
}

public function destroy(Project $project)
{
    // Check for student applications. If none, delete, else redirect with an error.
}
    //
}
