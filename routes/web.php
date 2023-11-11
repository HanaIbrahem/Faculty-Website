<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ReserrchController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdmissionController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('index');


// Language routes 
Route::get('setlocale/{locale}', [LanguageController::class,'setLocale'])->name('setlocale');
Route::get('language-change', [LanguageController::class, 'changeLanguage'])->name('changeLanguage');


// Route::get('/s',[FrontendController::class,'index'])->name('fs');

// dashbord 
// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

 //index pege of dashbord
 Route::get('/dashboard',[WebsiteController::class,'Dashbord'])->name('dashboard')->middleware('auth');

// admin dashbors
Route::middleware('auth')->prefix('dashboard')->group(function () {
    
    //admin controller   contactdelete
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // website setup routes
    
    Route::get('/contact/{id}',[WebsiteController::class,'contactdelete'])->name('contact.destroy');

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
    Route::get('/teacher/pin/{id}',[TeacherController::class,'pin'])->name('teacher.pin');

    Route::post('/teacher/store',[TeacherController::class,'store'])->name('teacher.store');
    Route::get('/teacher/show/{id}',[TeacherController::class,'show'])->name('teacher.show');
    Route::get('/teacher/edit/{id}',[TeacherController::class,'edit'])->name('teacher.edit');
    Route::post('/teacher/update/',[TeacherController::class,'update'])->name('teacher.update');
    Route::get('/teacher/delete/{id}',[TeacherController::class,'destroy'])->name('teacher.destroy');

    // research Controller

    Route::get('research',[ReserrchController::class,'index'])->name('research.index');
    Route::get('research/creat',[ReserrchController::class,'create'])->name('research.create');
    Route::post('research/store',[ReserrchController::class,'store'])->name('research.store');
    Route::get('research/show/{id}',[ReserrchController::class,'show'])->name('research.show');

    Route::get('research/edit/{id}',[ReserrchController::class,'edit'])->name('research.edit');
    Route::get('research/delete/{id}',[ReserrchController::class,'destroy'])->name('research.destroy');
    Route::get('/download/{filename}', [ReserrchController::class,'download'])->name('research.download');
    Route::post('research/update',[ReserrchController::class,'update'])->name('research.update');

    //course controllers
    Route::get('course',[CourseController::class,'index'])->name('course.index');
    Route::get('course/show/{id}',[CourseController::class,'show'])->name('course.show');
    Route::get('course/{id}',[CourseController::class,'create'])->name('course.create');
    Route::post('course/store',[CourseController::class,'store'])->name('course.store');
    Route::get('course/edit/{id}',[CourseController::class,'edit'])->name('course.edit');
    Route::post('course/update',[CourseController::class,'update'])->name('course.update');
    Route::get('course/destroy/{id}',[CourseController::class,'destroy'])->name('course.destroy');

    //stuff Controller
    Route::get('staff',[StaffController::class,'index'])->name('staff.index');
    Route::get('staff/show/{id}',[StaffController::class,'show'])->name('staff.show');
    Route::get('staff/pin/{id}',[StaffController::class,'pin'])->name('staff.pin');
    Route::post('staff/store',[StaffController::class,'store'])->name('staff.store');
    Route::get('staff/edit/{id}',[StaffController::class,'edit'])->name('staff.edit');
    Route::post('staff/update',[StaffController::class,'update'])->name('staff.update');
    Route::get('staff/destroy/{id}',[StaffController::class,'destroy'])->name('staff.destroy');
    // Activity Controller 

    Route::get('activity',[ActivityController::class,'index'])->name('activity.index');
    Route::get('activity/create',[ActivityController::class,'create'])->name('activity.create');
    Route::post('activity/store',[ActivityController::class,'store'])->name('activity.store');
    Route::get('activity/show/{id}',[ActivityController::class,'show'])->name('activity.show');
    Route::get('activity/edit/{id}',[ActivityController::class,'edit'])->name('activity.edit');
    Route::post('activity/update',[ActivityController::class,'update'])->name('activity.update');
    Route::get('activity/destroy/{id}',[ActivityController::class,'destroy'])->name('activity.destroy');
    
    Route::get('admission',[AdmissionController::class,'index'])->name('admission.index');
    Route::get('admission/create',[AdmissionController::class,'create'])->name('admission.create');
    Route::get('admission/show/{id}',[AdmissionController::class,'show'])->name('admission.show');

    Route::post('admission/store',[AdmissionController::class,'store'])->name('admission.store');
    Route::get('admission/edit/{id}',[AdmissionController::class,'edit'])->name('admission.edit');
    Route::post('admission/update',[AdmissionController::class,'update'])->name('admission.update');
    Route::get('admission/destroy/{id}',[AdmissionController::class,'destroy'])->name('admission.destroy');

});

