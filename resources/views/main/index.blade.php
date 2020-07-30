@extends('layouts.app2')

@section('title')

Index

@endsection

@section('content')

<!-- navigation starts ---->

<nav class="navbar navbar-inverse nav" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ route('index') }}">AMS</a>
		</div>		
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ session('username') }}<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="{{ route('logout') }}">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>

<!-- navigation end ---->

<!-- side bar start ---->

<div class="col-md-2 text-center" style="border-radius: 15px;">
	<ul class="nav nav-pills nav-stacked">
 	 	<li><a href="{{ route('select_student') }}" style="color:rgba(0,0,0,0.8);"><b>Fill Attendance</b></a></li>
  		<li><a href="{{ route('select_report') }}" style="color:rgba(0,0,0,0.8);"><b>Attendance Report</b></a></li>
  		<li><a href="{{ route('search_student') }}" style="color:rgba(0,0,0,0.8);"><b>Student Detail Section</b></a></li>
  		
	</ul>
</div>	

<!-- side bar end ---->



@endsection

