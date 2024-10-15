<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TestController;

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

Route::resource('tests', TestController::class);
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return view('main');
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard-student', [TestController::class, 'index'])->name('dashboard.student');
    
    Route::get('/dashboard-teacher', [TestController::class, 'indexByTeacher'])->name('dashboard.teacher');
    Route::get('/tests/{id}/edit', [TestController::class, 'edit'])->name('tests.edit');
    Route::get('/tests/{id}/questions', [TestController::class, 'showQuestions'])->name('tests.questions');
    Route::get('/tests/{id}/student-result', [TestController::class, 'showStudentResult'])->name('tests.studentresult');
    
    Route::get('/tests/{id}/questions/create-question', [TestController::class, 'createquestion'])->name('tests.createquestion');
    Route::post('/tests/store-question', [TestController::class, 'storeQuestion'])->name('tests.storeQuestion');
    Route::delete('/tests/{test_id}/questions/{id}', [TestController::class, 'destroyQuestion'])->name('questions.destroy');


    Route::get('/tests/{id}/questions/{question_id}/answer', [TestController::class, 'showAnswer'])->name('questions.answer');
    Route::get('/tests/{id}/questions/{question_id}/create-answer', [TestController::class, 'createAnswer'])->name('answer.createAnswer');
    Route::post('/tests/store-answer', [TestController::class, 'storeAnswer'])->name('answer.storeAnswer');
    Route::delete('/tests/{id}/questions/{question_id}/answer/{answer_id}', [TestController::class, 'destroyAnswer'])->name('answer.destroy');

    Route::get('/dashboard-student/{id}', [TestController::class, 'showTestQuestions'])->name('student.tests');
});

Route::get('/create-account', function () {
    return view('createAccount');
});
Route::get('/login-account', function () {
    return view('loginAccount');
});



