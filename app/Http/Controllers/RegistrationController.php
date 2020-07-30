<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student_master;
use Illuminate\Support\Facades\Hash;
use App\teacher_master;
use App\division_master;
use App\room_master;
use App\subject_master;
use App\admin_master;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SubjectValidationRequest;

class RegistrationController extends Controller
{
    //
    

    public function student_registration(Request $request){
    	
    	$request->validate([
    		'class'=>'required|max:3',
    		'division'=>'required|max:191',
    		'roll_no'=>'required|max:3',
    		'student_name'=>'required|string|max:191',
    		'birth_date'=>'required|date',
    		'gender'=>'required',
    		'student_contact'=>'nullable|min:10|max:10',
    		'student_join_date'=>'required|date',
    		'parents_name'=>'required|string|max:191',
    		'parents_occupation'=>'nullable|string|max:191',
    		'parents_contact'=>'required|max:10|min:10|unique:student_master',
    		'password'=>'required|string|min:6|confirmed',
    		'address'=>'required|string|max:191',
           'student_image'=>'image|nullable'    		
    	]);



    	// student_master::create($request->all());
    	$row=new  student_master;
    	// $row->class=$request->get('class');
    	$row->class=$request->input('class');
    	$row->division=$request->input('division');
    	$row->roll_no=$request->input('roll_no');
    	$row->student_name=$request->input('student_name');
    	$row->birth_date=$request->input('birth_date');
    	$row->gender=$request->input('gender');
    	$row->student_contact=$request->input('student_contact');
    	$row->student_join_date=$request->input('student_join_date');
    	$row->parents_name=$request->input('parents_name');
    	$row->parents_occupation=$request->input('parents_occupation');
    	$row->parents_contact=$request->input('parents_contact');
    	$row->password=Hash::make($request->input('password'));
    	$row->address=$request->input('address');
    	$row->save();

        if ($request->hasFile('student_image')) {
    
            $request->file('student_image')->storeAs('public/student_images',$row->registration_number.".jpeg");
        }    

    	// return redirect(route('student_registration_form'));
        return redirect()->route('student_registration_form');
    }

    public function teacher_registration(Request $request){
    	$request->validate([
    		'teacher_name'=>'required|max:191|string',
    		'teacher_address'=>'required|max:191|string',
    		'teacher_contact'=>'required|min:10|max:10',
    		'teacher_email'=>'required|email|max:191|unique:teacher_master',
    		'gender'=>'required',
    		'teacher_join_date'=>'required|date',
    		'teacher_leave_date'=>'nullable|date',
    		'teacher_password'=>'required|min:6|string|confirmed'
    	]);
		
		$row=new teacher_master;
		$row->teacher_name=$request->input('teacher_name');
		$row->teacher_address=$request->input('teacher_address');
		$row->teacher_contact=$request->input('teacher_contact');
		$row->teacher_email=$request->input('teacher_email');
		$row->gender=$request->input('gender');
		$row->teacher_join_date=$request->input('teacher_join_date');
		$row->teacher_leave_date=$request->input('teacher_leave_date');
		$row->teacher_password=Hash::make($request->input('teacher_password'));
		$row->save();

		return redirect(route('teacher_registration_form'));
    }

    public function division_registration(Request $request){
    	$request->validate([
    		'division_name'=>'required|max:20',
    		'division_description'=>'nullable|max:191'
    	]);

    	division_master::create($request->all());
    	/*$row=new division_master;
    	$row->division_name=$request->input('division_name');
    	$row->division_description=$request->input('division_description');
    	$row->save();*/

    	return redirect(route('division_registration_form'));
    }

    public function room_registration(Request $request){
    	$request->validate([
    		'room_name'=>'required|max:20',
    		'room_capacity'=>'required|numeric|between:0,140',
    		'room_description'=>'nullable|max:191'
    	]);

    	room_master::create($request->all());
    	/*$row=new room_master;
    	$row->room_name=$request->input('room_name');
    	$row->room_capacity=$request->input('room_capacity');
    	$row->room_description=$request->input('room_description');
    	$row->save();*/

    	// return redirect(route('room_registration_form'));
        return redirect()->route('room_registration_form');
    }

    public function subject_registration(SubjectValidationRequest $request){
    	// $request->validate([
    	// 	'subject_name'=>'required|max:191',
    	// 	'subject_description'=>'nullable|max:191'
    	// ]);

        $request->validated();



    	subject_master::create($request->all());
    	/*$row=new subject_master;
    	$row->subject_name=$request->input('subject_name');
    	$row->subject_description=$request->input('subject_description');
    	$row->save();*/

    	// return redirect(route('subject_registration_form'));
        return redirect()->route('subject_registration_form');
    }

    public function admin_registration(Request $request){
        $request->validate([
            'admin_name'=>'required|max:100',
            'admin_address'=>'required|max:191',
            'gender'=>'required',
            'admin_birth_date'=>'required|date',
            'admin_contact'=>'required|max:10|min:10',
            'admin_username'=>'required|email|max:191|unique:admin_master',
            'admin_password'=>'required|max:191|min:6|confirmed',
        ]);

        $row= new admin_master;
        $row->admin_name=$request->input('admin_name');
        $row->admin_address=$request->input('admin_address');
        $row->gender=$request->input('gender');
        $row->admin_birth_date=$request->input('admin_birth_date');
        $row->admin_contact=$request->input('admin_contact');
        $row->admin_username=$request->input('admin_username');
        $row->admin_password=Hash::make($request->input('admin_password'));
        $row->save();

        return redirect(route('admin_registration_form'));

    }

    public function sign_in(Request $request){
    	return view('registration.student_registation_form');
    }

}
