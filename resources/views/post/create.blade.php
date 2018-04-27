@extends('layouts/app')
@section('content')
	<div class="container">
		<form action="{{route('post.store')}}" method="POST">
			@csrf
			<div class="form-group">
				<label for="exampleInputEmail1">Title</label>
				<input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" >
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Your post</label>
				<textarea  name="text" class="form-control" id="exampleInputPassword1"  rows="8"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Save</button>
		</form>
	</div>
@endsection