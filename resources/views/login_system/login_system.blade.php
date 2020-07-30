@extends('layouts.app1')

@section('content')
@if($errors->any())
	<div class="alert alert-danger">
		@foreach($errors->all() as $error )
			<ul>
				<li>{{ $error }}</li>
			</ul>
		@endforeach
	</div>
@endif
@if(session('error'))
	<div class="alert alert-danger">
			<ul>
				<li>{{ session('error') }}</li>
				@php
				session()->flush();
				@endphp
			</ul>
	</div>
@endif
<div class="container">
	<header id="header" class="page-header">
			<h2>Login As Your First Step</h2>	
			<h3>Authority Is Great Responsibility</h3>
	</header>
	<form action="{{ route('checkuser') }}" method="POST" accept-charset="utf-8" class="form-horizontal">
		@csrf
		<div class="form-group">
			<label class="control-label col-md-4">Select Type</label>
			<div class="col-md-4">
				<select name="authority" class="form-control">
					<option value="teacher">Teacher</option>
					<option value="parent">Parent</option>
					<option value="admin">Admin</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">Username</label>
			<div class="col-md-4">
				<input type="text" name="username" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">Password</label>
			<div class="col-md-4">
				<input type="password" name="password" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-4 col-md-4">
				<button type="submit" class="btn btn-success">Login</button>
			</div>
		</div>
	</form>
</div>
@endsection