@extends('layouts.app2')

@section('title')

Search Student Here

@endsection

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<div class="col-md-10">
	<form action="{{ route('update_student') }}" method="POST" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		<input type="hidden" name="id" value="{{ $student->registration_number }}">
		<div class="form-group">
			<label class="control-label col-md-4" for="student_name" >
				Student Name:-
			</label>
			<div class="col-md-4">
				<input type="text" name="student_name" value="{{ $student->student_name }}" class="form-control" id="" maxlength="191" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-4" for="birth_date" >
				Date Of Birth:-
			</label>
			<div class="col-md-4">
				<input type="date" name="birth_date" value="{{ $student->birth_date }}" class="form-control" id="" required>
			</div>
		</div>
		@if($student->gender=='male')
		<div class="form-group">
			<label class="control-label col-md-4">Gender:-</label>
			<div class="col-md-4">
				<div class="radio">
					<label><input type="radio" name="gender"  value="male" required checked="">Male</label>
					<label><input type="radio" name="gender"  value="female" required>Female</label>
				</div>
			</div>
		</div>
		@else
		<div class="form-group">
			<label class="control-label col-md-4">Gender:-</label>
			<div class="col-md-4">
				<div class="radio">
					<label><input type="radio" name="gender"  value="male" required>Male</label>
					<label><input type="radio" name="gender"  value="female" required checked="">Female</label>
				</div>
			</div>
		</div>
		@endif
		<div class="form-group">
			<label class="control-label col-md-4" for="student_contact" >
				Student Contact:-
			</label>
			<div class="col-md-4">
				<input type="number" name="student_contact" value="{{ $student->student_contact }}" class="form-control" id="" maxlength="10" placeholder="optional">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-4" for="student_join_date" >
				Student Join Date:-
			</label>
			<div class="col-md-4">
				<input type="date" name="student_join_date" value="{{ $student->student_join_date }}" class="form-control" id="" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-4" for="parents_name" >
				Parents Name:-
			</label>
			<div class="col-md-4">
				<input type="text" name="parents_name" value="{{ $student->parents_name }}" class="form-control" id="" maxlength="191" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-4" for="parents_occupation" >
				Parents Occupation:-
			</label>
			<div class="col-md-4">
				<input type="text" name="parents_occupation" value="{{ $student->parents_occupation }}" class="form-control" id="" maxlength="191" placeholder="optional">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-4" for="parents_contact" >
				Parents Contact(Username):-
			</label>
			<div class="col-md-4">
				<input type="number" name="parents_contact" value="{{ $student->parents_contact }}" class="form-control" id="" maxlength="10" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-4" for="address" >
				Address:-
			</label>
			<div class="col-md-4">
				<textarea name="address" class="form-control" maxlength="191" required>{{ $student->address }}</textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-4" for="file_upload">
				Upload Your Image:-
			</label>
			<div class="col-md-4">
				<input type="file" class="btn btn-block btn-primary" name="student_image">
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-4 col-md-4">
				<input type="submit" class="btn btn-success btn-block" name="sumbit" value="Update">
			</div>
		</div>


	</form>
</div>

@endsection
