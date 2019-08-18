<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

// Route::view('/','login_system.login_system')->name('login_form');

Route::middleware(['checkuser'])->group(function(){

Route::view('/index','main.index')->name('index');
Route::get('/logout','CheckController@logout')->name('logout');
Route::get('/select_students','AttendanceController@show_student_list')->name('select_student');
Route::post('/select_students','AttendanceController@select_student_submit')->name('select_student_submit');
Route::post('/fill_attendance','AttendanceController@fill_attendance_submit')->name('fill_attendance_submit');
Route::get('/select_report','ReportingController@possible_report')->name('select_report');
Route::post('/select_report','ReportingController@show_report')->name('show_report');
Route::get('/showdetail','StudentDetailController@showDetailOfStudent')->name('search_student');
Route::post('/showdetail','StudentDetailController@searchStudent')->name('search_students');
Route::post('/full_info','StudentDetailController@fullInfo')->name('full_info');
});

Route::middleware(['ifuserexists'])->group(function(){
Route::view('/','login_system.login_system')->name('login_form');
Route::view('/login_form','login_system.login_system')->name('login_form');
Route::post('/login_form','CheckController@checkuser')->name('checkuser');
});

Route::middleware(['authcheck'])->group(function(){

Route::view('/admin_registration_form','registration.admin_registration')->name('admin_registration_form');
Route::post('/admin_registration_form','RegistrationController@admin_registration')->name('admin_registration');
Route::view('/student_registration_form','registration.student_registration')->name('student_registration_form');
Route::post('/student_registration_form','RegistrationController@student_registration')->name('student_registration');
Route::view('/teacher_registration_form','registration.teacher_registration')->name('teacher_registration_form');
Route::post('/teacher_registration_form','RegistrationController@teacher_registration')->name('teacher_registration');
Route::view('/division_registration_form','registration.division_registration')->name('division_registration_form');
Route::post('/division_registration_form','RegistrationController@division_registration')->name('division_registration');
Route::view('/room_registration_form','registration.room_registration')->name('room_registration_form');
Route::post('/room_registration_form','RegistrationController@room_registration')->name('room_registration');
Route::view('/subject_registration_form','registration.subject_registration')->name('subject_registration_form');
Route::post('/subject_registration_form','RegistrationController@subject_registration')->name('subject_registration');
Route::view('/admin_registration_form','registration.admin_registration')->name('admin_registration_form');
Route::post('/admin_registration_form','RegistrationController@admin_registration')->name('admin_registration');
Route::put('/edit_student','StudentDetailController@editStudent')->name('edit_student_form');
Route::patch('/edit_students','StudentDetailController@updateStudent')->name('update_student');
Route::delete('/delete_student','StudentDetailController@deleteStudent')->name('delete_student');
});
/*Route::view('/access','access')->name('access');
Route::view('/student_registration_form','registration.student_registration')->name('student_registration_form');
Route::post('/student_registration_form','RegistrationController@student_registration')->name('student_registration');
Route::view('/teacher_registration_form','registration.teacher_registration')->name('teacher_registration_form');
Route::post('/teacher_registration_form','RegistrationController@teacher_registration')->name('teacher_registration');
Route::view('/division_registration_form','registration.division_registration')->name('division_registration_form');
Route::post('/division_registration_form','RegistrationController@division_registration')->name('division_registration');
Route::view('/room_registration_form','registration.room_registration')->name('room_registration_form');
Route::post('/room_registration_form','RegistrationController@room_registration')->name('room_registration');
Route::view('/subject_registration_form','registration.subject_registration')->name('subject_registration_form');
Route::post('/subject_registration_form','RegistrationController@subject_registration')->name('subject_registration');
Route::view('/admin_registration_form','registration.admin_registration')->name('admin_registration_form');
Route::post('/admin_registration_form','RegistrationController@admin_registration')->name('admin_registration');
Route::get('/select_students','AttendanceController@show_student_list')->name('select_student');
Route::post('/select_students','AttendanceController@select_student_submit')->name('select_student_submit');
Route::post('/fill_attendance','AttendanceController@fill_attendance_submit')->name('fill_attendance_submit');
Route::get('/select_report','ReportingController@possible_report')->name('select_report');
Route::post('/select_report','ReportingController@show_report')->name('show_report');
Route::view('/login_form','login_system.login_system')->name('login_form');
Route::post('/login_form','CheckController@checkuser')->name('checkuser');
Route::view('/index','main.index')->name('index');
Route::get('/logout','CheckController@logout')->name('logout');
Route::get('/showdetail','StudentDetailController@showDetailOfStudent')->name('search_student');
Route::post('/showdetail','StudentDetailController@searchStudent')->name('search_students');
Route::put('/edit_student','StudentDetailController@editStudent')->name('edit_student_form');
Route::patch('/edit_students','StudentDetailController@updateStudent')->name('update_student');
Route::delete('/delete_student','StudentDetailController@deleteStudent')->name('delete_student');
Route::post('/full_info','StudentDetailController@fullInfo')->name('full_info');*/