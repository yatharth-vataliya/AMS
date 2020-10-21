@extends('layouts.app2')

@section('title')
	Report
@endsection

@section('content')

<div class="container">
<div class="col-md-12">
<div class="col-md-3">
	<label for="" class="control-label" >Class:-</label>
	{{ $lec['class'] }}
</div>
<div class="col-md-3">
		<label for="" class="control-label" >Division:-</label>
		{{ $division }}
</div>
<div class="col-md-3">
	<label for="" class="control-label" >Date:-</label>
	{{ $lec['date'] }}
</div>
<div class="col-md-3">
	<label for="" class="control-label" >Lecture No:-</label>
	{{ $lec['lecture_no'] }}
</div>
</div>
<div class="col-md-12 text-danger">
	<div class="col-md-3">
		<label for="" class="control-label" >Teacher Name:-</label>
		{{ $teacher['teacher_name'] }}
	</div>
	<div class="col-md-3">
		<label for="" class="control-label" >Subject:-</label>
		{{ $subject['subject_name'] }}
	</div>
</div>
<div class="page-header">
	<h2>List Of Absent Students</h2>
</div>
<div class="col-md-12">
	<table class="table table-hover table-bordered table-striped">
		<tr>
			<th>Roll No</th>
			<th>Name</th>
		</tr>
	@foreach($absents as $att)
		<tr>
			<td >{{ $att->roll_no }}</td>
			<td >{{ $att['student_name'] }}</td>
		</tr>
	@endforeach

	</table>
</div>

<div class="page-header">
	<h2>List Of Presents Students</h2>
</div>
<div class="col-md-12">
	<table class="table table-hover table-bordered table-striped">
		<tr>
			<th>Roll No</th>
			<th>Name</th>
		</tr>
	@foreach($presents as $att)
		<tr>
			<td >{{ $att['roll_no'] }}</td>
			<td >{{ $att['student_name'] }}</td>
		</tr>
	@endforeach

	</table>
</div>
<div class="col-md-12">
	<a href="{{ route('index') }}" class="btn btn-primary btn-block">Home Menu</a>
</div>
</div>

@endsection
