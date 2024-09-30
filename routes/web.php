<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Thesis; // Import the Thesis model

Route::get('/', function () {
    $thesis = Thesis::all(); // Fetch all thesis records from the database
    return view('welcome', compact('thesis')); // Pass the thesis data to the view
});
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changepassword'])->name('profile.change-password');
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
    Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
    Route::get('/thesis', [App\Http\Controllers\HomeController::class, 'thesis'])->name('thesis');

    Route::get('/admin/archive', [App\Http\Controllers\AdminController::class, 'archive'])->name('admin.archive')->middleware('admin');
    Route::get('/admin/courses', [App\Http\Controllers\AdminController::class, 'courses'])->name('admin.courses')->middleware('admin');
    Route::get('/admin/pending', [App\Http\Controllers\AdminController::class, 'pending'])->name('admin.pending')->middleware('admin');


    Route::post('/admin/courses', [App\Http\Controllers\CourseController::class, 'store'])->name('courses.store')->middleware('admin');
    Route::get('/admin/courses', [App\Http\Controllers\CourseController::class, 'index'])->name('courses.index')->middleware('admin');
    Route::put('/admin/courses/{id}', [App\Http\Controllers\CourseController::class, 'update'])->name('courses.update')->middleware('admin');
    Route::delete('/admin/courses/{course}', [App\Http\Controllers\CourseController::class, 'destroy'])->name('courses.destroy')->middleware('admin');

    Route::get('/thesis', [App\Http\Controllers\ThesisController::class, 'index'])->name('thesis.index');
    Route::post('/thesis', [App\Http\Controllers\ThesisController::class, 'store'])->name('thesis.store');
    Route::put('/thesis/{id}', [App\Http\Controllers\ThesisController::class, 'update'])->name('thesis.update');
    Route::delete('/thesis/{thesis}', [App\Http\Controllers\ThesisController::class, 'destroy'])->name('thesis.destroy');

    Route::post('/thesis/update-status', [App\Http\Controllers\ThesisController::class, 'updateStatus'])->name('thesis.updateStatus');


    Route::get('/students', [App\Http\Controllers\AdminController::class, 'index'])->name('students.index')->middleware('admin');
    Route::get('/students/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('students.edit')->middleware('admin');
    Route::put('/students/update/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('students.update')->middleware('admin');
    Route::delete('/students/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('students.delete')->middleware('admin');
});
