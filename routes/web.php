<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\FrontendController;

// use app\Http\Controllers\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('index',function(){
return view('frontend.index');
});
// Language routes 
Route::get('setlocale/{locale}', [LanguageController::class,'setLocale'])->name('setlocale');
Route::get('language-change', [LanguageController::class, 'changeLanguage'])->name('changeLanguage');


Route::get('/s',[FrontendController::class,'index'])->name('fs');

// dashbord 
// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

 //index pege of dashbord
 Route::get('/dashboard',[WebsiteController::class,'Dashbord'])->name('dashboard')->middleware('auth');

// admin dashbors
Route::middleware('auth')->prefix('dashboard')->group(function () {
    
    //admin controller
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   
    // website setup routes
    Route::get('/faculty',[WebsiteController::class,'edit'])->name('faculty');
    Route::post('/faculty/update',[WebsiteController::class,'update'])->name('faculty.update');
    Route::get('/website',[WebsiteController::class,'index'])->name('website');
    Route::post('/website/update',[WebsiteController::class,'store'])->name('website.update');

    // Department Controller
    Route::get('/department',[DepartmentController::class,'index'])->name('department.index');
    Route::get('/department/create',[DepartmentController::class,'create'])->name('department.create');
    Route::post('/department/store',[DepartmentController::class,'store'])->name('department.store');
    Route::get('/department/show/{id}',[DepartmentController::class,'show'])->name('department.show');
    Route::get('/department/edit/{id}',[DepartmentController::class,'edit'])->name('department.edit');
    Route::post('/department/update',[DepartmentController::class,'update'])->name('department.update');
    Route::get('/department/delete/{id}',[DepartmentController::class,'destroy'])->name('department.destroy');

    // Teacher Controller
    Route::get('/teacher',[TeacherController::class,'index'])->name('teacher.index');
    Route::get('/teacher/create/{id}',[TeacherController::class,'create'])->name('teacher.create');
    Route::post('/teacher/store',[TeacherController::class,'store'])->name('teacher.store');
    Route::get('/teacher/show/{id}',[TeacherController::class,'show'])->name('teacher.show');
    Route::get('/teacher/edit/{id}',[TeacherController::class,'edit'])->name('teacher.edit');
    Route::post('/teacher/update/',[TeacherController::class,'update'])->name('teacher.update');
    Route::get('/teacher/delete/{id}',[TeacherController::class,'destroy'])->name('teacher.destroy');


});

// Supperadmin middleware
Route::middleware('superadmin')->prefix('dashboard')->group(function () {
    Route::get('/Users',[ProfileController::class,'UsersList'])->name('Users-list');
    Route::get('/user/{id}',[ProfileController::class,'UserDelete'])->name('User-delete');

    // Route::get('/user/edit/{id}',[ProfileController::class,'UserEdit'])->name('User-edit');
    // Route::post('/user/update',[ProfileController::class,'UserUpdate'])->name('User-update');


});

require __DIR__.'/auth.php';
