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



class StudentDetailController extends Controller
{

	public function apiOfStudent(){

		$stud=new student_master;
		$students=$stud->paginate(50);

		echo "<pre>";
		var_dump($students);
		echo "</pre>";

		echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";

		echo "<pre>";
		print_r($students);
		echo "</pre>";

		echo $students->links();

		// return student_master::all();

	}

    public function showDetailOfStudent(){
    	return view('studentdetail.search_student');
    }

    public function searchStudent(Request $request){
    	
    	$request->validate([
    		'search'=>'required'
    	]);
    	$search=$request->input('search');
    	$students =student_master::where('status',1)->where('student_name', 'like', "%$search%")->orWhere('registration_number','like',"%$search%")->get();
    	 return view('studentdetail.show_student_list',['students'=>$students]);

    }

	public function editStudent(Request $request){

		$student=student_master::where('registration_number',$request->input('id'))->first();
		return view('studentdetail.edit_student')->with('student',$student);
	}


	public function updateStudent(Request $request){

		$request->validate([
    		
    		'student_name'=>'required|string|max:191',
    		'birth_date'=>'required|date',
    		'gender'=>'required',
    		'student_contact'=>'nullable|min:10|max:10',
    		'student_join_date'=>'required|date',
    		'parents_name'=>'required|string|max:191',
    		'parents_occupation'=>'nullable|string|max:191',
    		'parents_contact'=>'required|max:10|min:10',
    		'address'=>'required|string|max:191',
            'student_image'=>'image|nullable'    		
    	]);
    	$student=new student_master;
		$student->updateStudent($request);
		/*student_master::where('registration_number',$request->input('id'))->update(
			['student_name'=>$request->input('student_name'),'birth_date'=>$request->input('birth_date'),'gender'=>$request->input('gender'),'student_contact'=>$request->input('student_contact'),'student_join_date'=>$request->input('student_join_date'),'parents_name'=>$request->input('parents_name'),'parents_occupation'=>$request->input('parents_occupation'),'parents_contact'=>$request->input('parents_contact'),'address'=>$request->input('address')]
		);*/

		if ($request->hasFile('student_image')) {
    		Storage::delete('public/student_images/'.$request->input('id').'.jpeg');

            $request->file('student_image')->storeAs('public/student_images',$request->input('id').".jpeg");
        }

		return redirect()->route('search_student');
	}

	public function deleteStudent(Request $request){
		// student_master::where('registration_number',$request->input('id'))->delete();
		student_master::where('registration_number',$request->input('id'))->update(['status'=>0]);
		return redirect()->route('index');
	} 

	public function fullInfo(Request $request){
		$info=student_master::where('registration_number',$request->input('id'))->first();
		
		$path = Storage::url('public/student_images/7.jpeg');
		// $visibility = Storage::getVisibility('public/student_images/7.jpeg');
		// var_dump($visibility);
		// Storage::setVisibility('file.jpg', 'public');
		
		return view('studentdetail.student_info')->with('info',$info);
	}   

}
