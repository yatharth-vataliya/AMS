@extends('layouts.app1')

@section('content')
	<header class="page-header container">
			<h2>Student Registration Form</h2>
	</header>
		@if ($errors->any())
    			<div class="alert alert-danger">
        			<ul>
            			@foreach ($errors->all() as $error)
                			<li>{{ $error }}</li>
            			@endforeach
        			</ul>
    			</div>
		@endif
		<div class="container">
<form action="{{ route('student_registration') }}" method="POST" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data" style="color:#8b4513;font-size: 1.2em;">
	@csrf
	<div class="form-group">
		<label class="control-label col-md-4" for="class" >
			Class:-
		</label>
		<div class="col-md-4">
			<input type="number" name="class" value="" class="form-control" id="" maxlength="3"  required> 
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="division" >
			Division:-
		</label>
		<div class="col-md-4">
			<input type="text" name="division" value="" class="form-control" id="" required> 
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="roll_no" >
			Roll_no:-
		</label>
		<div class="col-md-4">
			<input type="number" name="roll_no" value="" class="form-control" id="" maxlength="3" required> 
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="student_name" >
			Student Name:-
		</label>
		<div class="col-md-4">
			<input type="text" name="student_name" value="" class="form-control" id="" maxlength="191" required>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="birth_date" >
			Date Of Birth:-
		</label>
		<div class="col-md-4">
			<input type="date" name="birth_date" value="" class="form-control" id="" required> 
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4">Gender:-</label>
		<div class="col-md-4">
			<div class="radio">
				<label><input type="radio" name="gender"  value="male" required>Male</label>
				<label><input type="radio" name="gender"  value="female" required>Female</label>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="student_contact" >
			Student Contact:-
		</label>
		<div class="col-md-4">
			<input type="number" name="student_contact" value="" class="form-control" id="" maxlength="10" placeholder="optional"> 
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="student_join_date" >
			Student Join Date:-
		</label>
		<div class="col-md-4">
			<input type="date" name="student_join_date" value="" class="form-control" id="" required> 
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="parents_name" >
			Parents Name:-
		</label>
		<div class="col-md-4">
			<input type="text" name="parents_name" value="" class="form-control" id="" maxlength="191" required> 
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="parents_occupation" >
			Parents Occupation:-
		</label>
		<div class="col-md-4">
			<input type="text" name="parents_occupation" value="" class="form-control" id="" maxlength="191" placeholder="optional"> 
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="parents_contact" >
			Parents Contact(Username):-
		</label>
		<div class="col-md-4">
			<input type="number" name="parents_contact" value="" class="form-control" id="" maxlength="10" required> 
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="password" >
			Password:-
		</label>
		<div class="col-md-4">
			<input type="password" name="password" value="" class="form-control" id="" required> 
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="password-confirmation">
			Confirm Password:-
		</label>
		<div class="col-md-4">
			<input type="password" name="password_confirmation" value="" class="form-control" id="" required> 
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="address" >
			Address:-
		</label>
		<div class="col-md-4">
			<textarea name="address" class="form-control"  maxlength="191" required></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="file_upload">
			Upload Your Image:-
		</label>
		<div class="col-md-4">
			<input type="file" name="student_image" class="btn btn-default">
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-offset-4 col-md-4">
			<input type="submit" class="btn btn-success btn-block" name="sumbit" value="Register">
		</div>
	</div>


</form>
</div>

@endsection