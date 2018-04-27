@extends('layouts/app')
@section('content')
	<div class="container">
		<form action="{{route('user.store')}}" method="POST">
			@csrf
			<div class="form-group">
				<label for="exampleInputEmail1">Name</label>
				<input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" >
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Email</label>
				<input type="email" name="email" class="form-control" id="exampleInputPassword1" >
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input  name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			</div>
			<button type="submit" class="btn btn-primary">Create</button>
		</form>
	</div>
@endsection