<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\InpController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register webs routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\TeacherController;

Route::get('/unapproved-inps', [TeacherController::class, 'unapprovedInPs'])->name('unapproved_inps');

Route::get('/', function () {
    return view('welcome');
});
Route::post('/approve-inp/{id}', [InpController::class, 'approve'])->name('inps.approve');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//View INPs
Route::get('/inps', [InpController::class, 'index'])->name('inps.index');
Route::get('inps/{inpEmail}/projects', [InpController::class, 'projects'])->name('inps.projects');

// web.php
//...

Route::get('/dashboard', [ProfileController::class, 'showDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/inps/{inpId}', [InpController::class, 'details'])->name('inp.details');
Route::get('/projects-list', [ProjectController::class, 'projectsList'])->name('projects.list');
Route::get('/inps/{inpId}/details', [InpController::class, 'details'])->name('inps.details');








Route::post('/projects/{project}/apply', [ProjectController::class, 'apply'])->name('projects.apply');Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

    Route::resource('projects', ProjectController::class);
    Route::get('projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::post('/projects/{project}/select', [ProjectController::class, 'selectForProject'])->name('projects.select');

    


});

require __DIR__.'/auth.php';
