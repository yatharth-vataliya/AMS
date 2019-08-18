@extends('layouts.app2')

@section('title')

Fill Attendance

@endsection

@section('content')

@include('main.header')

@include('main.sidebar')

<div class="col-md-10">
	<h1>Please check mark in front of absent student name</h1>
</div>
<div class="col-md-10">
	<form action="{{ route('fill_attendance_submit') }}" method="POST" class="form-horizontal" accept-charset="utf-8">
		@csrf
		@foreach($student as $stud)
		<div class="form-group" style="background-color: whitesmoke">
			<label class="control-label col-md-2">Roll no:- {{ $stud['roll_no'] }}</label>
			<label class="control-label col-md-3">Name:-</label>
			<label class="col-md-3 control-label">{{ $stud['student_name'] }}</label>
			<div class="col-md-3 checkbox">
				<input type="checkbox" value="{{ $stud['registration_number'] }}" name="student_list[]">
			</div>
		</div>
		@endforeach
		<div class="col-md-offest-2 col-md-4">
			<input type="submit" value="submit" class="btn btn-success btn-block">
		</div>
	</form>
</div>

@endsection