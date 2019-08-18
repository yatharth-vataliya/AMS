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

class ReportingController extends Controller
{
    public function possible_report(){
    	$subjects=new subject_master;
		$divisions=new division_master;
		$subject=$subjects->all();
		$division=$divisions->all();
		return view('attendance.select_report')->with(['subject'=>$subject,'division'=>$division]); 
    }

    public function show_report(Request $request){
    	$request->validate([
    		'class'=>'required',
    		'date'=>'required|date',
    		'subject'=>'required',
    		'division'=>'required'
    	]);

    	$students=new student_master;
    	$lec_detail=new lecture_detail;
    	$atten_datail=new attendance_detail;
    	$divisions=new division_master;
    	$subjects=new subject_master;
    	$teachers=new teacher_master;
    	$division=$divisions->select('division_name')->where('division_id',$request->input('division'))->first();

    	$lec=$lec_detail->where(['subject_id'=>$request->input('subject'),'division_id'=>$request->input('division'),'class'=>$request->input('class'),'date'=>$request->input('date')])->first();
    	$teacher=$teachers->select('teacher_name')->where('teacher_id',$lec['teacher_id'])->first();
    	$subject=$subjects->select('subject_name')->where('subject_id',$request->input('subject'))->first();

        if($lec==null){
            return back()->with(['error'=>'There is no attendance found on the requested details']);
        }



/*
    	$attendance=$atten_datail->select('student_registration')->where('lecture_id',$lec['lecture_id'])->get();
    	
		$array=array();

    	$i=0;
    	foreach ($attendance as $att) {
    		$array[$i]=$att['student_registration'];
    		$i++;
    	}
    	

    	$presents=student_master::where(['class'=>$request->input('class'),'division'=>$division['division_name']])->whereNotIn('registration_number',$array)->get();
    	

    	$absents=student_master::where(['class'=>$request->input('class'),'division'=>$division['division_name']])->whereIn('registration_number',$array)->get();
*/

    	$presents=student_master::where(['class'=>$request->input('class'),'division'=>$division['division_name']])->whereNotIn('registration_number',function ($query) use ($lec){
    		$query->select('student_registration')->from('attendance_detail')->where('lecture_id',$lec['lecture_id']);
    	})->get();

    	$absents=student_master::where(['class'=>$request->input('class'),'division'=>$division['division_name']])->whereIn('registration_number',function ($query) use ($lec){
    		$query->select('student_registration')->from('attendance_detail')->where('lecture_id',$lec['lecture_id']);
    	})->get();
    

    	return view('attendance.reporting.show_report')->with(['presents'=>$presents,'absents'=>$absents,'lec'=>$lec,'teacher'=>$teacher,'subject'=>$subject,'division'=>$division['division_name']]);


    
    }
}
