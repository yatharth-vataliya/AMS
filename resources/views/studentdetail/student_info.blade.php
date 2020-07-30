@extends('layouts.app2')

@section('title')

Student Information

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
		<h2 align="center" class="text-primary">Student Information</h2>
		<div class="thumbnail">
			<img src="{{ asset('storage/student_images/'.$info->registration_number.'.jpeg') }}" alt="student image" style="width: 250px;height: 250px;">
		</div>
		<div>
			<table class="table table-striped table-bordered table-hover table-condensed table-responsive">
				<thead>
					<tr>
						<th>Name</th>
						<th>Class</th>
						<th>Roll No</th>
						<th>Registration Number</th>
						<th>Student Contacts</th>
						<th>Parents Contact</th>
						<th>Date Of Birth</th>
						<th>Student Join Date</th>
						<th>Address</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ $info->student_name }}</td>
						<td>{{ $info->class }}</td>
						<td>{{ $info->roll_no }}</td>
						<td>{{ $info->registration_number }}</td>
						<td>{{ $info->student_contact }}</td>
						<td>{{ $info->parents_contact }}</td>
						<td>{{ $info->birth_date }}</td>
						<td>{{ $info->student_join_date }}</td>
						<td>{{ $info->address }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>


@endsection