// Supperadmin middleware
Route::middleware('superadmin')->prefix('dashboard')->group(function () {
    Route::get('/Users',[ProfileController::class,'UsersList'])->name('Users-list');
    Route::get('/user/{id}',[ProfileController::class,'UserDelete'])->name('User-delete');
    Route::get('/user/edit/{id}',[ProfileController::class,'UserEdit'])->name('User-edit');
    Route::post('/user/update',[ProfileController::class,'UserUpdate'])->name('User-update');
    Route::post('/user/reset',[ProfileController::class,'ResetPassword'])->name('user-reset');

    Route::get('/faculty',[WebsiteController::class,'edit'])->name('faculty');
    Route::post('/faculty/update',[WebsiteController::class,'update'])->name('faculty.update');
    Route::get('/website',[WebsiteController::class,'index'])->name('website');
    Route::post('/website/update',[WebsiteController::class,'store'])->name('website.update');


});

Route::middleware('web')->group(function (){

    Route::get('/',[FrontendController::class,'index'])->name('frontend.index');
    Route::get('/department/{id}',[FrontendController::class,'department'])->name('frontend.department');
    Route::get('/department/{id}/filter-courses/{type}',[FrontendController::class,'filterCourses'])->name('frontend.department_f');
    Route::get('/research',[FrontendController::class,'research'])->name('forntend.research');
    Route::get('/research/{id}',[FrontendController::class,'research_show'])->name('forntend.research_show');
    Route::get('/research/Categorie/{id}',[FrontendController::class,'research_catygory'])->name('forntend.research_catygory');
    Route::get('/research/download/{id}',[FrontendController::class,'download'])->name('forntend.research_download');
    Route::get('/contact',[FrontendController::class,'contact'])->name('forntend.contact');
    Route::get('/activity',[FrontendController::class,'about'])->name('forntend.about');
    Route::get('/activity/show/{id}',[FrontendController::class,'show'])->name('forntend.activity');

    Route::get('/admission',[FrontendController::class,'admission'])->name('forntend.admission');
    Route::get('/admission/show/{id}',[FrontendController::class,'admission_show'])->name('forntend.admission_show');

    Route::get('/course/{id}',[FrontendController::class,'course'])->name('forntend.course');
    Route::get('/teacher/{id}',[FrontendController::class,'teacher'])->name('forntend.teacher');
    Route::post('/contact/store',[FrontendController::class,'contactstore'])->name('contact.store');

    //pagination 
    Route::get('get-more-research', [ FrontendController::class,'getMoreResearch'])->name('more-research');
    Route::get('get-more-admission', [ FrontendController::class,'getMoreAdmission'])->name('more-admission');
    Route::get('get-more-activity', [ FrontendController::class,'getMoreActivity'])->name('more-activity');
   
    Route::get('get-more-teacher', [FrontendController::class, 'getMoreTeachers'])->name('more-teacher');
    Route::get('get-more-course', [FrontendController::class, 'getMoreCourses'])->name('more-course');
});

require __DIR__.'/auth.php';
