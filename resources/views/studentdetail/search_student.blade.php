@extends('layouts.app2')

@section('title')

Search Student Here

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
<h1 style="margin-left: 28%;"><strong>Student Detail Section</strong></h1>
		<hr style="border: 1px solid black;" />
<div class="col-md-4" style="margin-left: 10%;">
	<h2>Enter Name or Enrollment No:</h2>
	<form action="{{ route('search_students') }}" method="POST" enctype="multipart/form-data" class="form-inline">
		@csrf
		<input type="search" name="search" class="form-control" size="35" placeholder="Search Student Name / Enrollment Number">
		<input type="submit" class="btn btn-primary" name="search_button" value="Search">
	</form>
</div>

@endsection