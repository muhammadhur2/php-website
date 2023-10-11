<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Role;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $roles = Role::all();
        return view('profile.edit', [
            'user' => $request->user(),
            'roles' => $roles,
        ]);
    }
    
    public function viewStudentProfiles()
{
    // Fetch all users who are not teachers
    $students = User::where('is_teacher', 0)->get();

    return view('student-profiles', compact('students'));
}

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->validate([
            'gpa' => 'required|between:0,7',
            'roles' => 'required|array',
        ]);
    
        $user = auth()->user();
        $user->gpa = $request->input('gpa');
        $user->save();
    
        // Sync the roles (attach, detach or update as needed)
        $user->roles()->sync($request->input('roles'));

        $request->user()->save();
    
        return redirect()->route('profile.show')->with(['status' => 'profile-updated', 'message' => 'Profile updated successfully!']);

        
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function showDashboard()
{
    if(Auth::user()->is_business) {
        return view('dashboard_business');
    }
    elseif(Auth::user()->is_teacher){
        return view('dashboard_teacher');
    }
    $inps = User::where('is_business', true)->paginate(5);
    return view('dashboard_student', compact('inps'));
}



public function show()
{
    $roles = Role::all();
    $user = auth()->user();
    return view('profile.edit', compact('user', 'roles'));
}



}
