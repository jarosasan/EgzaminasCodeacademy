@extends('layouts/app')
@section('content')
	<div class="container">
		<form action="{{route('post.update', $post->id)}}" method="POST">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="exampleInputEmail1">Title</label>
				<input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$post->title}}" >
				@if($errors->has('title'))
					<div class="col">
						<small id="passwordHelp" class="text-danger">
							{{ $errors->first('title') }}
						</small>
					</div>
				@endif
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Your post</label>
				<textarea  name="text" class="form-control" id="exampleInputPassword1"  rows="8">{{$post->text}}</textarea>
				@if($errors->has('text'))
					<div class="col">
						<small id="passwordHelp" class="text-danger">
							{{ $errors->first('text') }}
						</small>
					</div>
				@endif
			</div>
			<button type="submit" class="btn btn-primary">Save</button>
		</form>
	</div>
@endsection