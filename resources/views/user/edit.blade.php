@extends('layouts/app')
@section('content')
	<div class="container">
		<form action="{{route('user.update', $user->id)}}" method="POST">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="exampleInputEmail1">Name</label>
				<input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->name}}">
				@if($errors->has('name'))
					<div class="col">
						<small id="passwordHelp" class="text-danger">
							{{ $errors->first('name') }}
						</small>
					</div>
				@endif
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Email</label>
				<input type="email" name="email" class="form-control" id="exampleInputPassword1" value="{{$user->email}}">
				@if($errors->has('email'))
					<div class="col">
						<small id="passwordHelp" class="text-danger">
							{{ $errors->first('email') }}
						</small>
					</div>
				@endif
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input name="password" type="password" class="form-control" id="exampleInputPassword1" value="{{$user->password}}">
				@if($errors->has('title'))
					<div class="col">
						<small id="passwordHelp" class="text-danger">
							{{ $errors->first('title') }}
						</small>
					</div>
				@endif
			</div>
			<button type="submit" class="btn btn-primary">Create</button>
		</form>
	</div>
@endsection