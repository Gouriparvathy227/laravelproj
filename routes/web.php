<?php

use App\Http\Controllers\AcademicsController;
use App\Http\Controllers\Admin\AdmissionController as AdminAdmissionController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DepartmentController as AdminDepartmentController;
use App\Http\Controllers\Admin\FacultyController as AdminFacultyController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\NoticeController as AdminNoticeController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Faculty\DashboardController as FacultyDashboardController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PlacementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/history', [PageController::class, 'history'])->name('history');
Route::get('/facilities', [PageController::class, 'facilities'])->name('facilities');
Route::view('/student-life', 'student-life')->name('student-life');

Route::get('/academics', [AcademicsController::class, 'index'])->name('academics.index');
Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('/departments/{id}', [DepartmentController::class, 'show'])->name('departments.show');
Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/admissions', [AdmissionController::class, 'index'])->name('admissions.index');
Route::get('/admissions/apply', [AdmissionController::class, 'create'])->name('admissions.apply');
Route::post('/admissions/apply', [AdmissionController::class, 'store'])->name('admissions.store');
Route::get('/admissions/status/{id?}', [AdmissionController::class, 'status'])->name('admissions.status');
Route::get('/placements', [PlacementController::class, 'index'])->name('placements.index');
Route::get('/notices', [NoticeController::class, 'index'])->name('notices.index');
Route::get('/notices/{slug}', [NoticeController::class, 'view'])->name('notices.view');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty.index');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $user = request()->user();

        return match ($user?->role) {
            'super_admin', 'dept_admin' => redirect()->route('admin.dashboard'),
            'faculty' => redirect()->route('faculty.dashboard'),
            'student' => redirect()->route('student.dashboard'),
            default => redirect()->route('home'),
        };
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:super_admin,dept_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/departments', [AdminDepartmentController::class, 'index'])->name('departments.index');
    Route::post('/departments', [AdminDepartmentController::class, 'store'])->name('departments.store');
    Route::patch('/departments/{department}', [AdminDepartmentController::class, 'update'])->name('departments.update');
    Route::delete('/departments/{department}', [AdminDepartmentController::class, 'destroy'])->name('departments.destroy');

    Route::get('/faculty', [AdminFacultyController::class, 'index'])->name('faculty.index');
    Route::post('/faculty', [AdminFacultyController::class, 'store'])->name('faculty.store');
    Route::patch('/faculty/{faculty}', [AdminFacultyController::class, 'update'])->name('faculty.update');
    Route::delete('/faculty/{faculty}', [AdminFacultyController::class, 'destroy'])->name('faculty.destroy');

    Route::get('/inquiries', [AdminInquiryController::class, 'index'])->name('inquiries.index');
    Route::delete('/inquiries/{inquiry}', [AdminInquiryController::class, 'destroy'])->name('inquiries.destroy');

    Route::get('/admissions', [AdminAdmissionController::class, 'index'])->name('admissions.index');
    Route::patch('/admissions/{application}', [AdminAdmissionController::class, 'updateStatus'])->name('admissions.update');

    Route::get('/notices', [AdminNoticeController::class, 'index'])->name('notices.index');
    Route::post('/notices', [AdminNoticeController::class, 'store'])->name('notices.store');
    Route::patch('/notices/{notice}', [AdminNoticeController::class, 'update'])->name('notices.update');
    Route::delete('/notices/{notice}', [AdminNoticeController::class, 'destroy'])->name('notices.destroy');
});

Route::middleware(['auth', 'role:faculty'])->prefix('faculty')->name('faculty.')->group(function () {
    Route::get('/dashboard', [FacultyDashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
