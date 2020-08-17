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
<div class="container">
	<form action="{{ route('room_registration') }}" method="POST" accept-charset="utf-8" class="" role="form" style="color:#8b4513;font-size: 1.2em;">
		@csrf
		<div class="form-group" style="padding:1.5rem;">
			<label class="col-md-4 control-label" for="room-name">Room Name</label>
			<div class="col-md-4">
				<input type="text" name="room_name" class="form-control">
			</div>
		</div>
		<div class="form-group" style="padding:1.5rem;">
			<label class="col-md-4 control-label" for="room-Capacity">Room Capacity</label>
			<div class="col-md-4">
				<input type="number" name="room_capacity" class="form-control">
			</div>
		</div>
		<div class="form-group" style="padding:1.5rem;">
			<label class="col-md-4 control-label" for="room-description">Room Description</label>
			<div class="col-md-4">
				<textarea name="room_description" class="form-control" placeholder="optional"></textarea>
			</div>
		</div>
		<div class="form-group" style="padding:1.5rem;">
			<div class="col-md-offset-4 col-md-4">
				<button type="submit" class="btn btn-success">Register</button>
			</div>
		</div>
	</form>
</div>
@endsection
