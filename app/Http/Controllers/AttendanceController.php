<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student_master;
use App\teacher_master;
use App\division_master;
use App\room_master;
use App\subject_master;
use App\admin_master;
use App\lecture_detail;
use Illuminate\Support\Facades\DB;
use App\attendance_detail;


class AttendanceController extends Controller
{
    //
    public function show_student_list(){

		$subjects=new subject_master;
		$teachers=new teacher_master;
		$divisions=new division_master;
		$rooms=new room_master;
		$admins=new admin_master;
		$subject=$subjects->all();
		$teacher=$teachers->where('teacher_id',session('teacher_id'))->first();
		$division=$divisions->all();
		$room=$rooms->all();
		$admin=$admins->where('admin_id',session('admin_id'))->first();
		return view('attendance.select_student',['subject'=>$subject,'division'=>$division,'room'=>$room,'teacher'=>$teacher,'admin'=>$admin]); 	
	
    }

    public function select_student_submit(Request $request){
    	$request->validate([
    		'subject'=>'required',
    		'division'=>'required',
    		'room'=>'required',
    		'class'=>'required',
    		'date'=>'required|date',
    		'lectureno'=>'required'
    		
    	]);


        $ifAlreadySubmited=lecture_detail::where(['subject_id'=>$request->input('subject'),'division_id'=>$request->input('division'),'class'=>$request->input('class'),'date'=>$request->input('date')])->first();
        // return $ifAlreadySubmited;
        if($ifAlreadySubmited!=null){
            return back()->with('error',"attendance is already taken please contact admin for edit ");
            //return back();
        }else{
            // return back()->withErrors('error',"attendance is already taken please contact admin for edit ");
            // return "hello this is working ";
        }

    	$row=new lecture_detail;
    	$row->subject_id=$request->input('subject');
    	$row->teacher_id=session('teacher_id');
    	$row->division_id=$request->input('division');
    	$row->room_id=$request->input('room');
    	$row->class=$request->input('class');
    	$row->date=$request->input('date');
    	$row->lecture_no=$request->input('lectureno');
    	$row->save();
		
/*	    $lecture_id=$row->insertGetId([
    		'subject_id'=>$request->input('subject'),
    		'teacher_id'=>session('teacher_id'),
    		'division_id'=>$request->input('division'),
    		'room_id'=>$request->input('room'),
    		'class'=>$request->input('class'),
    		'date'=>$request->input('date'),
    		'lecture_no'=>$request->input('lectureno')
    	]);*/
    	$lecture_id=$row->lecture_id;
    	// $pdo = DB::connection()->getPdo();
    	// $lecture_id=$pdo->lastInsertId();
    	// $lecture_id=DB::getPdo()->lastInsertId();
    	session(['lecture_id'=>$lecture_id]);
    	$divisions=new division_master;
    	$division=$divisions->where('division_id',$request->input('division'))->first();
      
    	$students=new student_master;
       
    	$student=$students->where(['class'=>$request->input('class'),'division'=>$division['division_name'],'status'=>1])->get();
       
    	return view('attendance.fill_attendance')->with('student',$student);
    	
    	
    }

/*    public function fill_attendance_submit(Request $request){
    	$registration_numbers=$request->all();
    	   	
    	for($i=1;$i<=140;$i++){
    		if(!isset($registration_numbers[$i])){
    			continue;	
    		}    		
    			$row=new attendance_detail;
    			$row->lecture_id=session('lecture_id');
    			$row->student_registration=$registration_numbers[$i];
    			$row->save();

    		  		
    	}

    	return redirect()->route('index');
    	

    }*/

    public function fill_attendance_submit(Request $request){
        $registration_numbers=$request->input('student_list');
        // return var_dump($registration_numbers);
        if(empty($registration_numbers)){
            return redirect()->route('index');
        }
        foreach($registration_numbers as $number){
            $row=new attendance_detail;
            $row->lecture_id=session('lecture_id');
            $row->student_registration=$number;
            $row->save();
        }
            return redirect()->route('index');


    }
}
