<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_master extends Model
{
    //
	
	protected $guarded=[];
    protected $table='student_master';
    protected $primaryKey='registration_number';

    public function updateStudent($request){
    	$this->where('registration_number',$request->input('id'))->update(
			['student_name'=>$request->input('student_name'),'birth_date'=>$request->input('birth_date'),'gender'=>$request->input('gender'),'student_contact'=>$request->input('student_contact'),'student_join_date'=>$request->input('student_join_date'),'parents_name'=>$request->input('parents_name'),'parents_occupation'=>$request->input('parents_occupation'),'parents_contact'=>$request->input('parents_contact'),'address'=>$request->input('address')]
		);
    }

}
