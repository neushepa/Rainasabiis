<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConsultSessionController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\ConsultSessionController as StudentConsultSessionController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// Start Route for Frontend View
Route::get('/', [FrontendController::class, 'index']);
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/blog', [FrontendController::class, 'blog']);
Route::get('/blog/{post:slug}', [FrontendController::class, 'post']);
Route::get('/gallery', [FrontendController::class, 'gallery']);

// Start Route for Student Profile
// Route::get('student/profile/edit/{id}', [StuProfileController::class, 'edit'])->name('student.profile.edit');
// Route::put('student/profile/update/{id}', [StuProfileController::class, 'update'])->name('student.profile.update');

// // Start Route for Student Testimoni
// Route::get('student/testimoni', [StuTestimoniController::class, 'create'])->name('student.testimoni.create');
// Route::post('student/testimoni/store', [StuTestimoniController::class, 'store'])->name('student.testimoni.store');

// also frontend, but for logeed in user and student role
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/consult', [FrontendController::class, 'consult'])->name('frontend.consult');
    Route::prefix('student')->as('student.')->group(function(){
        Route::get('consult-session', [StudentConsultSessionController::class, 'index']);
        Route::get('consult-session/history', [StudentConsultSessionController::class, 'history']);
        Route::post('consult-session', [StudentConsultSessionController::class, 'store']);
        Route::get('mentor/{mentor}', [StudentConsultSessionController::class, 'get_mentor']);
    });
});
// End Route for Frontend View

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->withoutMiddleware('role:admin');
    Route::prefix('admin/user')->group(function () {
        Route::prefix('student')->group(function () {
            Route::get('/', [StudentController::class, 'index'])->name('user.student.index');
            Route::get('/create', [StudentController::class, 'create'])->name('user.student.create');
            Route::post('/store', [StudentController::class, 'store'])->name('user.student.store');
            Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('user.student.edit');
            Route::put('/update/{id}', [StudentController::class, 'update'])->name('user.student.update');
            Route::delete('/delete/{id}', [StudentController::class, 'destroy'])->name('user.student.destroy');
        });
    });

    Route::prefix('mentor')->group(function () {
        Route::get('/dashboard', [FrontendController::class, 'consult'])->middleware('mentor')->name('mentor.dashboard');
        Route::get('/', [MentorController::class, 'index'])->name('mentor.index');
        Route::get('/create', [MentorController::class, 'create'])->name('mentor.create');
        Route::post('/store', [MentorController::class, 'store'])->name('mentor.store');
        Route::get('/edit/{id}', [MentorController::class, 'edit'])->name('mentor.edit');
        Route::put('/update/{id}', [MentorController::class, 'update'])->name('mentor.update');
        Route::delete('/delete/{id}', [MentorController::class, 'destroy'])->name('mentor.destroy');

        Route::prefix('/testimoni')->group(function () {
            Route::get('/', [TestimoniController::class, 'index'])->name('testimoni.index');
            Route::get('/create', [TestimoniController::class, 'create'])->name('testimoni.create');
            Route::post('/store', [TestimoniController::class, 'store'])->name('testimoni.store');
            Route::get('/edit/{id}', [TestimoniController::class, 'edit'])->name('testimoni.edit');
            Route::put('/update/{id}', [TestimoniController::class, 'update'])->name('testimoni.update');
            Route::delete('/delete/{id}', [TestimoniController::class, 'destroy'])->name('testimoni.destroy');
        });
    });

    Route::prefix('admin/consult-session')->withoutMiddleware('role:admin')->middleware('role:admin,mentor')->group(function () {
        Route::get('/', [ConsultSessionController::class, 'index'])->name('consult-session.index');
        Route::get('/create', [ConsultSessionController::class, 'create'])->name('consult-session.create');
        Route::post('/store', [ConsultSessionController::class, 'store'])->name('consult-session.store');
        Route::get('/edit/{id}', [ConsultSessionController::class, 'edit'])->name('consult-session.edit');
        Route::put('/update/{id}', [ConsultSessionController::class, 'update'])->name('consult-session.update');
        Route::delete('/delete/{id}', [ConsultSessionController::class, 'destroy'])->name('consult-session.destroy');
        Route::put('/save-link/{consult}', [ConsultSessionController::class, 'save_link'])->name('consult-session.save-link');
    });

    Route::resource('post', PostController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('todo', TodoController::class)->withoutMiddleware('role:admin');
    Route::resource('admin/gallery', GalleryController::class);
});

// End Route for Admin

Route::prefix('student/testimoni')->group(function () {
    Route::get('/', [TestimoniController::class, 'index'])->name('testimoni.index');
    Route::get('/create', [TestimoniController::class, 'create'])->name('testimoni.create');
    Route::post('/store', [TestimoniController::class, 'store'])->name('testimoni.store');

    // Start Route for Student Testimoni
    Route::get('/testimoni', [StuTestimoniController::class, 'create'])->name('student.testimoni.create');
    Route::post('/testimoni/store', [StuTestimoniController::class, 'store'])->name('student.testimoni.store');
});

Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
