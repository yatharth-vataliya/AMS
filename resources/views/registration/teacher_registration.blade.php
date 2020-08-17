@extends('layouts.app1')

@section('content')
	@if($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<div class="container">
		<form action="{{ route('teacher_registration') }}" method="POST" class="" accept-charset="utf-8" style="color:#8b4513;font-size: 1.2em;">
			@csrf
			<div class="form-group" style="padding:1.5rem;">
				<label class="control-label col-md-4" for="teacher-name">Teacher Name</label>
				<div class="col-md-4">
					<input type="text" class="form-control" name="teacher_name"  required>
				</div>
			</div>
			<div class="form-group" style="padding:1.5rem;margin-bottom:2.1rem;">
				<label class="control-label col-md-4" for="teacher-address">Address</label>
				<div class="col-md-4">
					<textarea name="teacher_address" class="form-control" required></textarea>
				</div>
			</div>
			<div class="form-group" style="padding:1.5rem;margin-top:2em;">
				<label class="control-label col-md-4" for="teacher-contact">Contact</label>
				<div class="col-md-4">
					<input type="number" class="form-control" name="teacher_contact" required>
				</div>
			</div>
			<div class="form-group" style="padding:1.5rem;">
				<label class="control-label col-md-4" for="teacher-email">Email(Username)</label>
				<div class="col-md-4">
					<input type="email" class="form-control" name="teacher_email"  required>
				</div>
			</div>
			<div class="form-group" style="padding:1.5rem;">
				<label class="control-label col-md-4">Gender:-</label>
					<div class="col-md-4">
						<div class="radio">
							<label><input type="radio" name="gender"  value="male" required>Male</label>
							<label><input type="radio" name="gender"  value="female" required>Female</label>
						</div>
					</div>
			</div>
			<div class="form-group" style="padding:1.5rem;">
				<label class="control-label col-md-4" for="teacher-join-date">Join Date</label>
				<div class="col-md-4">
					<input type="date" class="form-control" name="teacher_join_date"  required>
				</div>
			</div>
			<div class="form-group" style="padding:1.5rem;">
				<label class="control-label col-md-4" for="teacher-leave-date">Leave Date(optional)</label>
				<div class="col-md-4">
					<input type="date" class="form-control" name="teacher_leave_date" placeholder="optional">
				</div>
			</div>
			<div class="form-group" style="padding:1.5rem;">
				<label class="control-label col-md-4" for="teacher-password">Password</label>
				<div class="col-md-4">
					<input type="password" class="form-control" name="teacher_password" required>
				</div>
			</div>
			<div class="form-group" style="padding:1.5rem;">
				<label class="control-label col-md-4" style="margin-left:4.7em;" for="teacher-password-confirmation">Confirm Password</label>
				<div class="col-md-4" style="margin-left:1.2em;">
					<input type="password" class="form-control" name="teacher_password_confirmation"  required>
				</div>
			</div>
			<div class="form-group" style="margin-left:9em;padding:1.5rem;">
				<div class="col-md-offset-4 col-md-4">
					<input type="submit" class="btn btn-success" name="submit" value="Register">
				</div>
			</div>
		</form>
	</div>
@endsection
