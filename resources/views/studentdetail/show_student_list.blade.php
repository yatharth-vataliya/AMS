@extends('layouts.app2')

@section('title')

Search Student Here

@endsection

@section('content')

@include('main.header')

@include('main.sidebar')
@if($errors->any())
	<div class="alert alert-danger">
		@foreach($errors->all() as $error )
			<ul>
				<li>{{ $error }}</li>
			</ul>
		@endforeach
	</div>
@endif
<div class="main">
	<div class="col-md-10">
	<table class="table table-striped table-bordered table-hover table-condensed table-responsive">
		<caption><h2 align="center">Results</h2></caption>
		<thead>
			<tr>
				<th>Name of Student</th>
				<th>Registration Number of Student</th>
				<th>Student Contact(if given)</th>
				<th>Parents Contact</th>
				<th colspan="3" style="text-align: center;">Other Options</th>
			</tr>
		</thead>
		<tbody style="text-align: center;">
			@foreach($students as $student)
			<tr>
				<td>{{ $student->student_name }}</td>
				<td>{{ $student->registration_number }}</td>
				<td>{{ $student->student_contact }}</td>
				<td>{{ $student->parents_contact }}</td>
				<form action="{{ route('edit_student_form') }}" method="POST">
					@csrf
					@method('PUT')
					<input type="hidden" name="id" value="{{ $student->registration_number }}" >
				<td><input type="submit" class="btn btn-primary" value="EDIT"></td>	
				</form>
				<form action="{{ route('delete_student') }}" method="POST">
					@csrf
					@method('DELETE')
					<input type="hidden" name="id" value="{{ $student->registration_number }}" >
				<td><input type="submit" class="btn btn-danger" value="DELETE"></td>	
				</form>
				<form action="{{ route('full_info') }}" method="POST">
					@csrf
					<input type="hidden" name="id" value="{{ $student->registration_number }}" >
					<td><input type="submit" class="btn btn-warning" value="Full Info"></td>
				</form>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>	
</div>

@endsection