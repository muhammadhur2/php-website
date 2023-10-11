<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TeacherController extends Controller
{
    public function unapprovedInPs()
    {
        // Ensure the logged-in user is a teacher
        if (!auth()->user() || !auth()->user()->is_teacher) {
            return redirect('/')->with('error', 'Access Denied.');
        }

        // Fetch unapproved InPs
        $unapprovedInPs = User::where('is_business', true)->where('is_approved', false)->get();

        return view('unapproved_inps', ['inps' => $unapprovedInPs]);
    }
}
