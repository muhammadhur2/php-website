<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
class InpController extends Controller
{
    //
   // ... existing code ...

public function index()
{
    $inps = User::where('is_business', 1)->paginate(5);
    return view('inps.index', compact('inps'));
}

public function studentDashboard()
{
    $inps = User::where('is_business', true)->paginate(5);
    return view('dashboard', compact('inps'));
}
public function details($inpId)
{
    $inp = User::findOrFail($inpId);
    $projects = Project::where('inp_email', $inp->email)->get();
    return view('inps.details', compact('inp', 'projects'));

}
public function projects($inpEmail) {
    $inp = User::where('email', $inpEmail)->firstOrFail();
    $projects = Project::where('inp_email', $inpEmail)->get();

    return view('inps.projects', compact('projects', 'inp'));
}
}
