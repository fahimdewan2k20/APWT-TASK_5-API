<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountantController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LectureNoteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TransactionController;


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

/** Fahim -> teacher, assignment, notice */
Route::get('/teacher/{username}/home', [TeacherController::class, 'home'])->middleware('LoggedInTeacher')->name('teacher.home');
Route::get('/teacher/{username}/courseDetails/{course_id}', [TeacherController::class, 'courseDetails'])->middleware('LoggedInTeacher')->name('teacher.courseDetails');
// profile
Route::get('/teacher/{username}/profile', [TeacherController::class, 'profile'])->middleware('LoggedInTeacher')->name('teacher.profile');
Route::post('/teacher/{username}/updateProfile', [TeacherController::class, 'updateProfile'])->middleware('LoggedInTeacher')->name('teacher.updateProfile');
Route::post('/teacher/{username}/changePassword', [TeacherController::class, 'changePassword'])->middleware('LoggedInTeacher')->name('teacher.changePassword');
// students
Route::get('/teacher/{username}/getStudents/{course_id}', [TeacherController::class, 'getAllStudents'])->middleware('LoggedInTeacher')->name('teacher.getStudents');
Route::post('/teacher/{username}/gradeUpload', [TeacherController::class, 'gradeUpload'])->middleware('LoggedInTeacher')->name('teacher.gradeUpload');
// assignments
Route::get('/teacher/{username}/assignments/{course_id}', [TeacherController::class, 'getAllAssignments'])->middleware('LoggedInTeacher')->name('teacher.assignments');
Route::post('/teacher/uploadAssignment', [AssignmentController::class, 'uploadAssignment'])->middleware('LoggedInTeacher')->name('teacher.uploadAssignment');
Route::post('/teacher/updateAssignment', [AssignmentController::class, 'updateAssignment'])->middleware('LoggedInTeacher')->name('teacher.updateAssignment');
Route::get('/teacher/deleteAssignment/{assignment_id}', [AssignmentController::class, 'deleteAssignment'])->middleware('LoggedInTeacher')->name('teacher.deleteAssignment');
// notices
Route::get('/teacher/{username}/notice/{course_id}', [TeacherController::class, 'getAllNotices'])->middleware('LoggedInTeacher')->name('teacher.notices');
Route::post('/teacher/postNotice', [NoticeController::class, 'postNotice'])->middleware('LoggedInTeacher')->name('teacher.postNotice');
Route::post('/teacher/updateNotice', [NoticeController::class, 'updateNotice'])->middleware('LoggedInTeacher')->name('teacher.updateNotice');
Route::get('/teacher/deleteNotice/{notice_id}', [NoticeController::class, 'deleteNotice'])->middleware('LoggedInTeacher')->name('teacher.deleteNotice');
// notes
Route::get('/teacher/{username}/lectureNotes/{course_id}', [TeacherController::class, 'getAllNotes'])->middleware('LoggedInTeacher')->name('teacher.notes');
Route::post('/teacher/uploadNote', [LectureNoteController::class, 'uploadNote'])->middleware('LoggedInTeacher')->name('teacher.uploadNote');
Route::post('/teacher/updateNote', [LectureNoteController::class, 'updateNote'])->middleware('LoggedInTeacher')->name('teacher.updateNote');
Route::get('/teacher/deleteNote/{note_id}', [LectureNoteController::class, 'deleteNote'])->middleware('LoggedInTeacher')->name('teacher.deleteNote');

/** Jasun -> student, course, lectureNote */
Route::get('/student/registration',[StudentController::class,'registration'])->middleware('LoggedInStudent')->name('student.registration');
Route::get('/student/account',[StudentController::class,'account'])->middleware('LoggedInStudent')->name('student.account');
Route::get('/student/AddCourse', [StudentController::class,'AddCourse'])->middleware('LoggedInStudent')->name('student.AddCourse');
Route::get('/registration/showRegistration',[StudentController::class,'showRegistration'])->middleware('LoggedInStudent')->name('student.showRegistration');
Route::post('/confirm',[StudentController::class,'confirm'])->middleware('LoggedInStudent')->name('confirm');
Route::get('/student/mycourses',[StudentController::class,'mycourses'])->middleware('LoggedInStudent')->name('mycourses');
Route::get('/student/courseDetails/{id}',[StudentController::class,'courseDetails'])->middleware('LoggedInStudent')->name('courseDetails');
Route::get('/student/notice',[StudentController::class,'notice'])->middleware('LoggedInStudent')->name('student.notice');
Route::get('/student/grade',[StudentController::class,'grade'])->middleware('LoggedInStudent')->name('student.grade');
Route::post('/student/uploadAssignment',[StudentController::class,'uploadAssignment'])->middleware('LoggedInStudent')->name('uploadAssignment');

/** Rafi -> admin, grade, leaveApplication */
Route::get('/adduser',[AdminController::class,'AddUser'])->middleware('LoggedInAdmin')->name('adduser');
Route::post('/adduser',[AdminController::class,'AddUserSubmit'])->middleware('LoggedInAdmin')->name('adduser');
Route::get('/course',[CourseController::class,'Course'])->middleware('LoggedInAdmin')->name('course');
Route::post('/course',[CourseController::class,'CourseSubmit'])->middleware('LoggedInAdmin')->name('course');
Route::get('/list',[CourseController::class,'showuser'])->middleware('LoggedInAdmin')->name('list');
Route::get('/course/{id}/edit', [CourseController::class,'edit'])->middleware('LoggedInAdmin')->name('edit');
Route::post('/course/{id}/edit', [CourseController::class,'editSubmit'])->middleware('LoggedInAdmin')->name('edit');
Route::get('/course/{id}/delete', [CourseController::class,'Delete'])->middleware('LoggedInAdmin')->name('delete');

/** Keya -> accountant, transaction, login */
/**student routes */
Route::get('/', [AccountantController::class,'home'])->name('home');
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'loginSubmit'])->name('login');
Route::get('/accountant/profile/{id}',[AccountantController::class,'update'])->middleware('LoggedInAccountant');
Route::get('/profile/{id}',[AccountantController::class,'profile'])->middleware('LoggedInAccountant');
Route::post('/profile/{id}',[AccountantController::class,'updateSubmit'])->middleware('LoggedInAccountant');
Route::get('/index',[AccountantController::class,'index'])->middleware('LoggedInAccountant')->name('index');
Route::get('/changepass',[LoginController::class,'changepass'])->middleware('LoggedInAccountant')->name('changepass');
Route::get('/logout',[LoginController::class,'logout'])->middleware('LoggedInAccountant')->name('logout');
Route::get('/register',[AccountantController::class,'register'])->middleware('LoggedInAccountant')->name('register');
Route::post('/register',[AccountantController::class,'registerSubmit'])->middleware('LoggedInAccountant')->name('register');
Route::get('/transaction',[TransactionController::class,'transaction'])->middleware('LoggedInAccountant')->name('transaction');
Route::post('/transaction',[TransactionController::class,'addSubmit'])->middleware('LoggedInAccountant')->name('transaction');

Route::get('/list',[AccountantController::class,'list'])->middleware('LoggedInAccountant')->name('list');
