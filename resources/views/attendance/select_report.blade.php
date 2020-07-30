@extends('layouts.app2')

@section('title')

Select Report

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
		<h1 style="margin-left: 28%;"><strong>Select Report Generation</strong></h1>
		<hr style="border: 1px solid black;" />
<div class="col-md-10">
	<form action="{{ route('show_report') }}" method="POST" accept-charset="utf-8" class="form-horizontal" style="color:#8b4513;font-size: 1.2em;">
		@csrf
		<div class="form-group">
			<label for="" class="control-label col-md-3">Class:-</label>
				<div class="col-md-3">
					<select name="class" class="form-control">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
					</select>	
				</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Date:-</label>
			<div class="col-md-3">
				<input type="date" name="date" required="" class="form-control">
			</div>
		</div>
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
							<option value="{{ $div['division_id'] }}">{{ $div['division_name'] }}</option>
						@endforeach	
					</select>	
				</div>
		</div>
		<div class="col-md-offset-3 col-md-3">
			<input type="submit" class="btn btn-block btn-success" value="Submit">
		</div>	
	</form>
</div>

@endsection