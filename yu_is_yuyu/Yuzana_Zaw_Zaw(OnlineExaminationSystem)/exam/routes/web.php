<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\MultipleChoiceController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[LoginController::class,'index']);
Route::post('userLoginAction',[LoginController::class,'loginAction']);
Route::get('/userRegister',[RegistrationController::class,'index']);
Route::post('userRegisterAction',[RegistrationController::class,'userRegister']);

//==============================for admin=================================
Route::get('/adminHome', function () {
    return view('adminhome');
});

Route::get('/adminexam',[ExamController::class,'examList']);
Route::post('adminexam',[ExamController::class,'createExam']);

Route::get('/deleteExam/{exam_id}',[ExamController::class,'deleteExam']);
Route::get('/updateExam/{exam_id}',[ExamController::class,'firstLoadUpdateView']);
Route::post('updateExam',[ExamController::class,'updateExam']);
Route::get('/detailsExam/{exam_id}',[ExamController::class,'firstLoadExamDetailsView']);

Route::post('/detailsExam/adminQuestion',[QuestionController::class,'createQuestion']);
Route::get('/detailsExam/deleteQuestion/{question_id}',[QuestionController::class,'deleteQuestion']);
Route::get('/detailsExam/updateQuestion/{question_id}',[QuestionController::class,'firstLoadQuestionView']);
Route::post('/detailsExam/updateQuestion',[QuestionController::class,'updateQuestion']);
Route::get('/detailsExam/detailsQuestion/{question_id}',[QuestionController::class,'firstLoadQuestionDetailsView']);

Route::post('/detailsExam/detailsQuestion/adminChoices',[MultipleChoiceController::class,'createChoice']);
Route::get('/detailsExam/detailsQuestion/deleteChoice/{choice_id}',[MultipleChoiceController::class,'deleteChoice']);
Route::get('/detailsExam/detailsQuestion/updateChoice/{choice_id}',[MultipleChoiceController::class,'firstLoadChoiceView']);
Route::post('/detailsExam/detailsQuestion/updateChoice',[MultipleChoiceController::class,'updateChoice']);

//==============================for user=================================
Route::get('/userHome', function () {
    return view('userhome');
});
Route::get('/viewProfile',[UserController::class,'viewProfile']);

Route::get('/userexam',[ExamController::class,'allExamList']);
Route::get('/userexam/viewExam/{exam_id}',[ExamController::class,'viewExamByUser']);
Route::post('/userexam/viewExam/{exam_id}/takeExam',[ExamController::class,'takeExam']);


