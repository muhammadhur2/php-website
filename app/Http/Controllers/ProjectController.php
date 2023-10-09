<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

public function myProjects()
{
    $loggedInEmail = Auth::user()->email;
    $projects = Project::where('inp_email', $loggedInEmail)->get();
    return view('dashboard_business', compact('projects'));
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
    $validatedData['inp_email'] = auth()->user()->email;

    $project = Project::create($validatedData);

    // Handle file uploads
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('project-images', 'public');
            $project->files()->create(['file_path' => $path, 'file_type' => 'image']);
        }
    }

    if ($request->hasFile('pdfs')) {
        foreach ($request->file('pdfs') as $pdf) {
            $path = $pdf->store('project-pdfs', 'public');
            $project->files()->create(['file_path' => $path, 'file_type' => 'pdf']);
        }
    }

    return redirect()->route('projects.index');

}

public function edit(Project $project)
{
    // Check if the authenticated user's email matches the project's inp_email
    if ($project->inp_email != auth()->user()->email) {
        return redirect()->route('projects.index')->with('error', 'You do not have permission to edit this project.');
    }

    return view('projects.edit', compact('project'));
}

public function update(Request $request, Project $project)
{
    // Check if the authenticated user's email matches the project's inp_email
    if ($project->inp_email != auth()->user()->email) {
        return redirect()->route('projects.index')->with('error', 'You do not have permission to update this project.');
    }

    $validatedData = $request->validate([
        'title' => 'required|string|min:5|unique:projects,title,' . $project->id . ',id,trimester,' . $request->trimester . ',year,' . $request->year,
        'inp_name' => 'required|string|min:5',
        'inp_email' => 'required|string|email',
        'description' => 'required|regex:/^(\w+\s?){3,}$/',
        'students_needed' => 'required|integer|min:3|max:6',
        'trimester' => 'required|integer|min:1|max:3',
        'year' => 'required|integer',
    ]);

    $project->update($validatedData);

    return redirect()->route('projects.index')->with('message', 'Project updated successfully!');
}


public function destroy(Project $project)
{
    // Check if the authenticated user's email matches the project's inp_email
    if ($project->inp_email != auth()->user()->email) {
        return redirect()->route('projects.index')->with('error', 'You do not have permission to delete this project.');
    }

    // Assuming you have a related model for student applications named "Application"
    // $applications = $project->applications;
    // if (!$applications->isEmpty()) {
    //     return redirect()->route('projects.index')->with('error', 'Cannot delete project with existing student applications.');
    // }

    $project->delete();

    return redirect()->route('projects.index')->with('message', 'Project deleted successfully!');
}


// ... existing code ...

public function show(Project $project)
{
    return view('projects.show', compact('project'));
}

public function listGroupedByYearAndTrimester()
{
    $projectsGrouped = Project::orderBy('year', 'desc')->orderBy('trimester', 'desc')
                             ->get()
                             ->groupBy(['year', 'trimester']);
    return view('projects.listGrouped', compact('projectsGrouped'));
}
// ProjectController.php

public function projectsList()
{
    $projects = Project::orderBy('year', 'desc')->orderBy('trimester', 'desc')->get()->groupBy(['year', 'trimester']);
    return view('projectsList', compact('projects'));
}


public function selectForProject(Project $project) {
    if(auth()->user()->hasReachedProjectLimit()) {
        return back()->with('error', 'You have already applied to 3 projects!');
    }

    $project->selectedStudents()->attach(auth()->id());

    return back()->with('message', 'You have been selected for this project!');
}


public function showDashboard()
{
    if(Auth::user()->is_business) {
        // Retrieve the email of the currently logged in business/user
        $loggedInEmail = Auth::user()->email;
        // Query only the projects that match the logged-in business/user's email
        $projects = Project::where('inp_email', $loggedInEmail)->get();

        return view('dashboard_business', compact('projects'));
    }

    $inps = User::where('is_business', true)->paginate(5);
    return view('dashboard_student', compact('inps'));
}



}

