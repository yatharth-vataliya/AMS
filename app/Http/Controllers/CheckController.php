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

class CheckController extends Controller
{
    //

	

	public function checkuser(Request $request){
		$request->validate([
			'username'=>'required|max:191',
			'password'=>'required|max:191',
			'authority'=>'required'
		]);
		
       	//parent -----------------------//------------------//----start--------//

		if($request->input('authority')=='parent'){
			$row=student_master::where('parents_contact',$request->input('username'))->exists();
    	// if($row=student_master::where('parents_contact',$request->input('username'))->first()){
			if($row){
				$row=student_master::where('parents_contact',$request->input('username'))->first();
				if (Hash::check($request->input('password'), $row['password'])) {
					session(['username'=>$row['parents_contact']]);
					return redirect(route('index'));
				}else{
					session(['error'=>'invalid password']);
					return redirect(route('login_form'));
				}
			}else{
				session(['error'=>'invalid username']);
				return redirect(route('login_form'));
			}

		}

		//parent -----------------------//------------------//----end--------//

		//teacher ----------------------//------------------//start-----------//

		if($request->input('authority')=='teacher'){
			$row=teacher_master::where('teacher_email',$request->input('username'))->exists();
			if($row){
				$row=teacher_master::where('teacher_email',$request->input('username'))->first();
				if (Hash::check($request->input('password'), $row['teacher_password'])) {
					session(['username'=>$row['teacher_email']]);
					session(['teacher_id'=>$row['teacher_id']]);
					// return redirect(route('index'));
					return redirect()->route('select_student');
				}else{
					session(['error'=>'invalid password']);
					return redirect(route('login_form'));
				}
			}else{
				session(['error'=>'invalid username']);
				// return redirect(route('login_form'));
				return redirect()->route('login_form');
			}

		}

		//teacher ----------------------//------------------//----end-----------//

		//admin ------------------------//------------------//----start---------//

		if($request->input('authority')=='admin'){
			$row=admin_master::where('admin_username',$request->input('username'))->exists();
			if($row){
				$row=admin_master::where('admin_username',$request->input('username'))->first();
				if (Hash::check($request->input('password'), $row['admin_password'])) {
					session(['authority'=>'admin']);
					session(['username'=>$row['admin_username']]);
					session(['admin_id'=>$row['admin_id']]);
					return redirect(route('index'));
				}else{
					session(['error'=>'invalid password']);
					return redirect(route('login_form'));
				}
			}else{
				session(['error'=>'invalid username']);
				return redirect(route('login_form'));
			}

		}
		
	//admin ------------------------//------------------//----end---------//
	}

	

	public function logout(){
		session()->flush();
		return redirect(route('login_form'));
	}
}
