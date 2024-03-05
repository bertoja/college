<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes([
    'register'=>false //se desahabilita para no registrarse en el sistema
]);

Route::middleware('auth')->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('user', UserController::class);
    Route::resource('teacher',TeacherController::class);
    Route::resource('student',StudentController::class);
    Route::resource('subject', SubjectController::class);
    Route::resource('course', CourseController::class);
     /* resource : crea por defecto las funciones del controlador
       Route::resource : enlaza las rutas con las funciones del controlador
    */

});


