@extends('layouts.app2')

@section('title')

Fill Attendance

@endsection

@section('content')

@include('main.header')

@include('main.sidebar')

		@if ($errors->any())
    			<div class="alert alert-danger">
        			<ul>
            			@foreach ($errors->all() as $error)
                			<li>{{ $error }}</li>
            			@endforeach
        			</ul>
    			</div>
		@endif
		@if (session('error'))
    		<div class="alert alert-danger">
        		{{ session('error') }}
    		</div>
		@endif
		<h1 style="margin-left: 28%;"><strong>Fill Attendance</strong></h1>
		<hr style="border: 1px solid black;" />
<div class="col-md-10">
	<form action="{{ route('select_student_submit') }}" method="POST" accept-charset="utf-8" class="form-horizontal" style="color:#8b4513;font-size: 1.2em;">
		@csrf
		<div class="form-group">
			<label for="" class="control-label col-md-3">Select Subject:-</label>
				<div class="col-md-3">
					<select name="subject" class="form-control">
						@foreach($subject as $sub)
							<option value="{{ $sub['subject_id'] }}">{{ $sub['subject_name'] }}</option>
						@endforeach	
					</select>	
				</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-md-3">Select Division:-</label>
				<div class="col-md-3">
					<select name="division" class="form-control">
						@foreach($division as $div)
							<option value="{{ $div['division_id'] }}">{{ $div->division_name }}</option>
						@endforeach	
					</select>	
				</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-md-3">Select Room:-</label>
				<div class="col-md-3">
					<select name="room" class="form-control">
						@foreach($room as $rom)
							<option value="{{ $rom['room_id'] }}">{{ $rom['room_name'] }}</option>
						@endforeach	
					</select>	
				</div>
		</div>
		@if(!empty(session('teacher_id')))
		<div class="form-group">
			<label for="" class="control-label col-md-3">Teacher Name:-</label>
				<div class="col-md-3">
						<input type="text" value="{{ $teacher['teacher_name'] }}" class="form-control" readonly>
				</div>
		</div>
		@endif

		@if(!empty(session('admin_id')))
		<div class="form-group">
			<label for="" class="control-label col-md-3">Teacher Name:-</label>
				<div class="col-md-3">
						<input type="text" value="{{ $admin['admin_name'] }}" class="form-control" readonly>
				</div>
		</div>
		@endif
		<div class="form-group">
			<label for="" class="control-label col-md-3">Class:-</label>
				<div class="col-md-3">
						<input type="number"  name="class" class="form-control">
				</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-md-3">Lecture No:-</label>
				<div class="col-md-3">
						<input type="number" name="lectureno" class="form-control">
				</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-md-3">Date:-</label>
				<div class="col-md-3">
						<input type="date" name="date" class="form-control">
				</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-3 col-md-3">
				<input type="submit" value="Submit" class="btn btn-success btn-block">
			</div>
		</div>
	</form>
</div>

@endsection