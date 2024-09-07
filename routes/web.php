<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\TeacherAuthController;
use App\Http\Controllers\CoordinatorAuthController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\CoordinateurController;

use App\Http\Controllers\ModuleController;
//route de page
Route::get('/', function () {
    return view('accueil');
});
Route::get('/student-log', function () {
    return view('eleve_log');
});
Route::get('/parent-log', function () {
    return view('parent_log');
});
Route::get('/master-log', function () {
    return view('master_log');
});
Route::get('/coordinator-log', function () {
    return view('coord_log');
});
Route::get('/coordinator-interface/{classId?}', [CoordinateurController::class, 'showInterface'])->name('coord-inter');



Route::get('/student-interface', function () {
    return view('eleve_interface');
})->name('student-inter');

Route::get('/teacher-interface', function () {
    return view('prof_interface');
})->name('teacher-inter');

Route::get('/emplois-du-temps/create', [SeanceController::class, 'create'])->name('schedule.create');

Route::get('/parents/create', [ParentController::class, 'create'])->name('parents.create');

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

Route::get('/modules/create', [ModuleController::class, 'create'])->name('modules.create');

Route::get('/teacher-presence', function () {
    return view('presence_prof');
});

////////////////////////////////////////////////////////////route de fonction



Route::get('/eleve_interface', [StudentAuthController::class, 'show'])->name('eleve_interface.show');



Route::post('/parents', [ParentController::class, 'store'])->name('parents.store');

Route::post('/students', [StudentController::class, 'store'])->name('students.store');

Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/api/parents', [ParentController::class, 'index'])->name('parents.index');

Route::get('/api/classes', [ClasseController::class, 'index'])->name('classes.index');

// Afficher le formulaire de connexion
Route::get('/student-login', [StudentAuthController::class, 'showLoginForm'])->name('student.login.form');

// Traiter la connexion
Route::post('/student-login', [StudentAuthController::class, 'login'])->name('student.login');

// Afficher le formulaire de connexion des enseignants
Route::get('/teacher/login', [TeacherAuthController::class, 'showLoginForm'])->name('teacher-login');

// Traiter la connexion des enseignants
Route::post('/teacher/login', [TeacherAuthController::class, 'login'])->name('teacher-login.post');

// Afficher l'interface de l'enseignant
Route::get('/teacher/interface', [TeacherAuthController::class, 'show'])->name('teacher-interface.show');

// Afficher le formulaire de connexion des coordinateurs
Route::get('/coordinator-login', [CoordinatorAuthController::class, 'showLoginForm'])->name('coordinator.login.form');

// Traiter la connexion des coordinateurs
Route::post('/coordinator-login', [CoordinatorAuthController::class, 'login'])->name('coordinator.login');

Route::post('/modules', [ModuleController::class, 'store'])->name('modules.store');

Route::post('/emplois-du-temps', [SeanceController::class, 'store'])->name('schedule.store');

Route::get('/coordinateur/timetable/{classId}', [CoordinateurController::class, 'showTimetable'])->name('coordinateur.timetable.show');
